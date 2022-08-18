<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::create([
            'name'             => 'item matt',
            'email'         => 'item@matt.com',
        ]);

        Agency::create([
            'name'             => 'info matt',
            'email'         => 'info@matt.com',
        ]);
    }
}
