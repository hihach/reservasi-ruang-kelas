<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Lantai;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        $semuaLantai = Lantai::orderBy('id')->get();


        $query = Kelas::with('lantai');

        if ($request->filled('search')) {
            $query->where('nama_kelas', 'like', '%' . $request->search . '%');
        }

        if ($request->has('lantai')) {
            $query->where('id_lantai', $request->lantai);
            $namaLantaiTerpilih = optional($semuaLantai->firstWhere('id', $request->lantai))->nama_lantai ?? 'Pilih Lantai';
        } else {
            $namaLantaiTerpilih = 'Pilih Lantai';
        }

        $semuaKelas = $query->paginate(12)->withQueryString();

        return view('pages.ruangan', compact('semuaLantai', 'semuaKelas', 'namaLantaiTerpilih'));
    }
}
