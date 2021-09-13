<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ScriptTypeTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
        $this->call(ScriptTypeAttributeTableSeeder::class);
        $this->call(ScriptTypeTableSeeder::class);
    }
}
