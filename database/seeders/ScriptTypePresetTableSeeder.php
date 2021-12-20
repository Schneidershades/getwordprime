<?php

namespace Database\Seeders;

use App\Models\ScriptTypePreset;
use Illuminate\Database\Seeder;

class ScriptTypePresetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScriptTypePreset::create([
            'script_type_id'       => 1,
            'question'         => 'What is the name of the product or company?',
        ]);

        ScriptTypePreset::create([
            'script_type_id'       => 1,
            'question'         => 'Who are your target audience',
        ]);
    }
}


