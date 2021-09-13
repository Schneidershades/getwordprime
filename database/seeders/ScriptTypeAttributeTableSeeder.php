<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScriptTypeAttribute;

class ScriptTypeAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScriptTypeAttribute::Create([
            'script_type_id'       => 'B2B Cold Email',
            'attribute_id'         => '---',
            'value'                => '---',
        ]);

    }
}
