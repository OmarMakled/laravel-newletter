<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriberGroupTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriber1 = Subscriber::find(1);
        $subscriber2 = Subscriber::find(2);
        $subscriber3 = Subscriber::find(3);

        $subscriber1->groups()->attach([1, 2, 4]);
        $subscriber2->groups()->attach([2, 3]);
        $subscriber3->groups()->attach([3, 4, 5]);
    }
}
