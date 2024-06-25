<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Classified Subscribers', 'description' => 'Group for subscribers with classified interests or content preferences.'],
            ['name' => 'Tech Enthusiasts', 'description' => 'Group for subscribers interested in technology news and updates.'],
            ['name' => 'Fashionistas', 'description' => 'Group for subscribers interested in fashion trends and style tips.'],
            ['name' => 'Travel Lovers', 'description' => 'Group for subscribers who enjoy travel stories and destination guides.'],
            ['name' => 'Foodies', 'description' => 'Group for subscribers passionate about food and culinary experiences.'],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
