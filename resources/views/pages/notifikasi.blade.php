@extends('layouts.app')

@section('content')
    <div class="p-6">

        {{-- GRID 4 KOLOM UNTUK MENAMPILKAN KARTU STATUS RESERVASI --}}
        <div class="grid grid-cols-4 gap-7 mx-8">

            {{-- ================================ --}}
            {{-- CARD RESERVASI DISETUJUI (HIJAU) --}}
            {{-- ================================ --}}
            <div class="bg-white p-5 rounded-xl shadow-md flex flex-col gap-2">

                {{-- Header: ikon + judul status --}}
                <div class="flex items-center gap-2">
                    <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>
                    <h2 class="font-semibold text-lg">Reservasi Disetujui!</h2>
                </div>

                {{-- Nama ruang --}}
                <p class="text-gray-700">Ruang: 301</p>

                {{-- Tanggal reservasi --}}
                <div class="flex items-center gap-2 text-gray-600 text-sm">
                    <i class="bi bi-calendar3"></i>
                    <span>Senin, 17 Agustus 2025</span>
                </div>

                {{-- Jam reservasi --}}
                <div class="flex items-center gap-2 text-gray-600 text-sm">
                    <i class="bi bi-clock"></i>
                    <span>08:00 – 12:00 WIB</span>
                </div>

            </div>



            {{-- ================================ --}}
            {{-- CARD RESERVASI DITOLAK (MERAH)  --}}
            {{-- ================================ --}}
            <div class="bg-white p-5 rounded-xl shadow-md flex flex-col gap-2">

                {{-- Header: ikon + judul status --}}
                <div class="flex items-center gap-2">
                    <i class="bi bi-x-circle-fill text-red-600 text-xl"></i>
                    <h2 class="font-semibold text-lg">Reservasi Ditolak!</h2>
                </div>

                {{-- Nama ruang --}}
                <p class="text-gray-700">Ruang: 303</p>

                {{-- Tanggal reservasi --}}
                <div class="flex items-center gap-2 text-gray-600 text-sm">
                    <i class="bi bi-calendar3"></i>
                    <span>Selasa, 11 Agustus 2025</span>
                </div>

                {{-- Jam reservasi --}}
                <div class="flex items-center gap-2 text-gray-600 text-sm">
                    <i class="bi bi-clock"></i>
                    <span>09:00 – 13:00 WIB</span>
                </div>

            </div>

        </div>
    </div>
@endsection
