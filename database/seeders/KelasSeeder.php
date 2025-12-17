<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        $dataKelas = [];

        // --- 1. LANTAI 1 (Manual: Lab Komputer) ---
        // Asumsi id_lantai 1 = Lantai 1
        $dataKelas[] = [
            'id_lantai' => 1,
            'nama_kelas' => 'Lab Komputer',
            'kapasitas' => 39, // Sesuai gambar
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // --- 2. LANTAI 2 (Looping: 301 - 318) ---
        // Asumsi id_lantai 2 = Lantai 2
        for ($i = 1; $i <= 18; $i++) {
            // Format angka biar jadi 301, 302, ... 318
            // Kalau $i < 10, tambahin '0' (meskipun di kasus 300an gak ngaruh, tapi good practice)
            $nomorRuangan = '3' . str_pad($i, 2, '0', STR_PAD_LEFT);

            $dataKelas[] = [
                'id_lantai' => 2,
                'nama_kelas' => $nomorRuangan,
                'kapasitas' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // --- 3. LANTAI 3 (Looping: 401 - 408) ---
        // Asumsi id_lantai 3 = Lantai 3
        for ($i = 1; $i <= 8; $i++) {
            $nomorRuangan = '4' . str_pad($i, 2, '0', STR_PAD_LEFT);

            $dataKelas[] = [
                'id_lantai' => 3,
                'nama_kelas' => $nomorRuangan,
                'kapasitas' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // --- 4. LANTAI 3 (Manual: Aula) ---
        $dataKelas[] = [
            'id_lantai' => 3,
            'nama_kelas' => 'Aula',
            'kapasitas' => 30, // Sesuai gambar
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // Eksekusi Insert Sekaligus
        DB::table('kelas')->insert($dataKelas);
    }
}
