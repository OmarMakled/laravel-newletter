<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CampaignGroupTableSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaign1 = Campaign::find(1);
        $campaign2 = Campaign::find(2);

        $campaign1->groups()->attach([1, 2, 3]);
        $campaign2->groups()->attach([2, 4]);
    }
}
