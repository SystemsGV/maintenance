<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            LabelSeeder::class,
            TypeCheckSeeder::class,
            ProjectTypeSeeder::class,
            PeriodSeeder::class,
            CurrencySeeder::class,
            CountrySeeder::class,
            AssetSeeder::class,
            GameSeeder::class,
            CheckListSeeder::class,
            ProductionSeeder::class,
            ClientCompanySeeder::class,
            ProjectSeeder::class,
            ProjectGroupSeeder::class,

        ]);

        // if ($this->command->confirm('Seed development data?', false)) {
        //     $this->call([
        //         UserSeeder::class,
        //         OwnerCompanySeeder::class,
        //         ClientSeeder::class,
        //         ClientCompanySeeder::class,
        //     ]);

        //     auth()->setUser(User::role('admin')->first());

        //     $this->call([
        //         ProjectSeeder::class,
        //         TaskGroupSeeder::class,
        //         TasksSeeder::class,
        //     ]);
        // } else {
        //     $this->call([
        //         ProductionSeeder::class,
        //         ClientCompanySeeder::class,
        //         ProjectSeeder::class,
        //         ProjectGroupSeeder::class,
        //     ]);

        // }
    }
}
