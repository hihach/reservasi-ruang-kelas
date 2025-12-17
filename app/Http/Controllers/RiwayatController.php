<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\StatusReservasi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        // Query Dasar: Ambil punya user yang login
        $query = Reservasi::with('kelas')
            ->where('id_user', auth()->id())
            ->orderBy('created_at', 'desc');

        // Logic Filter dari URL (?status=...)
        if ($request->has('status')) {
            switch ($request->status) {
                case 'disetujui':
                    $query->where('status', StatusReservasi::DITERIMA);
                    break;
                case 'menunggu':
                    $query->where('status', StatusReservasi::PENDING);
                    break;
                case 'ditolak':
                    $query->where('status', StatusReservasi::DITOLAK);
                    break;
            }
        }

        $riwayat = $query->paginate(10); // Paginasi biar gak berat

        return view('pages.riwayat', compact('riwayat'));
    }
}
