<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');

        User::create([
            'first_name' => 'Brandon',
            'last_name' => 'Wavamuno',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,4,',
            'email' => 'bewavamuno@projectcode.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Samuel',
            'last_name' => 'Lubowa',
            'company_id' => 1,
            'role_id' => 1,
            'projects' => '1,2,3,4,5,',
            'email' => 'slubowa@projectcode.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Mariat',
            'last_name' => 'Ndagire',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,4',
            'email' => 'mndagire@projectcode.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Ismail',
            'last_name' => 'Asega',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,4',
            'email' => 'idasega@projectcode.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Ignatius',
            'last_name' => 'Yesigye',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,4',
            'email' => 'iyesigye@projectcode.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Benjamin',
            'last_name' => 'Kooma',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,',
            'email' => 'bkooma@projectcode.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Hassan',
            'last_name' => 'Muwonge',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,',
            'email' => 'hmuwonge@softworld.ug',
            'password' => $password,
        ]);

        User::create([
            'first_name' => 'Eric',
            'last_name' => 'Lukyamuzi',
            'company_id' => 1,
            'role_id' => 2,
            'projects' => '1,',
            'email' => 'eric@softworld.ug',
            // 'email' => 'elukyamuzi@projectcode.ug',

            'password' => $password,
        ]);

    }
}
