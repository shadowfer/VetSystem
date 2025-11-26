<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staff User',
            'email' => 'staff@test.com',
            'password' => 'password',
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Client User',
            'email' => 'client@test.com',
            'password' => 'password',
            'role' => 'client',
        ]);
    }
}
