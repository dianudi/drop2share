<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'role' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'admin@example.com',
        ]);
        User::factory(10)->create();
    }
}
