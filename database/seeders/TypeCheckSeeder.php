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
            ['name' => 'Bien / Mal / Na'],
            ['name' => 'Aprobó / Alerta / Falló'],
            ['name' => 'Si / No / Na'],
            ['name' => 'Texto'],
        ]);

    }
}
