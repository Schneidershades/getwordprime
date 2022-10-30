<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CampaignTableSeeder::class);
        $this->call(ScriptTypeCategorySeeder::class);
        $this->call(TutorialTableSeeder::class);
        $this->call(SuggestionTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(PaymentGatewayListTableSeeder::class);
        $this->call(BonusTableSeeder::class);
        $this->call(AgencyTableSeeder::class);
    }
}
