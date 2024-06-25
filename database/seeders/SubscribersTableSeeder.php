<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscribersTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscribers = [
            [
                'user_id' => User::where('email', 'user1@example.com')->first()->id,
                'created_at' => now()->subDays(5),
                'deleted_at' => null,
            ],
            [
                'user_id' => User::where('email', 'user2@example.com')->first()->id,
                'created_at' => now()->subDays(10),
                'deleted_at' => null,
            ],
            [
                'user_id' => User::where('email', 'user3@example.com')->first()->id,
                'created_at' => now()->subDays(10),
                'deleted_at' => null,
            ]
        ];

        foreach ($subscribers as $subscriber) {
            Subscriber::create($subscriber);
        }
    }
}
