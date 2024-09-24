<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'name' => 'Ubicaion 1',
            'code' => 'UBI-00132',
            'address' => fake()->streetAddress,
            'city' => 'Lima',
            'departament' => 'Lima',
            'country' => 'Peru',
            'area_code' => null,
            'priority' => 'Baja',
            'latitude' => null,
            'longitude' => null,
            'type' => null,
            'cost' => null,
        ]);
    }
}
