<?php

namespace Database\Seeders;

use App\Models\User;
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
            'user_id'      => User::first()->id,
            'message'             => 'I feel you can process this activity this way',
            'status' => 'open',
        ]);

        Suggestion::create([
            'user_id'      => User::first()->id,
            'message'             => 'The favorite button is not working',
            'status' => 'open',
        ]);
    }
}