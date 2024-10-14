<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\ProjectType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectType::insert([
            ['name' => 'Inspección'],
            ['name' => 'Correctivo'],
            ['name' => 'Preventivo'],
            ['name' => 'Correctivo programado'],
            ['name' => 'Correctivo no programado'],
        ]);
    }
}
