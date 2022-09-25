<?php

namespace Database\Seeders;

use App\Models\ScriptType;
use Illuminate\Database\Seeder;
use App\Models\ScriptTypePreset;
use App\Models\ScriptTypeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScriptTypeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scriptTypeCategory1 = ScriptTypeCategory::create([
            'name' => 'Google',
        ]);

        $scriptTypeCategory2 = ScriptTypeCategory::create([
            'name' => 'SEO Tools',
        ]);

        $scriptTypeCategory3 = ScriptTypeCategory::create([
            'name' => 'Email',
        ]);

        $scriptTypeCategory4 = ScriptTypeCategory::create([
            'name' => 'Youtube',
        ]);

        $scriptTypeCategory5 = ScriptTypeCategory::create([
            'name' => 'Copywriting',
        ]);

        $scriptTypeCategory6 = ScriptTypeCategory::create([
            'name' => 'Website',
        ]);

        $scriptTypeCategory7 = ScriptTypeCategory::create([
            'name' => 'Writing Templates',
        ]);

        $scriptTypeCategory8 = ScriptTypeCategory::create([
            'name' => 'Ecommerce',
        ]);

        $scriptTypeCategory9 = ScriptTypeCategory::create([
            'name' => 'Blogging',
        ]);

        $scriptTypeCategory10 = ScriptTypeCategory::create([
            'name' => 'Social Media',
        ]);

        $scriptTypeCategory11 = ScriptTypeCategory::create([
            'name' => 'Business Tools',
        ]);

        $scriptTypeCategory12 = ScriptTypeCategory::create([
            'name' => 'Personal Tools',
        ]);


        $scriptType1 = ScriptType::create([
            'name' => 'Ad Copy Variation',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Write variations for your existing ad copy',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Create variations for the following ad copy',
            'prompt_2' => 'Make it creative',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '200',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType2 = ScriptType::create([
            'name' => 'Facebook Link Description',
            'icon' => 'https://onecopy.ai/images/facebook.png',
            'description' => 'Write the link description for your Facebook ad campaign',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Rewrite this product\'s Facebook link description in 6 words or less:',
            'prompt_2' => 'Give 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType3 = ScriptType::create([
            'name' => 'General Ad Copy',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Write ad copy for your marketing campaign on any platform',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Write an ad copy for this product',
            'prompt_2' => 'The goal is to persuade the audience to take action',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '1000',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType4 = ScriptType::create([
            'name' => 'Facebook Primary Text',
            'icon' => 'https://onecopy.ai/images/facebook.png',
            'description' => 'Write a persuasive Facebook ad for your product/offer',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Write a creative ad for the following product to run on Facebook',
            'prompt_2' => 'The goal is to persuade the audience to take action',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '200',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType5 = ScriptType::create([
            'name' => 'Facebook Headline',
            'icon' => 'https://onecopy.ai/images/facebook.png',
            'description' => 'Write the perfect headline for your Facebook Ad campaign',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Write a marketing copy headline for Facebook Ad to get the user to purchase the product',
            'prompt_2' => 'maximum of 10 words in the output',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType6 = ScriptType::create([
            'name' => 'Google Ads Description',
            'icon' => 'https://onecopy.ai/images/google.png',
            'description' => 'Create a description for your Google ad campaign',
            'script_type_category_id' => $scriptTypeCategory1->id,
            'prompt_1' => 'Write a persuasive Google ad copy to gets your audience to take action',
            'prompt_2' => 'Add a call to action',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType7 = ScriptType::create([
            'name' => 'Google Ads Headline',
            'icon' => 'https://onecopy.ai/images/google.png',
            'description' => 'Create a compelling Google Ads headline that drives clicks',
            'script_type_category_id' => $scriptTypeCategory1->id,
            'prompt_1' => 'Create a compelling Google Ads headline that drives clicks',
            'prompt_2' => 'Maximum of 8 words',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType8 = ScriptType::create([
            'name' => 'Call To Action',
            'icon' => 'https://onecopy.ai/images/website.png',
            'description' => 'Generate a compelling call to action for your product/brand',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Write a call to action button text for the following product',
            'prompt_2' => 'Maximum of 4 words',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '50',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType9 = ScriptType::create([
            'name' => 'Event Promotion',
            'icon' => 'https://onecopy.ai/images/website.png',
            'description' => 'Generate a copy for an event promotion',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Write a marketing copy to promote an event',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType10 = ScriptType::create([
            'name' => 'LinkedIn Ad Copy',
            'icon' => 'https://onecopy.ai/images/linkedin.png',
            'description' => 'Generate an ad copy for your LinkedIn Campaign',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Write a creative ad for the following product to run on LinkedIn',
            'prompt_2' => 'The goal is to persuade the audience to take action',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '200',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType11 = ScriptType::create([
            'name' => 'Amazon Product Description',
            'icon' => 'https://onecopy.ai/images/amazon.png',
            'description' => 'Write a product description that moves buyers to action',
            'script_type_category_id' => $scriptTypeCategory8->id,
            'prompt_1' => 'Write an amazon product listing description to help sell more',
            'prompt_2' => 'Make it compelling',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType12 = ScriptType::create([
            'name' => 'Amazon Product Features',
            'icon' => 'https://onecopy.ai/images/amazon.png',
            'description' => 'Convert the following list of product features to benefit that compels buyers to take action',
            'script_type_category_id' => $scriptTypeCategory8->id,
            'prompt_1' => 'Convert the following list of product features to benefit',
            'prompt_2' => 'Make the result a list',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType13 = ScriptType::create([
            'name' => 'Landing Page Hero Headline',
            'icon' => 'https://onecopy.ai/images/website.png',
            'description' => 'Craft a catchy headline that makes your reader interested in your content',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Write a eye-catching headline for a landing page',
            'prompt_2' => 'It should be able to hook the reader',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType14 = ScriptType::create([
            'name' => 'Website Meta Description',
            'icon' => 'https://onecopy.ai/images/website.png',
            'description' => 'Write a short & captivating meta description for your website',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Write a short 15 word meta description for a website',
            'prompt_2' => 'Should be catchy',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType15 = ScriptType::create([
            'name' => 'Niche Question Generator',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Generate questions your market might have about your product/solution',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Generate niche related questions to this product or topic',
            'prompt_2' => 'Create 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType16 = ScriptType::create([
            'name' => 'Customer Review Generator',
            'icon' => 'https://onecopy.ai/images/review.png',
            'description' => 'Generate testimonials/Social proof for your product or service',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Create a testimonials for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType17 = ScriptType::create([
            'name' => 'Landing Page Subheader',
            'icon' => 'https://onecopy.ai/images/website.png',
            'description' => 'Write the perfect subheader for your landing page',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Write a attention grabbing subheader text for a website',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType18 = ScriptType::create([
            'name' => 'Blog Post Headline',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Create an attention-grabbing headline for your article or blog post',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Create an attention-grabbing headline for a blog post',
            'prompt_2' => 'Maximum of 12 words',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType19 = ScriptType::create([
            'name' => 'Blog Intro',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Write the intro for a blog article to hook readers',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Write the intro for a blog article',
            'prompt_2' => 'Make it a paragraph that hooks the reader',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType20 = ScriptType::create([
            'name' => 'Blog Post Ideas',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Brainstorm blog post ideas to drive organic traffic for your product',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Generate blog post topic ideas for the following product niche',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType21 = ScriptType::create([
            'name' => 'Listicle Blog Post Title',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Write a blog post title for a listicle',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Write a blog post title for a listicle',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType22 = ScriptType::create([
            'name' => 'Keyword Generator',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Generate keywords for your blog post',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Generate keywords for the following blog post idea',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType23 = ScriptType::create([
            'name' => 'Bullet Point to Paragraph',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Expand a bullet point or idea into a blog paragraph section',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Expand the following sentence into a short blog article',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.3',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType24 = ScriptType::create([
            'name' => 'Blog Post Conclusion',
            'icon' => 'https://onecopy.ai/images/blog.png',
            'description' => 'Write a conclusion for a blog post',
            'script_type_category_id' => $scriptTypeCategory9->id,
            'prompt_1' => 'Write a conclusion paragraph for a blog post',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType25 = ScriptType::create([
            'name' => 'Welcome email',
            'icon' => 'https://onecopy.ai/images/email.png',
            'description' => 'Write a welcome email for new customers',
            'script_type_category_id' => $scriptTypeCategory3->id,
            'prompt_1' => 'Write a welcome email for a new subscriber',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);

        $scriptType26 = ScriptType::create([
            'name' => 'Thank You Message',
            'icon' => 'https://onecopy.ai/images/email.png',
            'description' => 'Write a heartwarming thank you note',
            'script_type_category_id' => $scriptTypeCategory3->id,
            'prompt_1' => 'Write a short thank you note',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType27 = ScriptType::create([
            'name' => 'Follow-Up Email',
            'icon' => 'https://onecopy.ai/images/email.png',
            'description' => 'Write a follow-up email after a meeting',
            'script_type_category_id' => $scriptTypeCategory3->id,
            'prompt_1' => 'Write a follow up email after a meeting',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '1000',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType28 = ScriptType::create([
            'name' => 'Purchase Confirmation Email',
            'icon' => 'https://onecopy.ai/images/email.png',
            'description' => 'Write an email for a purchase confirmation',
            'script_type_category_id' => $scriptTypeCategory3->id,
            'prompt_1' => 'Write an email for a purchase conformation for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType29 = ScriptType::create([
            'name' => 'Email Subject Line',
            'icon' => 'https://onecopy.ai/images/email.png',
            'description' => 'Generate a catchy email subject line that gets people to open your email',
            'script_type_category_id' => $scriptTypeCategory3->id,
            'prompt_1' => 'Write an email subject line that is catchy for the following product',
            'prompt_2' => 'Keep it short',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType30 = ScriptType::create([
            'name' => 'Cancellation Email',
            'icon' => 'https://onecopy.ai/images/email.png',
            'description' => 'Draft a cancellation email',
            'script_type_category_id' => $scriptTypeCategory3->id,
            'prompt_1' => 'Draft a cancellation email for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType31 = ScriptType::create([
            'name' => 'Instagram Post Caption',
            'icon' => 'https://onecopy.ai/images/instagram.png',
            'description' => 'Create an Instagram Post Caption for your photo',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Create an Instagram Post Caption for following content',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType32 = ScriptType::create([
            'name' => 'Instagram Product Post',
            'icon' => 'https://onecopy.ai/images/instagram.png',
            'description' => 'Create an Instagram Caption for your production promotion',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Create an instagram caption for a product promotion',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType33 = ScriptType::create([
            'name' => 'Instagram Hashtag Generator',
            'icon' => 'https://onecopy.ai/images/instagram.png',
            'description' => 'Generate relevant and trendy hashtags for your Instagram post',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Generate relevant and trendy hashtags for an Instagram post',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType34 = ScriptType::create([
            'name' => 'Brainstorm a Hook',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Brainstorm a hook for your social media post',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Generate a hook for the following social media post',
            'prompt_2' => 'The post should hold the readers attention',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType35 = ScriptType::create([
            'name' => 'Product Launch Announcement',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Get post ideas for launching your product to your social media audience',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Generate a social media post for a product launch announcement',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType36 = ScriptType::create([
            'name' => 'Tik Tok Content Idea',
            'icon' => 'https://onecopy.ai/images/tik-tok.png',
            'description' => 'Generate content ideas for your Tik Tok post',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Generate tik tok content ideas for the following',
            'prompt_2' => 'Make 5 Variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType37 = ScriptType::create([
            'name' => 'Video Call To Action',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Create the perfect call to action for your video',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'Create a short call to action text for the following content',
            'prompt_2' => 'Maximum of 10 words',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '05',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType38 = ScriptType::create([
            'name' => 'YouTube Video Title',
            'icon' => 'https://onecopy.ai/images/youtube.png',
            'description' => 'Brainstorm video title ideas for your YouTube video',
            'script_type_category_id' => $scriptTypeCategory4->id,
            'prompt_1' => 'Generate a youtube video title for the following post',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType39 = ScriptType::create([
            'name' => 'YouTube Video Description',
            'icon' => 'https://onecopy.ai/images/youtube.png',
            'description' => 'Generate a video description for your YouTube video',
            'script_type_category_id' => $scriptTypeCategory4->id,
            'prompt_1' => 'Generate a description for the following video on Youtube',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType40 = ScriptType::create([
            'name' => 'Video Topic Ideas',
            'icon' => 'https://onecopy.ai/images/youtube.png',
            'description' => 'Brainstorm new video topics to engage visitors and rank on YouTube.',
            'script_type_category_id' => $scriptTypeCategory4->id,
            'prompt_1' => 'Generate trendy video topic ideas for youtube',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType41 = ScriptType::create([
            'name' => 'AIDA Framework',
            'icon' => 'https://onecopy.ai/images/funnel.png',
            'description' => 'Write an Attention-Interest-Desire-Action framework copy for your product',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Write an Attention-Interest-Desire-Action framework copy for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType42 = ScriptType::create([
            'name' => 'Relatable Experiences',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Generate relatable experience ideas in your niche',
            'script_type_category_id' => $scriptTypeCategory10->id,
            'prompt_1' => 'What are the common experience of people in the following niche',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType43 = ScriptType::create([
            'name' => 'Review Response',
            'icon' => 'https://onecopy.ai/images/review.png',
            'description' => 'Write responses to customer reviews that are friendly, professional, and welcoming',
            'script_type_category_id' => $scriptTypeCategory6->id,
            'prompt_1' => 'Generate a reply to a customer review',
            'prompt_2' => 'Make it friendly and professional',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType44 = ScriptType::create([
            'name' => 'Before-After-Bridge Copy',
            'icon' => 'https://onecopy.ai/images/funnel.png',
            'description' => 'Create a before and after copy for your email, sales page or ad',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Generate a Before-After-Bridge copy for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType45 = ScriptType::create([
            'name' => 'PAS Framework Copy',
            'icon' => 'https://onecopy.ai/images/funnel.png',
            'description' => 'Write a Pain-Agitate-Solution framework copy for your product',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Write an Pain-Agitate-Solution framework copy for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType46 = ScriptType::create([
            'name' => 'Convert Feature to Benefits',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Turn your list of product features into benefits',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Convert the following list of product features into benefits',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType47 = ScriptType::create([
            'name' => 'Unique Selling Point',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Create a unique selling point for your product',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'generate a unique selling point for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType48 = ScriptType::create([
            'name' => 'Marketing Angles',
            'icon' => 'https://onecopy.ai/images/general.png',
            'description' => 'Brainstorm new marketing angles for your product',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Generate marketing ideas and angles for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType49 = ScriptType::create([
            'name' => 'Problem-Promise-Proof-Proposal',
            'icon' => 'https://onecopy.ai/images/funnel.png',
            'description' => 'Draft a copy for your product following the Problem-Promise-Proof-Proposal framework',
            'script_type_category_id' => $scriptTypeCategory5->id,
            'prompt_1' => 'Generate a copy using the Problem-Promise-Proof-Proposal for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType50 = ScriptType::create([
            'name' => 'Rewrite a Sentence',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Spin a sentence to generate a new plagiarism-free content',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Rewrite this sentence',
            'prompt_2' => 'Make it plagiarism free',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType51 = ScriptType::create([
            'name' => 'Sentence Expander',
            'icon' => 'https://onecopy.ai/images/expand.png',
            'description' => 'Expand a sentence and add more details',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Expand the following sentence for more details',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType52 = ScriptType::create([
            'name' => 'Simplify a Sentence',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Make a sentence simpler with fewer words',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Simplify this sentence and use less words',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '100',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType53 = ScriptType::create([
            'name' => 'Summarize for a 2nd grader',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Summarize a sentence for a 2nd grader to understand',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Summarize this for a second-grade student:',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.7',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType54 = ScriptType::create([
            'name' => 'Sentence improver',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Rewrite content to make it more interesting, creative, and engaging.',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Rewrite content to make it more interesting, creative, and engaging',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType55 = ScriptType::create([
            'name' => 'Cliffhanger',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Create a cliffhanger to keep readers hooked to your article',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Generate a cliffhanger for an article about this topic',
            'prompt_2' => 'It should keep the reader hooked',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType56 = ScriptType::create([
            'name' => 'Essay Introduction',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Write the introduction to an essay',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Generate the introduction for the following essay topic',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType57 = ScriptType::create([
            'name' => 'Essay Outline',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Create an outline for your essay',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Generate an outline for the following essay topic',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType58 = ScriptType::create([
            'name' => 'Create a Hero Story Intro',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Write a short story about your hero',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Write a short intro story about a hero figure',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType59 = ScriptType::create([
            'name' => 'Passive To Active Voice',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Turn a passive copy into an active animated text',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Rewrite the following copy in a more active an compelling voice',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType60 = ScriptType::create([
            'name' => 'Press Release Introduction',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Craft a short press release intro',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Write a short press release intro for the following product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType61 = ScriptType::create([
            'name' => 'Rewrite & Add Keyword',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Write a text and add keywords to it',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Write a text and add the following keywords to it',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType62 = ScriptType::create([
            'name' => 'Two Sentence Story',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Write a short and interesting story in two sentence',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Write a short and interesting story in two sentence with the following topic',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType63 = ScriptType::create([
            'name' => 'Verb Booster',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Find stronger alternatives to any verb',
            'script_type_category_id' => $scriptTypeCategory7->id,
            'prompt_1' => 'Generate stronger alternatives for the following verb',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType64 = ScriptType::create([
            'name' => 'Business Growth Ideas',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Generate ideas to grow and scale your business',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Brainstorm ideas to grow the following business product',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType65 = ScriptType::create([
            'name' => 'Product/Business Name Generator',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Generate a unique name for your product/business',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Generate a business name using the following business description and seed word ideas',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType66 = ScriptType::create([
            'name' => 'Business Startup Ideas',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Brainstorm ideas for a new startup based on your skillset and passion',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Generate business ideas using the following skills or passion',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType67 = ScriptType::create([
            'name' => 'Audience Refiner',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Describe the right audience for your product or service',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Refine the following audience and get more insight',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType68 = ScriptType::create([
            'name' => 'Mission Statement',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Craft a mission statement for your brand',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Generate a mission statement for the following product or brand',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType69 = ScriptType::create([
            'name' => 'Vision Statement',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Craft a vision statement for your brand',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Generate a vision statement for the following product or brand',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType70 = ScriptType::create([
            'name' => 'Brand Voice',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Generate brand voice ideas for your business',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Generate a brand voice idea for the following product or brand',
            'prompt_2' => 'Make 5 variations',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType71 = ScriptType::create([
            'name' => 'Birthday Message',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Create a birthday message for a friend or loved one',
            'script_type_category_id' => $scriptTypeCategory12->id,
            'prompt_1' => 'Generate a birthday message for the following person',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '200',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType72 = ScriptType::create([
            'name' => 'Cover Letter',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Write a cover letter for your Resume',
            'script_type_category_id' => $scriptTypeCategory12->id,
            'prompt_1' => 'Write a resume cover letter for the following role using my experience',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType73 = ScriptType::create([
            'name' => 'Love Letter',
            'icon' => 'https://onecopy.ai/images/article.png',
            'description' => 'Write a love letter to your loved ones',
            'script_type_category_id' => $scriptTypeCategory12->id,
            'prompt_1' => 'Write a love letter with the following details',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.8',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);



        $scriptType74 = ScriptType::create([
            'name' => 'Motto Generator',
            'icon' => 'https://onecopy.ai/images/business.png',
            'description' => 'Discover the perfect motto for your business',
            'script_type_category_id' => $scriptTypeCategory11->id,
            'prompt_1' => 'Generate the perfect motto for the following product or business',
            'prompt_2' => '-',
            'usage' => NULL,
            'engine' => 'text-davinci-002',
            'presence_penalty' => '0',
            'frequency_penalty' => '0',
            'best_of' => '1',
            'stream' => NULL,
            'documents' => NULL,
            'query' => NULL,
            'max_tokens' => '150',
            'temperature' => '0.5',
            'top_p' => '1',
            'activate' => 0,
            'tone' => 1,
            'language' => 1
        ]);


        ScriptTypePreset::create([
            'script_type_id' => $scriptType5->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType5->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType4->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType4->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType2->id,
            'question' => 'Product description:',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType3->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType3->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType2->id,
            'question' => 'Product name:',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType6->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType6->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType7->id,
            'question' => 'Product name:',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType7->id,
            'question' => 'Product description:',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType8->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType8->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType9->id,
            'question' => 'Event description',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'A live event with Uche Nick teaching you how to get more leads & sales for your business/startup',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType10->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType1->id,
            'question' => 'The copy is:',
            'field_type' => 'textarea',
            'label' => 'Write/paste copy here',
            'placeholder' => 'E.g. Looking for a high-converting copywriter, look no further than Onecopy AI Writer.',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType11->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType11->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType12->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType12->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType13->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType13->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType14->id,
            'question' => 'The name of the website is',
            'field_type' => 'text',
            'label' => 'Website/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType14->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your website/product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType15->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'What are you generating questions for?',
            'placeholder' => 'Organic Hair oil for women with brittle hair above 40 years',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType16->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType17->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType17->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType18->id,
            'question' => 'The topic of the article is',
            'field_type' => 'textarea',
            'label' => 'Describe the topic of the blog post',
            'placeholder' => 'AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType19->id,
            'question' => 'The blog post is about',
            'field_type' => 'textarea',
            'label' => 'What is the blog about?',
            'placeholder' => 'AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType19->id,
            'question' => 'The title of the blog post is',
            'field_type' => 'text',
            'label' => 'What is your blog post title?',
            'placeholder' => 'Get your copywriting done faster and easier with AI software!',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType20->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType20->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType21->id,
            'question' => 'The blog post is about',
            'field_type' => 'textarea',
            'label' => 'Describe your blog topic',
            'placeholder' => 'AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType22->id,
            'question' => 'The blog post is about',
            'field_type' => 'textarea',
            'label' => 'What is the blog post about',
            'placeholder' => 'AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType23->id,
            'question' => 'The blog post is about',
            'field_type' => 'textarea',
            'label' => 'What is the blog about?',
            'placeholder' => 'AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType23->id,
            'question' => 'The title of the blog post is',
            'field_type' => 'text',
            'label' => 'What is your blog post title?',
            'placeholder' => 'Get your copywriting done faster and easier with AI software!',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType24->id,
            'question' => 'The title of the blog post is',
            'field_type' => 'text',
            'label' => 'What is your blog post title?',
            'placeholder' => 'Get your copywriting done faster and easier with AI software!',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType24->id,
            'question' => 'The blog post is about',
            'field_type' => 'textarea',
            'label' => 'What is the blog about?',
            'placeholder' => 'AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType25->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType25->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType26->id,
            'question' => 'The note is for',
            'field_type' => 'text',
            'label' => 'Who is the note for?',
            'placeholder' => 'E.g A friend, My Customer, Chioma',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType26->id,
            'question' => 'I am thanking them for',
            'field_type' => 'textarea',
            'label' => 'What would you like to thank them for?',
            'placeholder' => 'Being a good customer and supporting my business',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType27->id,
            'question' => 'The email is about',
            'field_type' => 'textarea',
            'label' => 'What is the email about?',
            'placeholder' => 'Following up after a sales call',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType28->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType28->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType29->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType29->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType30->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType30->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType31->id,
            'question' => 'The post is about',
            'field_type' => 'textarea',
            'label' => 'What is your post about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType32->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType32->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType33->id,
            'question' => 'The instagram post is about',
            'field_type' => 'textarea',
            'label' => 'What is your post about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType34->id,
            'question' => 'The post is about',
            'field_type' => 'textarea',
            'label' => 'What is your post about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType35->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType35->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType36->id,
            'question' => 'The post is about',
            'field_type' => 'textarea',
            'label' => 'What is your post about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType37->id,
            'question' => 'The video title is',
            'field_type' => 'text',
            'label' => 'What is your video title?',
            'placeholder' => 'How to creating marketing copies that sell',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType37->id,
            'question' => 'The video is about',
            'field_type' => 'textarea',
            'label' => 'What is your video about',
            'placeholder' => 'How to creating marketing copies that sell using Artificial Intelligence',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType38->id,
            'question' => 'The video is about',
            'field_type' => 'textarea',
            'label' => 'What is your video about?',
            'placeholder' => 'Using AI copywriter software  to generate content for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType39->id,
            'question' => 'The video title is',
            'field_type' => 'text',
            'label' => 'What is your video title?',
            'placeholder' => 'How to Use AI Copywriter Software to Generate Content',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType39->id,
            'question' => 'The video is about',
            'field_type' => 'textarea',
            'label' => 'What is your video about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType40->id,
            'question' => 'The topic or niche is',
            'field_type' => 'textarea',
            'label' => 'What is the topic/niche?',
            'placeholder' => 'Copywriting for business owners',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType16->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType42->id,
            'question' => 'The target niche is',
            'field_type' => 'textarea',
            'label' => 'What is your target niche?',
            'placeholder' => 'Business owners who need copywriting',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType41->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType41->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType44->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType44->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType45->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType45->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType46->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime Ai Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType46->id,
            'question' => 'The product features are',
            'field_type' => 'textarea',
            'label' => 'List your product features',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType47->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType47->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType48->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType48->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType49->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType49->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'id' => 417,
            'script_type_id' => $scriptType10->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'WordPrime AI',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType50->id,
            'question' => 'The sentence is',
            'field_type' => 'textarea',
            'label' => 'What sentence would you like to rewrite?',
            'placeholder' => 'WordPrime AI is the world\'s first AI copywriter software that helps you create high-converting copy for your campaigns',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType51->id,
            'question' => 'The sentence is',
            'field_type' => 'textarea',
            'label' => 'What sentence would you like to expand?',
            'placeholder' => 'WordPrime AI is the world\'s first AI copywriter software that helps you create high-converting copy for your campaigns',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType52->id,
            'question' => 'The sentence is',
            'field_type' => 'textarea',
            'label' => 'What sentence would you like to simplify?',
            'placeholder' => 'WordPrime AI is the world\'s first AI copywriter software that helps you create high-converting copy for your campaigns',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType53->id,
            'question' => 'The sentence is',
            'field_type' => 'textarea',
            'label' => 'What sentence would you like to resummarizewrite?',
            'placeholder' => 'WordPrime AI is the world\'s first AI copywriter software that helps you create high-converting copy for your campaigns',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType54->id,
            'question' => 'The sentence is',
            'field_type' => NULL,
            'label' => 'What sentence would you like to improve?',
            'placeholder' => 'WordPrime AI is the world\'s first AI copywriter software that helps you create high-converting copy for your campaigns',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType55->id,
            'question' => 'The top is',
            'field_type' => NULL,
            'label' => 'What is your topic?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType56->id,
            'question' => 'The essay title is',
            'field_type' => 'text',
            'label' => 'What is your essay title?',
            'placeholder' => 'WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType56->id,
            'question' => 'The essay is about',
            'field_type' => 'textarea',
            'label' => 'What is your essay about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType57->id,
            'question' => 'The essay title is',
            'field_type' => 'text',
            'label' => 'What is your essay title?',
            'placeholder' => 'WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType57->id,
            'question' => 'The essay is about',
            'field_type' => 'textarea',
            'label' => 'What is your essay about?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType58->id,
            'question' => 'The hero is',
            'field_type' => 'textarea',
            'label' => 'A short background of our hero',
            'placeholder' => 'E.g Benny, a small business owner from Yaba Lagos',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType59->id,
            'question' => 'The copy is about',
            'field_type' => 'textarea',
            'label' => 'What would you like to rewrite?',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType60->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'The name of the product is',
            'placeholder' => 'The name of the product is',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType60->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType61->id,
            'question' => 'The keywords are',
            'field_type' => 'text',
            'label' => 'Keywords (seperated by commas)',
            'placeholder' => 'E.g Copywriting, Sales, Business',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType61->id,
            'question' => 'The text to rewrite is',
            'field_type' => 'textarea',
            'label' => 'The text to rewrite is',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType62->id,
            'question' => 'The topic is',
            'field_type' => 'textarea',
            'label' => 'What is the topic?',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType63->id,
            'question' => 'The verb description is',
            'field_type' => 'textarea',
            'label' => 'Describe your verb',
            'placeholder' => 'E.g Love',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType64->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'E.g. WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType64->id,
            'question' => 'The product description is',
            'field_type' => NULL,
            'label' => 'Describe your product',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType65->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType65->id,
            'question' => 'The seedwords are',
            'field_type' => 'text',
            'label' => 'What are your seedwords?',
            'placeholder' => 'E.g Copywriting, Copy, AI, Marketing',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType66->id,
            'question' => 'The skill sets are',
            'field_type' => 'textarea',
            'label' => 'What are your skills/passion',
            'placeholder' => 'E.g. Building websites using wordpress',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType67->id,
            'question' => 'The audience is',
            'field_type' => 'textarea',
            'label' => 'Describe your audience',
            'placeholder' => 'E.g Business owners who want more customers',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType68->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'E.g. WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType68->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType69->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'E.g. WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType69->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType70->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'E.g. WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType70->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType71->id,
            'question' => 'I am grateful for',
            'field_type' => 'textarea',
            'label' => 'What are you grateful for?',
            'placeholder' => 'E.g. being a good friend and mentor',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType71->id,
            'question' => 'The message is for',
            'field_type' => 'text',
            'label' => 'Who is the message for?',
            'placeholder' => 'E.g. Nick',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType72->id,
            'question' => 'The role is',
            'field_type' => 'text',
            'label' => 'What role is this cover letter for?',
            'placeholder' => 'E.g Media Buyer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType72->id,
            'question' => 'My experience is',
            'field_type' => 'textarea',
            'label' => 'What experience makes you a good candidate?',
            'placeholder' => 'E.g I am skilled an running Facebook Ad Campaign',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType73->id,
            'question' => 'The message is for',
            'field_type' => NULL,
            'label' => 'Who is the message for?',
            'placeholder' => 'E.g. My wife',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType73->id,
            'question' => 'The occasion is',
            'field_type' => 'textarea',
            'label' => 'What is the occasion?',
            'placeholder' => 'E.g. Our wedding anniversary',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType74->id,
            'question' => 'The name of the product is',
            'field_type' => 'text',
            'label' => 'Product/Brand Name',
            'placeholder' => 'E.g. WordPrime AI Writer',
        ]);



        ScriptTypePreset::create([
            'script_type_id' => $scriptType74->id,
            'question' => 'The product description is',
            'field_type' => 'textarea',
            'label' => 'Describe your product',
            'placeholder' => 'E.g. An AI copywriter software for creators, business owners & marketing agencies',
        ]);
    }
}
