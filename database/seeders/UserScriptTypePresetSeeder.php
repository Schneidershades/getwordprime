<?php

namespace Database\Seeders;

use App\Models\ScriptType;
use App\Models\User;
use App\Models\UserScriptTypePreset;
use Illuminate\Database\Seeder;

class UserScriptTypePresetSeeder extends Seeder
{
    public function run()
    {
        UserScriptTypePreset::create([
            'script_type_preset_id' => UserScriptTypePreset::first()->id,
            'script_type_id' => ScriptType::first()->id,
            'user_id' => User::first()->id,
            'answers' => 'Dela Care',
        ]);
    }
}
