<?php

namespace Database\Seeders;

use App\Models\ApprovalStatus;
use Illuminate\Database\Seeder;

class ApprovalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApprovalStatus::create([
            'status' => 'Pending',
        ]);
        ApprovalStatus::create([
            'status' => 'Approved',
        ]);
        ApprovalStatus::create([
            'status' => 'Declined',
        ]);
    }
}
