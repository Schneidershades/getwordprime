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
        $this->call(AttributeTableSeeder::class);
        $this->call(ScriptTypeTableSeeder::class);
        $this->call(TutorialTableSeeder::class);
        $this->call(SuggestionTableSeeder::class);
        $this->call(ScriptTypeAttributeTableSeeder::class);
        $this->call(ScriptTypePresetTableSeeder::class);
        $this->call(UserScriptTypePresetSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(ThirdPartyPlatformsTableSeeder::class);
        $this->call(PlatformIntegrationTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
    }
}
