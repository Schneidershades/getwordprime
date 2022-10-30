<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Plan;
use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basic = Plan::create([
            'name' => 'Basic',
            'role' => 'User',
            'description' => 'Basic',
            'amount' => 0,
            'full_description' => 'Get certified true copies of essential documents',
            'periodicity' => 1,
            'periodicity_type' => PeriodicityType::Month,
        ]);

        $pro = Plan::create([
            'name' => 'Pro',
            'role' => 'User',
            'description' => 'Pro',
            'amount' => 9900,
            'full_description' => 'Get certified true copies of essential documents',
            'periodicity' => 1,
            'periodicity_type' => PeriodicityType::Month,
        ]);

        $business = Plan::create([
            'name' => 'Business',
            'role' => 'User',
            'description' => 'Business',
            'full_description' => 'Get certified true copies of essential documents',
            'amount' => 19900,
            'periodicity' => 1,
            'periodicity_type' => PeriodicityType::Month,
        ]);

        $custom = Plan::create([
            'name' => 'Custom',
            'role' => 'User',
            'description' => 'Custom',
            'full_description' => 'Get certified true copies of essential documents',
            'amount' => 0,
            'periodicity' => 1,
            'periodicity_type' => PeriodicityType::Month,
        ]);

        
        $users = Feature::create([
            'consumable' => true,
            'model_type' => 'TeamUser',
            'name' => 'Number of Users',
        ]);

        $envelops = Feature::create([
            'consumable' => true,
            'model_type' => 'Document',
            'name' => 'Number of Envelops',
        ]);

        $trail = Feature::create([
            'consumable' => false,
            'model_type' => null,
            'name' => 'Access to audit trail',
        ]);

        $seal = Feature::create([
            'consumable' => false,
            'model_type' => null,
            'name' => 'Digitise, Signature, Stamp and Seal',
        ]);

        $branding = Feature::create([
            'consumable' => false,
            'model_type' => 'Company',
            'name' => 'Personal Branding',
        ]);

        $sms = Feature::create([
            'consumable' => false,
            'model_type' => null,
            'name' => 'SMS Notifications',
        ]);

        $usersFeature = Feature::where('name', 'Number of Users')->first();
        $envelopsFeature = Feature::where('name', 'Number of Envelops')->first();
        $trailFeature = Feature::where('name', 'Access to audit trail')->first();
        $sealFeature = Feature::where('name', 'Digitise, Signature, Stamp and Seal')->first();
        $brandingFeature = Feature::where('name', 'Personal Branding')->first();
        $smsFeature = Feature::where('name', 'SMS Notifications')->first();

        $basic->features()->attach($usersFeature, ['charges' => 10]);
        $pro->features()->attach($usersFeature, ['charges' => 500]);
        $business->features()->attach($usersFeature, ['charges' => 1000]);

        $basic->features()->attach($envelopsFeature, ['charges' => 10]);
        $pro->features()->attach($envelopsFeature, ['charges' => 500]);
        $business->features()->attach($envelopsFeature, ['charges' => 1000]);

        $basic->features()->attach($trailFeature);
        $pro->features()->attach($trailFeature);
        $business->features()->attach($trailFeature);

        $basic->features()->attach($sealFeature);
        $pro->features()->attach($sealFeature);
        $business->features()->attach($sealFeature);

        $business->features()->attach($brandingFeature);
        $business->features()->attach($smsFeature);
    }
}
