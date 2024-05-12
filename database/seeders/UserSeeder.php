<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\fms10_accounts;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a SuperAdmin user
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin123'), // Change 'password' to your desired password
            'role' => '1',
        ]);

        // Create an Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // Change 'password' to your desired password
            'role' => '2',
        ]);

        User::create([
            'name' => 'jake bartolay',
            'firstname' => 'jake',
            'lastname' => 'bartolay',
            'account_number' => '123',
            'user_id' => '3',
            'email' => 'jakebartolay147@gmail.com',
            'profile_path_picture' => 'https://ui-avatars.com/api/?name=Jake+Bartolay',
            'password' => bcrypt('12345678'), // Change 'password' to your desired password
            'role' => '100',
            'status' => 'Active',
        ]);

        fms10_accounts::create([
            'id' => '18d04826-49ae-41b1-b72f-1442ac6d7cb8',
            'firstname' => 'jake',
            'lastname' => 'bartolay',
            'user_id' => '3',
            'balance' => '0.00',
            'status' => 'Active',
        ]);
    }
}
