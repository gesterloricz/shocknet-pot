<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'printer',
            'password' => Hash::make('printer'),
            'role' => 'printing',
        ]);

        User::create([
            'username' => 'postpress',
            'password' => Hash::make('postpress'),
            'role' => 'postpress',
        ]);

        User::create([
            'username' => 'packaging',
            'password' => Hash::make('packaging'),
            'role' => 'packaging',
        ]);
    }
}
