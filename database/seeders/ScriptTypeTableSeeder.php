<?php

namespace Database\Seeders;

use App\Models\ScriptType;
use Illuminate\Database\Seeder;

class ScriptTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ScriptType::create([
            'name'              => 'Facebook Ad copy',
            'icon'              => '---',
            'description'       => 'Write a persuasive Facebook ad for your product/offer that gets your audience to take action',
            'prompt_1'          => 'Write a creative ad for the following product to run on Facebook:',
            'prompt_2'          => 'The ad copy would persuade the audience to take action',

            "engine"            => "davinci-instruct-beta", 
            "max_tokens"        => 70,
            "temperature"       => 0.5,
            "top_p"             => 1.0,
            "presence_penalty"  => 0,
            "frequency_penalty" => 0,
            "best_of"           => 1,
            "stream"            => false,
        ]);
    }
}

