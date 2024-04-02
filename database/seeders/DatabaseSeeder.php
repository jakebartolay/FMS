<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Call the UserSeeder to create SuperAdmin and Admin users
        $this->call(UserSeeder::class);

        // Call the RolesSeeder to create roles
        $this->call(RolesSeeder::class);
    }
}
