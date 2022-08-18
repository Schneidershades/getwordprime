<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name'             => 'FE',
            'type'         => 'FE',
        ]);

        Plan::create([
            'name'             => 'OTO1',
            'type'         => 'OTO1',
        ]);

        Plan::create([
            'name'             => 'OTO2',
            'type'         => 'OTO2',
        ]);

        Plan::create([
            'name'             => 'OTO3',
            'type'         => 'OTO3',
        ]);

        Plan::create([
            'name'             => 'OTO4',
            'type'         => 'OTO4',
        ]);
    }
}