<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'user1',
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user3',
                'email' => 'user3@example.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
