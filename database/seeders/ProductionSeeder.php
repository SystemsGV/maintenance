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
            'email' => 'omarcampos@gmail.com',
            'name' => 'Omar Daniel Campos Valdivia',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('71541015'),
            'remember_token' => null,
        ])->assignRole(Role::firstWhere('name', 'admin mantenimiento'));

        User::create([
            'email' => 'diegoaybar@gmail.com',
            'name' => 'Diego Celestino Aybar Borda',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('48146462'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'luischahua@gmail.com',
            'name' => 'Luis Miguel Chahua Maccapa',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('44623723'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'johaneschumpitaz@gmail.com',
            'name' => 'Johanes Patrick Chumpitaz Casas',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('71711651'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'hipolitocubas@gmail.com',
            'name' => 'Hipolito Cubas Ramos',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('9352960'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'antonioguimaray@gmail.com',
            'name' => 'Antonio Porfirio Guimaray Chavez',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('8982345'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'darrenpacheco@gmail.com',
            'name' => 'Darren Fabricio Pacheco Zuta',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('71273703'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'gianniruiz@gmail.com',
            'name' => 'Gianni Enrique Ruiz Vargas',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('73891626'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'jeanshupingahua@gmail.com',
            'name' => 'Jean Carlos Shupingahua',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('74237572'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'royoscco@gmail.com',
            'name' => 'Roy Ronald Oscco Huallpatuero',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('47753444'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'vicentmonge@gmail.com',
            'name' => 'Vicent Omar Monge Serrano',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('47936148'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'hectorcaceda@gmail.com',
            'name' => 'Hector Alonso Caceda Perez',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('47323044'),
            'remember_token' => null,

        ])->assignRole(Role::firstWhere('name', 'mantenimiento'));

        User::create([
            'email' => 'eddymatos@gmail.com',
            'name' => 'Eddy Miguel Matos Rojas',
            'phone' => '',
            'rate' => 0,
            'job_title' => 'Mantenimiento',
            'avatar' => null,
            'password' => bcrypt('45695086'),
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
