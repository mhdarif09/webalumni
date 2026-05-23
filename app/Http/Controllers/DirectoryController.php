<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function index()
    {
        // 1. Data Alumni Riil (Prioritas Atas)
        $realAlumni = [
            [
                'name' => 'Adinda Aulia Salsabilla',
                'jurusan' => 'IPA',
                'tahun_lulus' => '2022',
                'jabatan' => 'Web Developer',
                'perusahaan' => 'Mandiri Sekuritas',
                'is_real' => true
            ],
            [
                'name' => 'Muhammad Agung',
                'jurusan' => 'IPA',
                'tahun_lulus' => '2022',
                'jabatan' => 'Accounting Staff',
                'perusahaan' => 'Aspro Encharta Autopart',
                'is_real' => true
            ],
            [
                'name' => 'Dezan Glasovic',
                'jurusan' => 'IPA',
                'tahun_lulus' => '2022',
                'jabatan' => 'Civil Engineer',
                'perusahaan' => 'Infrastructure Solutions',
                'is_real' => true
            ],
        ];

        // 2. Generate Data Dummy Massal (Simulasi Ratusan Alumni)
        $dummyNames = ['Ahmad', 'Budi', 'Citra', 'Deni', 'Eka', 'Fahmi', 'Gita', 'Hadi', 'Indah', 'Joko'];
        $dummyLastNames = ['Pratama', 'Santoso', 'Lestari', 'Wijaya', 'Saputra', 'Putri', 'Hidayat', 'Kusuma'];
        $dummyJobs = ['Marketing', 'Guru', 'Wirausaha', 'Software Engineer', 'Banker', 'Arsitek'];
        
        $massAlumni = [];
        for ($i = 0; $i < 100; $i++) {
            $firstName = $dummyNames[array_rand($dummyNames)];
            $lastName = $dummyLastNames[array_rand($dummyLastNames)];
            $massAlumni[] = [
                'name' => $firstName . ' ' . $lastName . ' ' . ($i + 4),
                'jurusan' => rand(0, 1) ? 'IPA' : 'IPS',
                'tahun_lulus' => rand(2010, 2023),
                'jabatan' => $dummyJobs[array_rand($dummyJobs)],
                'perusahaan' => 'Perusahaan Alumni #' . ($i + 1),
                'is_real' => false
            ];
        }

        // Gabungkan semua data
        $alumni = array_merge($realAlumni, $massAlumni);

        return view('directory', compact('alumni'));
    }
}
