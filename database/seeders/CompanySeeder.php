<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Project Code',
            'website' => 'https://www.projectcode.ug',
            'subscription_id' => 1,
            'company_status_id' => 1,
            'email' => 'admin.projectcode.ug',
            'phonenumber' => '934024242',
            'location' => 'Kampala, Uganda',
        ]);

        Company::create([
            'name' => 'SoftWorld',
            'website' => 'https://www.softworld.ug',
            'subscription_id' => 1,
            'company_status_id' => 1,
            'email' => 'admin.softworld.ug',
            'phonenumber' => '934024242',
            'location' => 'Kampala, Uganda',
        ]);
    }
}
