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
            'firstname' => 'SuperAdmin',
            'lastname' => 'SuperAdmin',
            'account_number' => '101',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin123'), // Change 'password' to your desired password
            'role' => '1',
        ]);

        // Create an Admin user
        User::create([
            'name' => 'Admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'account_number' => '102',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // Change 'password' to your desired password
            'role' => '2',
        ]);

        User::create([
            'name' => 'Jake Bartolay',
            'firstname' => 'Jake',
            'lastname' => 'Bartolay',
            'account_number' => '987654',
            'user_id' => '3',
            'email' => 'jakebartolay147@gmail.com',
            'type' => 'Investor',
            'profile_path_picture' => 'https://ui-avatars.com/api/?name=Jake+Bartolay',
            'password' => bcrypt('12345678'), // Change 'password' to your desired password
            'role' => '100',
            'status' => 'Active',
        ]);

        fms10_accounts::create([
            'id' => '20016708',
            'firstname' => 'Jake',
            'lastname' => 'Bartolay',
            'user_id' => '3',
            'balance' => '0.00',
            'status' => 'Active',
        ]);

        User::create([
            'name' => 'James Smith',
            'firstname' => 'James',
            'lastname' => 'Smith',
            'account_number' => '998877',
            'user_id' => '4',
            'email' => 'jamessmith@gmail.com',
            'type' => 'Investor',
            'profile_path_picture' => 'https://ui-avatars.com/api/?name=James+Smith',
            'password' => bcrypt('12345678'), // Change 'password' to your desired password
            'role' => '100',
            'status' => 'Active',
        ]);

        fms10_accounts::create([
            'id' => '20016800',
            'firstname' => 'James',
            'lastname' => 'Smith',
            'user_id' => '4',
            'balance' => '0.00',
            'status' => 'Active',
        ]);
    }
}
