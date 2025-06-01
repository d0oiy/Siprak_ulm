<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;  // Jangan lupa import model User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin SIPRAK',
            'email' => 'admin@siprak.ac.id',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Mahasiswa ULM',
            'email' => 'mhs@siprak.ac.id',
            'password' => bcrypt('mhs123'),
            'role' => 'user',
        ]);
    }
}
