<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'rafa prayata',
            'email' => 'rafa@gmail.com',
            'username' => 'rafa',
            'password' => Hash::make('123455'), // Pastikan dienkripsi
        ]);
        User::create([
            'nama' => 'ronny JR',
            'email' => 'ronny@gmail.com',
            'username' => 'ronny',
            'password' => Hash::make('123455'), // Pastikan dienkripsi
        ]);
    }
}
