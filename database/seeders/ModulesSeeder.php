<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name' => 'Appointments',
            'project_id' => 1,
            'description' => null,
            'developers' => '3,',
        ]);

        Module::create([
            'name' => 'Calendar',
            'project_id' => 1,
            'description' => null,
            'developers' => '4,',
        ]);

        Module::create([
            'name' => 'Billing',
            'project_id' => 1,
            'description' => null,
            'developers' => '7,',
        ]);

        Module::create([
            'name' => 'Backend',
            'project_id' => 1,
            'description' => null,
            'developers' => '7,',
        ]);

        Module::create([
            'name' => 'Imaging',
            'project_id' => 1,
            'description' => null,
            'developers' => '1,',
        ]);

        Module::create([
            'name' => 'Treatments',
            'project_id' => 1,
            'description' => null,
            'developers' => '6,',
        ]);

        Module::create([
            'name' => 'Settings & Configurations',
            'project_id' => 1,
            'description' => null,
            'developers' => '8,',
        ]);
    }
}
