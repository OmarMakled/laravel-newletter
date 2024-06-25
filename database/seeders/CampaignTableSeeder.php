<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CampaignTableSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaigns = [
            [
                'name' => 'Campaign1',
                'content' => 'Content of Campaign1'
            ],
            [
                'name' => 'Campaign2',
                'content' => 'Content of Campaign2',
                'scheduled_at' => '2024-08-15 15:00:00'
            ],
        ];
    
        foreach ($campaigns as $campaign) {
            Campaign::create($campaign);
        }
    }
}
