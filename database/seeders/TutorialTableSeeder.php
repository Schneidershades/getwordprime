<?php

namespace Database\Seeders;

use App\Models\Tutorial;
use Illuminate\Database\Seeder;

class TutorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tutorial::create([
            'title'             => 'Title 1',
            'description'      => 'description',
            'link'             => 'https://www.youtube.com/watch?v=pRS9LRBgjYg',
        ]);

        Tutorial::create([
            'title'             => 'Title 1',
            'description'      => 'description',
            'link'             => 'https://www.youtube.com/watch?v=pRS9LRBgjYg',
        ]);
        Tutorial::create([
            'title'             => 'Title 1',
            'description'      => 'description',
            'link'             => 'https://www.youtube.com/watch?v=pRS9LRBgjYg',
        ]);
        Tutorial::create([
            'title'             => 'Title 1',
            'description'      => 'description',
            'link'             => 'https://www.youtube.com/watch?v=pRS9LRBgjYg',
        ]);
    }
}
