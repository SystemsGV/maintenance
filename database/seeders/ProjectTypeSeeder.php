<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectType::insert([
            ['name' => 'Preventivo'],
            ['name' => 'Correctivo'],
            ['name' => 'Predictivo'],
            ['name' => 'Fiable'],
        ]);
    }
}
