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

        ScriptType::create([
            'name'             => 'Blog Subject Lines',
            'icon'             => '---',
            'description'      => 'Eye-catching blog headlines that make visitors click',
            'prompt_1'      => 'This is a subject line for a blog',
            'prompt_2'      => 'Create a title subject line for a blog',
        ]);

        ScriptType::create([
            'name'             => 'Product Promotion Email',
            'icon'             => '---',
            'description'      => 'Get your users to see value in your product/offer and beg you to take their money',
            'prompt_1'      => 'This is an advert to promote a product via email',
            'prompt_2'      => 'Create a catchy email for a for a product',
        ]);

        ScriptType::create([
            'name'             => 'Affiliate Promotion Email',
            'icon'             => '---',
            'description'      => 'Make your audience go crazy while you rake in huge commissions',
            'prompt_1'      => 'This is an advert to promote a product via email',
            'prompt_2'      => 'Create a catchy email for a for a product',
        ]);

        ScriptType::create([
            'name'             => 'Discount Offer Email',
            'icon'             => '---',
            'description'      => 'Hot offers and create FOMO and drive conversion',
            'prompt_1'      => 'This is an email to promote discount offers to clients',
            'prompt_2'      => 'Create a title subject line to promote discount offers to clients',
        ]);

        ScriptType::create([
            'name'             => 'Product Launch Email',
            'icon'             => '---',
            'description'      => 'Launch your product and with hot early bird emails',
            'prompt_1'      => 'This is an email to promote a launch',
            'prompt_2'      => 'Create a title subject line for a blog',
        ]);

        ScriptType::create([
            'name'             => 'B2B Cold Email',
            'icon'             => '---',
            'description'      => 'Make your audience go crazy while you rake in huge commissions',
            'prompt_1'      => 'This is a subject line for a blog',
            'prompt_2'      => 'Create a title subject line for a blog',
        ]);


        ScriptType::create([
            'name'             => 'Email Subject Line Blog Subject Lines',
            'icon'             => '---',
            'description'      => 'Write a high-converting subject line for your email',
            'prompt_1'      => 'This is a subject line for a blog',
            'prompt_2'      => 'Create a title subject line for a blog',
        ]);

    }
}

