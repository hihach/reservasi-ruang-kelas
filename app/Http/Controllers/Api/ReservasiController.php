<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Kelas;
use App\Models\Reservasi;
use App\StatusReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservasiController extends Controller
{
    // GET list / riwayat reservasi
    public function index()
    {
        $reservasi = Reservasi::with(['kelas', 'user'])->get();

        return response()->json([
            'data' => $reservasi
        ]);
    }

    // GET detail reservasi
    public function show($id)
    {
        $reservasi = Reservasi::with(['kelas', 'user'])->findOrFail($id);

        return response()->json([
            'data' => $reservasi
        ]);
    }
    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        if ($reservasi->status != StatusReservasi::PENDING) {
            return response()->json([
                'message' => 'Reservasi tidak bisa diedit'
            ], 403);
        }

        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'alasan' => 'required'
        ]);

        $reservasi->update([
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'alasan' => $request->alasan,
        ]);

        return response()->json([
            'message' => 'Reservasi berhasil diupdate',
            'data' => $reservasi
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_kelas' => 'required|exists:kelas,id',
                'tanggal' => 'required|date',
                'jam_mulai' => 'required',
                'jam_selesai' => 'required|after:jam_mulai',
                'alasan' => 'required',
            ]);

            $reservasi = Reservasi::create([
                'id_user' => $request->user()->id,
                'id_kelas' => $request->id_kelas,
                'tanggal' => $request->tanggal,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'alasan' => $request->alasan,
                'status' => StatusReservasi::PENDING,
            ]);

            return response()->json([
                'message' => 'Reservasi berhasil dibuat',
                'data' => $reservasi
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error server',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
