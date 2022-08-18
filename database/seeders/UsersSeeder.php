<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'id' => 1,
                'name' => 'Ad Ministrator',
                'email' => 'ad.ministrator@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],

            [
                'id' => 5,
                'name' => 'YOUR NAME',
                'email' => 'GIVEN@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Andy Manager',
                'email' => 'andy.manager@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],

            [
                'id' => 10,
                'name' => 'Eileen Dover',
                'email' => 'eileen@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'Jacques d\'Carre',
                'email' => 'jacques@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'Russell Leaves',
                'email' => 'russell@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'Ivana Vinn',
                'email' => 'ivanna@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'Win Doh',
                'email' => 'win@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'Rusty Nails',
                'email' => 'Rusty.Nails@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'Preston Cleaned',
                'email' => 'Preston.Cleaned@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
            [
                'id' => 666,
                'name' => 'rach',
                'email' => 'rach@cool.com',
                'email_verified_at' => now(),
                'password' => Hash::make('rach'),
                'created_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
