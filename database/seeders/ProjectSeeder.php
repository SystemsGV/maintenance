<?php

namespace Database\Seeders;

use App\Models\CheckList;
use App\Models\ClientCompany;
use App\Models\Game;
use App\Models\Period;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = Game::get();
        $periods = Period::get();
        $number = 1;

        foreach ($games as $game) {
            foreach ($periods as $period) {
                $project = Project::create([
                    'client_company_id' => ClientCompany::first()->id,
                    'game_id' => $game->id,
                    'group_id' => 1, // Pendiente
                    'period_id' => $period->id, // Diario, semanal, mensual ...
                    'type_id' => null, // Corectivo, preventivo ..
                    'name' => "OT " . $period->name ." de " . $game->name,
                    'due_on' => null,
                    'estimation' => 0,
                    'rate' => 0,
                    'number' => $number++,
                    'description' => null,
                    'completed_at' => null,
                    'default' => true,
                ]);
                $project->users()->attach([]);
                $project->labels()->attach(1);
            }

        }

    }
}
