<?php

namespace Database\Seeders;

use App\Models\WorkStatus;
use Illuminate\Database\Seeder;

class WorkingStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkStatus::create([
            'status' => 'Waiting Approval'
        ]);

        WorkStatus::create([
            'status' => 'In Progress'
        ]);

        WorkStatus::create([
            'status' => 'Completed'
        ]);

        WorkStatus::create([
            'status' => 'Closed'
        ]);
    }
}
