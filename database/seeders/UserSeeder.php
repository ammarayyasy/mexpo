<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Ammar Ayyasy',
            'email' => 'ammarmojur@gmail.com',
            'password' => Hash::make('complongs123'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Kevin Galau',
            'email' => 'kevin@gmail.com',
            'password' => Hash::make('123456'),
        ])->assignRole('user 1');

        User::create([
            'name' => 'Dea Eka',
            'email' => 'dea@gmail.com',
            'password' => Hash::make('123456'),
        ])->assignRole('user 2');
    }
}
