<?php

namespace Database\Seeders;

use App\Models\PlatformIntegration;
use Illuminate\Database\Seeder;

class PlatformIntegrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlatformIntegration::create([
            'platform_integration_id'   => 1,
            'platform_keys'             => 'xxxxxxxxxxxxxxxxxxxxxxx',
            'user_id'                   => 1,
        ]);

        PlatformIntegration::create([
            'platform_integration_id'   => 2,
            'platform_keys'             => 'xxxxxxxxxxxxxxxxxxxxxxx',
            'user_id'                   => 1,
        ]);

        PlatformIntegration::create([
            'platform_integration_id'   => 3,
            'platform_keys'             => 'xxxxxxxxxxxxxxxxxxxxxxx',
            'user_id'                   => 1,
        ]);
    }
}
