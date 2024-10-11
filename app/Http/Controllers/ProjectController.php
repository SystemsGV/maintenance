<?php

namespace App\Http\Controllers;

use App\Actions\Project\CreateProject;
use App\Events\Project\ProjectDeleted;
use App\Events\Project\ProjectGroupChanged;
use App\Events\Project\ProjectOrderChanged;
use App\Events\Project\ProjectRestored;
use App\Events\Project\ProjectUpdated;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Asset;
use App\Models\ClientCompany;
use App\Models\Currency;
use App\Models\Game;
use App\Models\Label;
use App\Models\OwnerCompany;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\ProjectType;
use App\Models\Task;
use App\Models\User;
use App\Services\ProjectService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }

    public function index(Request $request)
    {
        return Inertia::render('Projects/Index', [
            'items' => ProjectResource::collection(
                Project::searchByQueryString()
                    ->when($request->user()->isNotAdmin(), function ($query) {
                        $query->whereHas('clientCompany.clients', fn ($query) => $query->where('users.id', auth()->id()))
                            ->orWhereHas('users', fn ($query) => $query->where('id', auth()->id()));
                    })
                    ->when($request->has('archived'), fn ($query) => $query->onlyArchived())
                    ->where('default', '!=', 1)
                    ->with([
                        'clientCompany:id,name',
                        'clientCompany.clients:id,name,avatar',
                        'users:id,name,avatar',
                    ])
                    ->withCount([
                        'tasks AS all_tasks_count',
                        'tasks AS completed_tasks_count' => fn ($query) => $query->whereNotNull('completed_at'),
                        'tasks AS overdue_tasks_count' => fn ($query) => $query->whereNull('completed_at')->whereDate('due_on', '<', now()),
                    ])
                    ->withExists('favoritedByAuthUser AS favorite')
                    ->orderBy('favorite', 'desc')
                    ->orderBy('name', 'asc')
                    ->get()
            ),
        ]);
    }

    public function kanban(Request $request, ?Project $project = null): Response
    {
        $groups = ProjectGroup::when($request->has('archived'), fn ($query) => $query->onlyArchived())->get();
        $user = auth()->user();
        $groupedProjects = ProjectGroup::with(['projects' => fn ($query) => $query->withArchived()])->get()
            ->mapWithKeys(function (ProjectGroup $group) use ($request, $user) {
                return [
                    $group->id => Project::where('group_id', $group->id)
                        ->searchByQueryString()
                        ->filterByQueryString()
                        ->when($request->user()->isNotAdmin(), function ($query) {
                            $query->whereHas('users', fn ($query) => $query->where('id', auth()->id()));
                        })
                        ->with([
                            'tasks' => function ($query) use ($user) {
                                $query->when($user->hasRole('cliente'), fn ($query) => $query->where('hidden_from_clients', false))
                                    // ->where('assigned_to_user_id', $user->id)
                                    ->orderByRaw('number ASC')
                                    ->with([
                                        'labels:id,name,color',
                                        'assignedToUser:id,name',
                                        'taskGroup:id,name',
                                        'attachments',
                                    ]);
                            },
                        ])
                        ->withCount([
                            'tasks AS all_tasks_count',
                            'tasks AS completed_tasks_count' => fn ($query) => $query->whereNotNull('completed_at'),
                            'tasks AS overdue_tasks_count' => fn ($query) => $query->whereNull('completed_at')->whereDate('due_on', '<', now()),
                        ])
                        ->when($request->has('archived'), fn ($query) => $query->onlyArchived())
                        ->withDefault()
                        // ->orderBy('', 'desc')
                        ->get(),
                ];
            });

        return Inertia::render('Projects/Kanban/Index', [
            'labels' => Label::get(['id', 'name', 'color']),
            'projectGroups' => $groups,
            'groupedProjects' => $groupedProjects,
            'openedProject' => $project ? $project->loadDefault() : null,
            'users_access' => User::withoutRole('cliente')->get(['id', 'name']),
            'games' => Game::dropdownValues(),
            'types' => ProjectType::dropdownValues(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Projects/Create', [
            'dropdowns' => [
                'companies' => ClientCompany::dropdownValues(),
                'users' => User::userDropdownValues(),
                'labels' => Label::DropdownValues(),
                'games' => Game::DropdownValues(),
                'types' => ProjectType::DropdownValues(),
                'currencies' => Currency::dropdownValues(['with' => ['clientCompanies:id,currency_id']]),
            ],
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        (new CreateProject)->create($request->validated());

        return redirect()->route('projects.kanban')->success('Project created', 'A new project was successfully created.');
    }

    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', [
            'item' => $project,
            'dropdowns' => [
                'companies' => ClientCompany::dropdownValues(),
                'users' => User::userDropdownValues(),
                'games' => Game::DropdownValues(),
                'types' => ProjectType::DropdownValues(),
                'currencies' => Currency::dropdownValues(['with' => ['clientCompanies:id,currency_id']]),
            ],
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project): JsonResponse
    {
        $data = $request->validated();
        $updateField = key($data);

        if (! in_array($updateField, ['users', 'labels', 'tasks'])) {

            $project->update($data);
            if ($updateField == 'group_id') {
                $project->update(['order_column' => 0]);
            }
        }

        if ($updateField == 'tasks') {
            return response()->json();
        }

        if ($updateField == 'users') {
            $project->users()->sync($data['users']);
        }

        if ($updateField == 'labels') {
            $project->labels()->sync($data['labels']);
        }

        ProjectUpdated::dispatch($project, $updateField);

        return response()->json();
    }

    public function destroy(Request $request, Project $project)
    {
        $project->update(['motive_archived' => $request->motive_archived]);
        $project->archive();
        ProjectDeleted::dispatch($project->id);

        return redirect()->back()->success('Orden de trabajo archivado', 'La orden de trabajo fue archivado exitosamente.');
    }

    public function restore(int $projectId): RedirectResponse
    {
        $project = Project::withArchived()->findOrFail($projectId);

        $this->authorize('restore', $project);

        $project->unArchive();
        ProjectRestored::dispatch($project);

        return redirect()->back()->success('Project restored', 'The restoring of the project was completed successfully.');
    }

    public function favoriteToggle(Project $project)
    {
        request()->user()->toggleFavorite($project);

        return redirect()->back();
    }

    public function userAccess(Request $request, Project $project)
    {
        $this->authorize('editUserAccess', $project);

        $userIds = array_merge(
            $request->get('users', []),
            $request->get('clients', [])
        );

        (new ProjectService($project))->updateUserAccess($userIds);

        return redirect()->back();
    }

    public function reorder(Request $request): JsonResponse
    {
        $this->authorize('reorder', Project::class);

        Project::setNewOrder($request->ids);

        ProjectOrderChanged::dispatch(
            $request->group_id,
            $request->from_index,
            $request->to_index,
        );

        return response()->json();
    }

    public function move(Request $request): JsonResponse
    {
        $this->authorize('reorder', Project::class);

        Project::setNewOrder($request->ids);
        Project::whereIn('id', $request->ids)->update(['group_id' => $request->to_group_id,]);

        ProjectGroupChanged::dispatch(
            $request->from_group_id,
            $request->to_group_id,
            $request->from_index,
            $request->to_index,
        );

        return response()->json(Label::get(['id', 'name', 'color']));
    }

    public function complete(Request $request, Project $project): JsonResponse
    {
        $this->authorize('complete', $project);

        $project->update([
            'completed_at' => ($request->completed == true) ? now() : null,
        ]);
        ProjectUpdated::dispatch($project, 'completed_at');

        return response()->json();
    }

    public function expired(Request $request, Project $project): JsonResponse
    {

        $request->option ? $project->labels()->sync(6, false) :  $project->labels()->detach(6);
        ProjectUpdated::dispatch($project, 'labels');
        return response()->json();
    }

    public function checklist(Request $request, Project $project, Task $task): JsonResponse
    {
        // $this->authorize('complete', [Task::class, $project]);

        if($request->check && ($task->sent_archive != 1 || !$task->attachments->isEmpty())){
            $task->update([
                'check' => $request->check,
                'group_id' => $project->taskGroups()->pluck('id', 'name')['Proceso'],
                'completed_at' => now(),
            ]);
            $task->labels()->sync(2);
        }

        $user = auth()->user();
        $project = Project::find($project->id)
                    ->loadDefault()
                    ->load([
                        'tasks' => function ($query) use ($user) {
                            $query->when($user->hasRole('cliente'), fn ($query) => $query->where('hidden_from_clients', false))
                                // ->where('assigned_to_user_id', $user->id)
                                ->orderByRaw('number ASC')
                                ->with([
                                    'labels:id,name,color',
                                    'assignedToUser:id,name',
                                    'taskGroup:id,name',
                                    'attachments',
                                ]);
                        },
                    ])
                    ->loadCount([
                        'tasks AS all_tasks_count',
                        'tasks AS completed_tasks_count' => fn ($query) => $query->whereNotNull('completed_at'),
                        'tasks AS overdue_tasks_count' => fn ($query) => $query->whereNull('completed_at')->whereDate('due_on', '<', now()),
                    ]);
        return response()->json([
            'project' => $project,
            'task' => $task->loadDefault(),
            'message' => $task->sent_archive == 1 && $task->attachments->isEmpty() ? true : false,
        ]);
    }

    public function moveSelectedProjects(StoreProjectRequest $request): JsonResponse
    {
        $this->authorize('reorder', Project::class);

        $project = (new CreateProject)->create($request->validated());
        $user = auth()->user();
        $project = Project::find($project->id)
                    ->loadDefault()
                    ->load([
                        'tasks' => function ($query) use ($user) {
                            $query->when($user->hasRole('cliente'), fn ($query) => $query->where('hidden_from_clients', false))
                                // ->where('assigned_to_user_id', $user->id)
                                ->orderByRaw('number ASC')
                                ->with([
                                    'labels:id,name,color',
                                    'assignedToUser:id,name',
                                    'taskGroup:id,name',
                                    'attachments',
                                ]);
                        },
                    ])
                    ->loadCount([
                        'tasks AS all_tasks_count',
                        'tasks AS completed_tasks_count' => fn ($query) => $query->whereNotNull('completed_at'),
                        'tasks AS overdue_tasks_count' => fn ($query) => $query->whereNull('completed_at')->whereDate('due_on', '<', now()),
                    ]);
        return response()->json($project);
    }

    public function pdf(Project $project)
    {
        $data = [
            'ownerCompany' => OwnerCompany::first(),
            'user' => User::find(auth()->id()),
            'project' => $project->loadDefault(),
            'asset' => Asset::find($project->game()->get('asset_id')),
            'tasks' => Task::where('project_id', $project->id)->withDefault()->get(),
        ];

        $pdf = Pdf::loadView('vendor.project.pdf', $data);
        return $pdf->stream();
    }

}
