<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Ensure you use a secure password
            'level' => 'admin', // Set the level to 'admin'
            'profilePicture' => 'default.png', // Optional: set a default profile picture if required
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
