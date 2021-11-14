<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserScriptTypePreset;

class UserScriptTypePresetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserScriptTypePreset::create([
            'script_type_preset_id'       => 1,
            'user_id'         => 1,
            'answers'         => 'I am running an ads for a paint company',
        ]);

        UserScriptTypePreset::create([
            'script_type_preset_id'       => 2,
            'user_id'         => 1,
            'answers'         => 'My target audience are for people with home builders',
        ]);
    }
}
