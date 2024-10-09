<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectCreated;
use App\Events\Task\TaskCreated;
use App\Models\CheckList;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateProject
{
    public function create(array $data): Project
    {
        return DB::transaction(function () use ($data) {

            $data['rate'] *= 100;
            $data['labels'] = 2;
            $data['number'] = Project::withArchived()->count() + 1;

            $project = Project::create([
                'client_company_id' => $data['client_company_id'] ?? 1,
                'group_id' => 2, // En proceso
                'game_id' => $data['game_id'] ?? null,
                'period_id' => $data['period_id'] ?? null,
                'type_id' => $data['type_id'] ?? null,
                'name' => $data['name'],
                'due_on' => $data['due_on'] ?? now(),
                'estimation' => 0,
                'rate' => $data['rate'],
                'number' => $data['number'],
                'description' => $data['description'],
                'default' => false,
            ]);

            $project->moveToStart();
            $project->users()->attach($data['users'] ?? []);
            $project->labels()->attach($data['labels']);
            ProjectCreated::dispatch($project);

            $taskGroup = $project->taskGroups()->createMany([ // Almacenar solo los periodos predeterminados
                ['name' => 'Pendiente' ],
                ['name' => 'Proceso' ],
                ['name' => 'Revision' ],
                ['name' => 'Finalizado' ]
            ]);
            CheckList::get()->each(function ($checklist) use ($project, $taskGroup) {
                if ($checklist->period_id == $project->period_id && $checklist->game_id == $project->game_id) { // Verifica si el campo group_name de la tabla CheckList existe o es igual con la clave: "Diario" de $period
                    $task = $project->tasks()->create([
                        'group_id' => $taskGroup->pluck('id', 'name')['Pendiente'],
                        'created_by_user_id' => auth()->id(),
                        'assigned_to_user_id' => auth()->id(),
                        'name' => $checklist->name,
                        'number' => $project->tasks()->withArchived()->count() + 1,
                        'estimation' => 0,
                        'due_on' => Carbon::now(),
                        'hidden_from_clients' => 0,
                        'billable' => 1,
                        'sent_archive' => $checklist->archive,
                        'completed_at' => null,
                    ]);
                    $task->labels()->attach([1]); // Pendiente
                    TaskCreated::dispatch($task);
                }
            });

            return $project;
        });
    }

}
