<?php

namespace Database\Seeders;

use App\Models\Tone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tone1 = Tone::create([
            'name' => 'Happy',
            'created_at' => '2022-02-28 10:02:37',
            'updated_at' => '2022-02-28 10:02:37'
        ]);



        $tone2 = Tone::create([
            'name' => 'Witty',
            'created_at' => '2022-03-04 14:37:17',
            'updated_at' => '2022-03-04 14:37:17'
        ]);



        $tone3 = Tone::create([
            'name' => 'Friendly',
            'created_at' => '2022-03-17 09:56:56',
            'updated_at' => '2022-03-17 09:57:03'
        ]);



        $tone4 = Tone::create([
            'name' => 'Luxury',
            'created_at' => '2022-03-17 09:57:14',
            'updated_at' => '2022-03-17 09:57:14'
        ]);



        $tone5 = Tone::create([
            'name' => 'Relaxed',
            'created_at' => '2022-03-17 09:57:24',
            'updated_at' => '2022-03-17 09:57:24'
        ]);



        $tone6 = Tone::create([
            'name' => 'Professional',
            'created_at' => '2022-03-17 09:57:29',
            'updated_at' => '2022-03-17 09:57:29'
        ]);



        $tone7 = Tone::create([
            'name' => 'Bold',
            'created_at' => '2022-03-17 09:57:41',
            'updated_at' => '2022-03-17 09:57:41'
        ]);

        $tone8 = Tone::create([
            'name' => 'Adventurous',
            'created_at' => '2022-03-17 09:58:01',
            'updated_at' => '2022-03-17 09:58:01'
        ]);



        $tone9 = Tone::create([
            'name' => 'Empathetic',
            'created_at' => '2022-03-17 09:58:13',
            'updated_at' => '2022-03-17 09:58:13'
        ]);



        $tone10 = Tone::create([
            'name' => 'Persuasive',
            'created_at' => '2022-03-17 09:58:19',
            'updated_at' => '2022-03-17 09:58:19'
        ]);

        $tone11 = Tone::create([
            'name' => 'Positive',
            'created_at' => '2022-03-17 09:58:31',
            'updated_at' => '2022-03-17 09:58:31'
        ]);
    }
}
