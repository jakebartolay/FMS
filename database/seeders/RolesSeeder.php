<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => '1',
            'role' => '1',
            'name' => 'SuperAdmin',
        ]);

        Role::create([
            'id' => '2',
            'role' => '2',
            'name' => 'Admin',
        ]);
    }
}
