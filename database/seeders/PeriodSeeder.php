<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Period::insert([
            ['name' => 'Diario'],
            ['name' => 'Semanal'],
            ['name' => 'Mensual'],
            ['name' => 'Semestral'],
            ['name' => 'Anual'],
            ['name' => 'Compresor'],
            ['name' => 'Sistema eléctrico'],
        ]);
    }
}
