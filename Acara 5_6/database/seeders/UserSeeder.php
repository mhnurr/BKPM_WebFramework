<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Moh Nur Huda',
            'email' => 'hudamohammadnur1987@gmail.com',
            'password' => Hash::make('huda123'), // ganti dengan password yang diinginkan
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('huda123'), // ganti dengan password yang diinginkan
        ]);
    }
}
