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

        Game::create([
            'name' => 'Rana saltarina',
            'asset_id' => Asset::first()->id,
        ]);

        Game::create([
            'name' => 'Carros chocones',
            'asset_id' => Asset::first()->id,
        ]);

    }
}
