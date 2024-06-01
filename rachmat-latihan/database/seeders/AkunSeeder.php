<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'email' => 'admin@gmail.com',
                'name' => 'Akun Admin',
                'level' => 'admin',
                'password' => Hash::make("123456")
            ],
            [
                'email' => 'user1@gmail.com',
                'name' => 'Akun User 1',
                'level' => 'user',
                'password' => Hash::make("123456")
            ],
            [
                'email' => 'user2@gmail.com',
                'name' => 'Akun User 2',
                'level' => 'user',
                'password' => Hash::make("123456")
            ]
        ];
        User::insert($user);
    }
}
