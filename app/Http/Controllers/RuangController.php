<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Lantai;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelas::with('lantai');

        // 🔥 filter lantai (WAJIB pakai id_lantai)
        if ($request->filled('lantai')) {
            $query->where('id_lantai', $request->lantai);
        }

        // 🔥 search optional
        if ($request->filled('search')) {
            $query->where('nama_kelas', 'like', '%' . $request->search . '%');
        }

        $semuaKelas = $query->get();

        return response()->json([
            'status' => true,
            'data' => [
                'kelas' => $semuaKelas
            ]
        ]);
    }

    // 🔥 detail ruangan (untuk room-detail screen)
    public function show($id)
    {
        $kelas = Kelas::with('lantai')->findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => $kelas
        ]);
    }
}