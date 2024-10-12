<?php

namespace App\Http\Controllers\Attraction;

use App\Actions\Project\CreateProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\StoreGameRequest;
use App\Http\Requests\Game\UpdateGameRequest;
use App\Http\Resources\Game\GameResource;
use App\Models\Asset;
use App\Models\Game;
use App\Models\Period;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GameController extends Controller
{

    public function __construct() // Roles
    {
        $this->authorizeResource(Game::class, 'game');
    }

    public function index(Request $request): Response
    {

        return Inertia::render('Attractions/Games/Index', [
            'items' => GameResource::collection(
                Game::searchByQueryString()
                    ->sortByQueryString()
                    ->with('asset')
                    ->when($request->has('archived'), fn ($query) => $query->onlyArchived())
                    ->paginate(12)
            ),

        ]);
    }

    public function create()
    {
        return Inertia::render('Attractions/Games/Create', [
            'dropdowns' => [
                'assets' => Asset::dropdownValues(),
                'periods' => Period::dropdownValues(),
            ],

        ]);
    }

    public function store(StoreGameRequest $request)
    {
        $game = Game::create($request->validated());
        if($request->periods){
            foreach ($request->periods as $period) {
                $period = Period::find($period);
                $project = Project::create([
                    'client_company_id' => 1,
                    'group_id' => 1, // Pendiente
                    'game_id' => $game->id,
                    'period_id' => $period->id,
                    'name' => 'OT ' . $period->name . ' de ' . $game->name,
                    'due_on' => null,
                    'number' => Project::withArchived()->count() + 1,
                    'default' => true,
                ]);
                $project->labels()->attach([1]);
            }
        }
        return redirect()->route('attractions.games.index')->success('Juego creado', 'Se creó exitosamente una nuevo juego.');
    }

    public function edit(Game $game)
    {
        return Inertia::render('Attractions/Games/Edit', [
                'item' => new GameResource($game),
                'dropdowns' => [
                    'assets' => Asset::dropdownValues(),
                ],
            ]);
    }

    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->validated());
        return redirect()->route('attractions.games.index')->success('Juego actualizado', 'El juego se actualizó correctamente.');
    }

    public function destroy(Game $game)
    {
        $game->archive();
        return redirect()->back()->success('Juego archivado', 'El juego se archivó correctamente.');
    }

    public function restore(int $gameId)
    {
        $game = Game::withArchived()->findOrFail($gameId);
        // $this->authorize('restore', $game); // roles
        $game->unArchive();

        return redirect()->back()->success('Juego restaurado', 'La restauración del juego se completó con éxito.');
    }

}
