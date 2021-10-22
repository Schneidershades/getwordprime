<?php

namespace Database\Seeders;

use App\Models\Suggestion;
use Illuminate\Database\Seeder;

class SuggestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suggestion::create([
            'user_id'      => 1,
            'message'             => 'I feel you can process this activity this way',
            'status' => 'open',
        ]);

        Suggestion::create([
            'user_id'      => 1,
            'message'             => 'The favorite button is not working',
            'status' => 'open',
        ]);
    }
}