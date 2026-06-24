<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Mahasiswa',
            'email' => 'student@example.com',
            'password' => Hash::make('student123'),
            'role' => 'mahasiswa'
        ]);

        // Owner
        User::create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('owner123'),
            'role' => 'owner'
        ]);
    }
}