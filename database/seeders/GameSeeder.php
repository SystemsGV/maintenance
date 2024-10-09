<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Game::insert([
            ['name' => 'Villa Pelotas', 'asset_id' => 1],
            ['name' => 'Black Hole', 'asset_id' => 1],
            ['name' => 'Bici Magica', 'asset_id' => 1],
            ['name' => 'Bloque Mundo', 'asset_id' => 1],
            ['name' => 'Tagadisco', 'asset_id' => 1],
            ['name' => 'Carrusel', 'asset_id' => 1],
            ['name' => 'Disco Nazca', 'asset_id' => 1],
            ['name' => 'Botes Remo', 'asset_id' => 1],
            ['name' => 'Manhatan', 'asset_id' => 1],
            ['name' => 'Carros Chocones Adultos', 'asset_id' => 1],
            ['name' => 'Vikingo', 'asset_id' => 1],
            ['name' => 'Rio Granjero', 'asset_id' => 1],
            ['name' => 'Jaula', 'asset_id' => 1],
            ['name' => 'Voladoras Adultos', 'asset_id' => 1],
            ['name' => 'Montaña Raton', 'asset_id' => 1],
            ['name' => 'Barco Pirata', 'asset_id' => 1],
            ['name' => 'Lonas Saltarinas', 'asset_id' => 1],
            ['name' => 'Mansion Emb', 'asset_id' => 1],
            ['name' => 'Gateadores', 'asset_id' => 1],
            ['name' => 'Navesaurio', 'asset_id' => 1],
            ['name' => 'Carpas', 'asset_id' => 1],
            ['name' => 'Vuelo 360', 'asset_id' => 1],
            ['name' => 'Water Rice', 'asset_id' => 1],
            ['name' => 'Cuy Loco', 'asset_id' => 1],
            ['name' => 'Saltarina', 'asset_id' => 1],
            ['name' => 'Sillas Voladoras Niños', 'asset_id' => 1],
            ['name' => 'Carros Chocones Niños', 'asset_id' => 1],
            ['name' => 'Feriales', 'asset_id' => 1],
            ['name' => 'La torre', 'asset_id' => 1],
        ]);

    }
}
