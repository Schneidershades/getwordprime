<?php

namespace Database\Seeders;

use App\Models\ScriptType;
use App\Models\ScriptTypePreset;
use Illuminate\Database\Seeder;

class ScriptTypePresetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScriptTypePreset::create([
            'script_type_id' => ScriptType::first()->id,
            'question' => 'The name of the product is ',
            'field_type' => 'text',
            'label' => 'Product Name',
            'placeholder' => 'Maximilla hairoil',
        ]);
    }
}
