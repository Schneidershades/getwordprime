<?php

namespace Database\Seeders;

use App\Models\ScriptType;
use Illuminate\Database\Seeder;

class ScriptTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ScriptType::Create([
            'name'             => 'Blog Subject Lines',
            'icon'             => '---',
            'description'      => 'Eye-catching blog headlines that make visitors click',
        ]);

        ScriptType::Create([
            'name'             => 'Product Promotion Email',
            'icon'             => '---',
            'description'      => 'Get your users to see value in your product/offer and beg you to take their money',
        ]);

        ScriptType::Create([
            'name'             => 'Affiliate Promotion Email',
            'icon'             => '---',
            'description'      => 'Make your audience go crazy while you rake in huge commissions',
        ]);

        ScriptType::Create([
            'name'             => 'Discount Offer Email',
            'icon'             => '---',
            'description'      => 'Hot offers and create FOMO and drive conversion',
        ]);

        ScriptType::Create([
            'name'             => 'Product Launch Email',
            'icon'             => '---',
            'description'      => 'Launch your product and with hot early bird emails',
        ]);

        ScriptType::Create([
            'name'             => 'B2B Cold Email',
            'icon'             => '---',
            'description'      => 'Make your audience go crazy while you rake in huge commissions',
        ]);


        ScriptType::Create([
            'name'             => 'Email Subject Line Blog Subject Lines',
            'icon'             => '---',
            'description'      => 'Write a high-converting subject line for your email',
        ]);

    }
}

