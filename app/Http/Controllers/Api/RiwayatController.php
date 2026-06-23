<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Reservasi;
use App\StatusReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
$reservasi = Reservasi::with(['kelas', 'user'])->get();
class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservasi::with('kelas')
            ->where('id_user', Auth::id())
            ->orderBy('created_at', 'desc');

        // filter status
        if ($request->filled('status')) {
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

        $riwayat = $query->paginate(10);

        return response()->json([
            'message' => 'Riwayat reservasi berhasil diambil',
            'data' => $riwayat
        ]);
    }
}
