<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Prodi;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Prodi::insert([
            ['nama' => 'Informatika'],
            ['nama' => 'Sistem Informasi'],
            ['nama' => 'Manajemen Informatika'],
        ]);

        DB::table('prodis')->insert([
            ['nama' => 'Informatika', 'created_at' => now()],
            ['nama' => 'Akuntansi','created_at' => now()],
        ]);

        
    }
}
