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
            'script_type_id'       => 1,
            'user_id'         => 1,
            'answers'         => 'Write a creative ad for the following product to run on Facebook:',
        ]);

        UserScriptTypePreset::create([
            'script_type_preset_id'       => 2,
            'script_type_id'       => 1,
            'user_id'         => 1,
            'answers'         => 'Airee is a line of skin-care products for young women with delicate skin. The ingredients are all-natural.',
        ]);

        UserScriptTypePreset::create([
            'script_type_preset_id'       => 3,
            'script_type_id'       => 1,
            'user_id'         => 1,
            'answers'         => 'This is the ad I wrote for Facebook aimed at teenage girls:',
        ]);

        UserScriptTypePreset::create([
            'script_type_preset_id'       => 1,
            'script_type_id'       => 1,
            'user_id'         => 2,
            'answers'         => 'Write a creative ad for the following product to run on Facebook:',
        ]);

        UserScriptTypePreset::create([
            'script_type_preset_id'       => 2,
            'script_type_id'       => 1,
            'user_id'         => 2,
            'answers'         => 'Airee is a line of skin-care products for young women with delicate skin. The ingredients are all-natural.',
        ]);

        UserScriptTypePreset::create([
            'script_type_preset_id'       => 3,
            'script_type_id'       => 1,
            'user_id'         => 2,
            'answers'         => 'This is the ad I wrote for Facebook aimed at teenage girls:',
        ]);
    }
}
