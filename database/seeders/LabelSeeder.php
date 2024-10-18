<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Label::insert([
            ['name' => 'Pendiente', 'color' => '#8F8F8F'],
            ['name' => 'Proceso', 'color' => '#F08C00'],
            ['name' => 'Revisión', 'color' => '#2A8599'],
            ['name' => 'Finalizado', 'color' => '#37B24D'],
            ['name' => 'Inconveniente', 'color' => '#E03231'],
            ['name' => 'Vencido', 'color' => '#FF0000'],
            ['name' => 'Completado', 'color' => '#2B9267'],
        ]);
    }
}
