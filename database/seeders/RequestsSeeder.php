<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');

        foreach(range(1,100) as $request)
        {
            Request::create([
                'title' => $faker->sentence(10),
                'description' => json_encode([
                    "ops" => [
                        [
                            "attributes" => [
                                "bold" => true
                            ],
                            "insert" => "sdfsadf sadf asdf asdf as dfsaf "
                        ],
                        [
                            "insert" => "\n"
                        ]
                    ]
                ]),
                'requested_by' => rand(1,2),
                'module_id' => rand(1,4),
                'developer_id' => 1,
                'approval_status_id' => rand(1,3),
                'approved_by' => null,
                'work_status_id' => rand(1,4),
                'project_id' => rand(1,3),
            ]);
        }
    }
}
