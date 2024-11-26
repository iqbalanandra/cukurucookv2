<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a specific user with username "iqbal" and password "123456"
        User::create([
            'username' => 'iqbal',
            'email' => 'iqbal@example.com',
            'password' => Hash::make('123456'),
            'profilePicture' => '1731342959_pasfoto 500kbMax.jpg',
            'level' => 'user',
        ]);

        // Menambahkan users random menggunakan faker
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'profilePicture' => null,
                'level' => $faker->randomElement(['user', 'admin']),
            ]);
        }
    }
}
