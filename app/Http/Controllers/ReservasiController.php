<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Reservasi;
use App\StatusReservasi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservasiController extends Controller
{
    public function create(Request $request)
    {
        $kelasId = $request->input('class_id');
        $tanggal = $request->input('date', now()->toDateString());

        if (!$kelasId) {
            return redirect()->route('ruangan.index')->with('error', 'Pilih ruangan dulu bro!');
        }

        $kelas = Kelas::with('lantai')->findOrFail($kelasId);
        $jamOperasional = [];
        for ($jam = 8; $jam < 22; $jam++) {
            $jamOperasional[] = sprintf("%02d:00", $jam);
        }

        $bookedSlots = Reservasi::where('id_kelas', $kelasId)
            ->whereDate('tanggal', $tanggal)
            ->where('status', '!=', StatusReservasi::DITOLAK)
            ->get(['jam_mulai', 'jam_selesai'])
            ->map(function ($item) {
                return [
                    'start' => substr($item->jam_mulai, 0, 5),
                    'end' => substr($item->jam_selesai, 0, 5)
                ];
            });

        return view('pages.jam', compact('kelas', 'tanggal', 'bookedSlots', 'jamOperasional'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        $bentrok = Reservasi::where('id_kelas', $request->id_kelas)
            ->where('tanggal', $request->tanggal)
            ->where('status', '!=', StatusReservasi::DITOLAK)
            ->where(function ($query) use ($request) {
                $query->where('jam_mulai', '<', $request->jam_selesai)
                    ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($bentrok) {
            return back()->with('error', 'Waduh! Jam segitu barusan banget diambil orang lain. Coba jam lain ya!');
        }

        Reservasi::create([
            'id_user' => auth()->id(),
            'id_kelas' => $request->id_kelas,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'alasan' => $request->alasan,
            'status' => StatusReservasi::PENDING,
        ]);


        return redirect()->route('reservasi.create', [
            'class_id' => $request->id_kelas,
            'date' => $request->tanggal
        ])->with('success', 'Permintaan terkirim! Tunggu admin acc ya.');
    }

    public function tampilkanForm(Request $request)
    {
        if (!$request->class_id || !$request->start || !$request->end) {
            return redirect()->route('ruangan.index')->with('error', 'Data tidak lengkap');
        }

        $kelas = Kelas::findOrFail($request->class_id);

        $dataReservasi = [
            'id_kelas' => $request->class_id,
            'tanggal' => $request->date,
            'jam_mulai' => $request->start,
            'jam_selesai' => $request->end,
            'nama_kelas' => $kelas->nama_kelas
        ];

        return view('pages.form', compact('dataReservasi'));
    }
}
