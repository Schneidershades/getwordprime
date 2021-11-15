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
            'name'             => '0T01',
            'type'         => '0T01',
        ]);

        Plan::create([
            'name'             => '0T02',
            'type'         => '0T02',
        ]);

        Plan::create([
            'name'             => '0T03',
            'type'         => '0T03',
        ]);

        Plan::create([
            'name'             => '0T04',
            'type'         => '0T04',
        ]);
    }
}