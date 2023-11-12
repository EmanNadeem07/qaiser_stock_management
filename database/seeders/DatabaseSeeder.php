<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Shan Nadeem',
            'email' => 'shannadeem16@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
