<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScriptTypeUserPromptAnswer;

class ScriptTypeUserPromptAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScriptTypeUserPromptAnswer::create([
            'script_type_prompt_id'       => 1,
            'user_id'         => 1,
            'answers'         => 'I am running an ads for a paint company',
        ]);

        ScriptTypeUserPromptAnswer::create([
            'script_type_prompt_id'       => 2,
            'user_id'         => 1,
            'answers'         => 'My target audience are for people with home builders',
        ]);
    }
}
