<?php

namespace Database\Seeders;

use App\Models\ThirdPartyPlatform;
use Illuminate\Database\Seeder;

class ThirdPartyPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThirdPartyPlatform::create([
            'name'             => 'Namecheap',
        ]);

        ThirdPartyPlatform::create([
            'name'             => 'awber',
        ]);

        ThirdPartyPlatform::create([
            'name'             => 'sendgrid',
        ]);
    }
}
