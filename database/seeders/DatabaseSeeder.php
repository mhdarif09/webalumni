<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@alumni.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Alumni User',
            'email' => 'alumni@alumni.com',
            'role' => 'alumni',
            'jenis_kelamin' => 'Laki-laki',
            'jurusan' => 'Teknik Informatika',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-05-10',
            'tahun_masuk' => 2018,
            'tahun_lulus' => 2021,
            'jabatan' => 'Software Engineer',
            'perusahaan' => 'PT Maju Digital',
            'kota' => 'Jakarta',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        User::factory(8)->create();
    }
}
