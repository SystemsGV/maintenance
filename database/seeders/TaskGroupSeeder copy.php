<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class TaskGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            $project->taskGroups()->createMany([
                ['name' => 'Diario'],
                ['name' => 'Semanal'],
                ['name' => 'Mensual'],
                ['name' => 'Semestral'],
                ['name' => 'Anual'],
            ]);
        }
    }
}
