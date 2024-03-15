<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =  [
            [
                "name" => "John",
                "email" => "john@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Enrico",
                "email" => "enrico@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Simone",
                "email" => "simone@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Alberto",
                "email" => "alberto@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Elisa",
                "email" => "elisa@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Marco",
                "email" => "Marco@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Luca",
                "email" => "Luca@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Giovanni",
                "email" => "Giovanni@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Maria",
                "email" => "Maria@gmail.com",
                "password" => "Password",
            ],
            [
                "name" => "Martina",
                "email" => "Martina@gmail.com",
                "password" => "Password",
            ],
        ];

        foreach ($users as $user) {

            $user_new = new User();

            $user_new->name = $user['name'];
            $user_new->email = $user['email'];
            $user_new->password = $user['password'];

            $user_new->save();
        }
    }
}
