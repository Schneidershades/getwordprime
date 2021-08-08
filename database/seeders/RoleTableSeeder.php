<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::Create([
            'name'             => 'admin',
        ]);

        Role::Create([
            'name'             => 'instructor',
        ]);

        Role::Create([
        	'name'             => 'student',
        ]);
    }
}
