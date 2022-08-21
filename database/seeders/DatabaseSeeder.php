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
        $this->call(PermissionSeeder::class);
        // $this->call(PlansTableSeeder::class);
        $this->call(CampaignTableSeeder::class);
        $this->call(ScriptTypeTableSeeder::class);
        $this->call(TutorialTableSeeder::class);
        $this->call(SuggestionTableSeeder::class);
        $this->call(ScriptTypePresetTableSeeder::class);
        // $this->call(UserScriptTypePresetSeeder::class);
        // $this->call(PlansTableSeeder::class);
        // $this->call(ThirdPartyPlatformsTableSeeder::class);
        // $this->call(TransactionTableSeeder::class);
        $this->call(BonusTableSeeder::class);
        $this->call(AgencyTableSeeder::class);
    }
}
