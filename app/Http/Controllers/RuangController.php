<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Lantai;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Halaman Depan: Menampilkan Daftar Lantai
     * (Misal: Lantai 1 (3 Kelas), Lantai 2 (5 Kelas))
     */
    public function index(Request $request)
    {
        // 1. Ambil Data Lantai (Buat Dropdown)
        $semuaLantai = Lantai::orderBy('id')->get();;

        // 2. Query Kelas (Bisa difilter)
        $query = Kelas::with('lantai');

        // Kalau ada search
        if ($request->filled('search')) {
            $query->where('nama_kelas', 'like', '%' . $request->search . '%');
        }

        // Kalau ada filter lantai (dari URL ?lantai=1)
        if ($request->has('lantai')) {
            $query->where('id_lantai', $request->lantai);
            $namaLantaiTerpilih = optional($semuaLantai->firstWhere('id', $request->lantai))->nama_lantai ?? 'Pilih Lantai';
        } else {
            $namaLantaiTerpilih = 'Pilih Lantai';
        }

        $semuaKelas = $query->paginate(12)->withQueryString();; // Paginasi biar gak berat

        return view('pages.ruangan', compact('semuaLantai', 'semuaKelas', 'namaLantaiTerpilih'));
    }
}
