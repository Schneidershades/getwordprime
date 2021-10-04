<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'name'             => 'max_tokens',
            'type'         => 'open-api',
        ]);

        Attribute::create([
            'name'             => 'temperature',
            'type'         => 'open-api',
        ]);

        Attribute::create([
            'name'             => 'top_p',
            'type'         => 'open-api',
        ]);

        Attribute::create([
            'name'             => 'presence_penalty',
            'type'         => 'open-api',
        ]);

        Attribute::create([
            'name'             => 'frequency_penalty',
            'type'         => 'open-api',
        ]);

        Attribute::create([
            'name'             => 'documents',
            'type'         => 'open-api',
        ]);

        Attribute::create([
            'name'             => 'query',
            'type'         => 'open-api',
        ]);
    }
}
