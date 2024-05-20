<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert(
            [
                'npm' => '20000002',
                'nama_mahasiswa' => 'John Doe',
                'tanggal_lahir' => '2002-05-01',
                'tempat_lahir' => 'Palembang',
                'alamat' => 'Jl. Jend Sudirman',
                'prodi_id' => 1,
                'created_at' => now()
            ]
        );
    }
}
