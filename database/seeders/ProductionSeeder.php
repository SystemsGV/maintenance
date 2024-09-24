<?php

namespace Database\Seeders;

use App\Models\OwnerCompany;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => config('auth.admin.email'),
            'name' => config('auth.admin.name'),
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Propietario',
            'avatar' => null,
            'password' => bcrypt(config('auth.admin.password')),
            'remember_token' => null,
        ])->assignRole(Role::firstWhere('name', 'admin'));

        User::create([
            'email' => 'mant@gmail.com',
            'name' => 'Mantenimiento',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt(config('auth.admin.password')),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'cliente@gmail.com',
            'name' => 'Cliente',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Cliente',
            'avatar' => null,
            'password' => bcrypt(config('auth.admin.password')),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'cliente'));

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
