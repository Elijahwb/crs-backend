<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'MetaDent',
            'description' => 'simple description',
            'company_id' => 1,
            'developers' => '1,3,4,5,6,7,',
        ]);

        Project::create([
            'name' => 'MFI',
            'description' => 'simple description',
            'company_id' => 1,
            'developers' => null,
        ]);

        Project::create([
            'name' => 'FundsTrans',
            'description' => 'simple description',
            'company_id' => 1,
            'developers' => '4,',
        ]);

        Project::create([
            'name' => 'Softdesk',
            'description' => 'simple description',
            'company_id' => 1,
            'developers' => '1,3,',
        ]);

        Project::create([
            'name' => 'Rapid boda',
            'description' => 'simple description',
            'company_id' => 1,
            'developers' => null,
        ]);
    }
}
