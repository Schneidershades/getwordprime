<?php

namespace Database\Seeders;

use App\Models\Bonus;
use Illuminate\Database\Seeder;

class BonuseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bonus::create([
            'name'             => 'loren',
            'description'         => 'loren',
            'url'         => 'https://lorem',
        ]);

        Bonus::create([
            'name'             => 'loren',
            'description'         => 'loren',
            'url'         => 'https://lorem',
        ]);
    }
}
