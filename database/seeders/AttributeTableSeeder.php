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
        Attribute::Create([
            'name'             => 'max_tokens',
            'type'         => 'open-api',
        ]);

        Attribute::Create([
            'name'             => 'temperature',
            'type'         => 'open-api',
        ]);

        Attribute::Create([
            'name'             => 'top_p',
            'type'         => 'open-api',
        ]);

        Attribute::Create([
            'name'             => 'presence_penalty',
            'type'         => 'open-api',
        ]);

        Attribute::Create([
            'name'             => 'frequency_penalty',
            'type'         => 'open-api',
        ]);

        Attribute::Create([
            'name'             => 'documents',
            'type'         => 'open-api',
        ]);

        Attribute::Create([
            'name'             => 'query',
            'type'         => 'open-api',
        ]);
    }
}
