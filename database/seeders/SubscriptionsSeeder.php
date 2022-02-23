<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::create([
            'subscription' => 'Basic',
        ]);

        Subscription::create([
            'subscription' => 'Growth',
        ]);
    }
}
