<?php

namespace Database\Seeders;

use App\Models\TypeCheck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeCheck::insert([
            ['name' => 'Bien / Mal / Na', 'option1' => 'Bien', 'option2' => 'Mal', 'option3' => 'Na'],
            ['name' => 'Aprobó / Alerta / Falló', 'option1' => 'Aprobó', 'option2' => 'Alerta', 'option3' => 'Fallo'],
            ['name' => 'Si / No / Na', 'option1' => 'Si', 'option2' => 'No', 'option3' => 'Na'],
            ['name' => 'Texto', 'option1' => null, 'option2' => null, 'option3' => null],
        ]);

    }
}
