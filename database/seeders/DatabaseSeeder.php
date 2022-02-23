<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ApprovalsSeeder::class,
            CompanySeeder::class,
            ModulesSeeder::class,
            ProjectsSeeder::class,
            RolesSeeder::class,
            SubscriptionsSeeder::class,
            WorkingStatusesSeeder::class,
            UsersSeeder::class,
            // RequestsSeeder::class,
        ]);
    }
}
