<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\StatusReservasi;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    // GET semua notifikasi user
    public function index()
    {
        $userId = Auth::id();

        $baseQuery = Reservasi::where('id_user', $userId)
            ->where('status', '!=', StatusReservasi::PENDING);

        // auto mark unread -> read
        $baseQueryClone = (clone $baseQuery)->whereNull('read_at');

        $baseQueryClone->update([
            'read_at' => now()
        ]);

        $notifikasi = $baseQuery
            ->with('kelas')
            ->latest('updated_at')
            ->get();

        return response()->json([
            'message' => 'Notifikasi berhasil diambil',
            'data' => $notifikasi
        ]);
    }

    // MARK 1 notifikasi as read
    public function markAsRead($id)
    {
        $updated = Reservasi::where('id_user', Auth::id())
            ->where('id', $id)
            ->update([
                'read_at' => now()
            ]);

        if (!$updated) {
            return response()->json([
                'message' => 'Notifikasi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Notifikasi ditandai dibaca'
        ]);
    }

    // MARK ALL as read
    public function clearAll()
    {
        Reservasi::where('id_user', Auth::id())
            ->update([
                'read_at' => now()
            ]);

        return response()->json([
            'message' => 'Semua notifikasi ditandai dibaca'
        ]);
    }
    
}
