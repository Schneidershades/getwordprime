<?php

namespace Database\Seeders;

use App\Models\FreelancerKeyword;
use Illuminate\Database\Seeder;

class FreelancerKeywordTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        FreelancerKeyword::create([
            'words'             => 'Writing & Content',
        ]);
    }
}
