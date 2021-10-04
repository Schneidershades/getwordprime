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
            'script_type_id'       => '1',
            'attribute_id'         => '1',
            'value'                => '0',
        ]);

        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 2,
            'value'                => 0,
        ]);


        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 2,
            'value'                => 0.7,
        ]);


        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 3,
            'value'                => 1,
        ]);

        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 4,
            'value'                => 0.75,
        ]);

        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 5,
            'value'                => 0.75,
        ]);

        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 5,
            'value'                => 1,
        ]);

        ScriptTypeAttribute::Create([
            'script_type_id'       => 1,
            'attribute_id'         => 5,
            'value'                => false,
        ]);

    }
}
