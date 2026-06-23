<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Lantai;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        $semuaLantai = Lantai::orderBy('id')->get();

        $query = Kelas::with('lantai');

        // filter search
        if ($request->filled('search')) {
            $query->where('nama_kelas', 'like', '%' . $request->search . '%');
        }

        // filter lantai
        if ($request->filled('lantai')) {
            $query->where('id_lantai', $request->lantai);
            $namaLantaiTerpilih = optional(
                $semuaLantai->firstWhere('id', $request->lantai)
            )->nama_lantai ?? 'Pilih Lantai';
        } else {
            $namaLantaiTerpilih = 'Pilih Lantai';
        }

        $semuaKelas = $query->paginate(12);

        return response()->json([
            'status' => true,
            'message' => 'Data ruang berhasil diambil',
            'data' => [
                'lantai' => $semuaLantai,
                'kelas' => $semuaKelas->items(),
                'pagination' => [
                    'current_page' => $semuaKelas->currentPage(),
                    'last_page' => $semuaKelas->lastPage(),
                    'per_page' => $semuaKelas->perPage(),
                    'total' => $semuaKelas->total(),
                ],
                'filter' => [
                    'selected_lantai' => $request->lantai ?? null,
                    'nama_lantai_terpilih' => $namaLantaiTerpilih,
                    'search' => $request->search ?? null,
                ]
            ]
        ]);
    }

    public function show($id)
    {
        // 1. Cari satu data ruangan berdasarkan ID menggunakan Model kamu (misal: Ruang atau Kelas)
        // Pastikan di bagian atas file controller sudah ada: use App\Models\Ruang; (atau nama modelmu)
        $kelas = Kelas::find($id);

        // 2. Jika data ruangan dengan ID tersebut tidak ditemukan
        if (!$kelas) {
            return response()->json([
                'status' => false,
                'message' => 'Ruangan tidak ditemukan'
            ], 404);
        }

        // 3. Logika penentuan status (Sesuaikan dengan kebutuhan bisnismu)
        // Jika statusnya dinamis berdasarkan field di database, kamu bisa hapus baris di bawah ini.
        // Tetapi jika ingin tetap melakukan mock status seperti logika kamu sebelumnya:
        if (!isset($kelas->status)) {
            $kelas->status = 'tersedia'; // Nilai default jika di database belum ada kolom status
        }

        // 4. Kembalikan response JSON tunggal
        return response()->json([
            'status' => true,
            'data' => $kelas
        ]);
    }
}
