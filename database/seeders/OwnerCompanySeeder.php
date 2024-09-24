<?php

namespace Database\Seeders;

use App\Models\OwnerCompany;
use Illuminate\Database\Seeder;

class OwnerCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OwnerCompany::create([
            'name' => 'Granja Villa',
            'logo' => null,
            'address' => fake()->streetAddress,
            'postal_code' => fake()->postcode,
            'city' => 'Lima',
            'country_id' => 174,
            'currency_id' => 74,
            'phone' => fake()->phoneNumber,
            'web' => 'https://granjavilla.com',
            'tax' => 0, // 10%
            'email' => null,
            'iban' => null,
            'swift' => null,
            'business_id' => null,
            'tax_id' => null,
            'vat' => null,
        ]);
    }
}
