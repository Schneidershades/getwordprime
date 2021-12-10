<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::create([
            'name'             => 'Time',
            'user_id'         => 1,
        ]);

        Campaign::create([
            'name'             => 'Timing',
            'user_id'         => 2,
        ]);
    }
}
