<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123'),
            'role_id' => 1, 
        ]);
        
    }
}
