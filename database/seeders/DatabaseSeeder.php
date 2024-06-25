<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            SubscribersTableSeeder::class,
            CampaignTableSeeder::class,
            GroupTableSeeder::class,
            CampaignGroupTableSeeder::class,
            SubscriberGroupTableSeeder::class
        ]);
    }
}
