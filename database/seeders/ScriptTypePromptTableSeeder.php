<?php

namespace Database\Seeders;

use App\Models\ScriptTypePrompt;
use Illuminate\Database\Seeder;

class ScriptTypePromptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScriptTypePrompt::create([
            'script_type_prompt_id'       => 1,
            'user_id'         => 'What is the name of the blog subject line you want to run an ads for',
        ]);

        ScriptTypePrompt::create([
            'script_type_id'       => 1,
            'question'         => 'Who are your target audience',
        ]);
    }
}
