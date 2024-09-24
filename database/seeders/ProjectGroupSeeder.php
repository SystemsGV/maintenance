<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectGroup;
use Illuminate\Database\Seeder;

class ProjectGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectGroup::insert([
            ['name' => 'Pendientes', 'order_column' => 1],
            ['name' => 'En proceso', 'order_column' => 2],
            ['name' => 'En revisión', 'order_column' => 3],
            ['name' => 'Finalizadas', 'order_column' => 4],
        ]);
    }
}
