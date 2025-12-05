@extends('layouts.app')

@section('content')
    <div class="flex gap-8 p-6 mx-8">

        {{-- ====================================================== --}}
        {{-- SIDEBAR FILTER STATUS RESERVASI                        --}}
        {{-- ====================================================== --}}
        <div class="w-45 flex flex-col gap-3">

            {{-- Judul filter --}}
            <h3><i class="bi bi-funnel-fill mr-2"></i> Filter</h3>

            {{-- Tombol filter: semua status --}}
            <button class="py-2 border cursor-pointer rounded-lg bg-secondary text-white shadow-md font-medium">
                Semua
            </button>

            {{-- Tombol filter: hanya yang disetujui --}}
            <button
                class="py-2 rounded-lg cursor-pointer bg-gray-200 hover:bg-gray-300 shadow-md transition-200">
                Disetujui
            </button>

            {{-- Tombol filter: hanya yang ditolak --}}
            <button
                class="py-2 rounded-lg cursor-pointer bg-gray-200 hover:bg-gray-300 shadow-md transition-200">
                Ditolak
            </button>
        </div>



        {{-- ====================================================== --}}
        {{-- LIST KONTEN / DAFTAR RIWAYAT RESERVASI                --}}
        {{-- ====================================================== --}}
        <div class="flex-1 grid grid-cols-2 gap-6">



            {{-- ====================================================== --}}
            {{-- CARD RESERVASI DISETUJUI                              --}}
            {{-- ====================================================== --}}
            <div class="bg-white rounded-xl shadow-md p-5 flex justify-between items-start gap-4">

                {{-- Informasi utama --}}
                <div>
                    <h2 class="text-lg font-semibold ">Ruang 301 Disetujui</h2>

                    {{-- Tanggal reservasi --}}
                    <div class="flex items-center gap-2 mt-2 text-gray-600 text-sm">
                        <i class="bi bi-calendar3"></i>
                        <span>Senin, 17 Agustus 2025 (08:00 - 12:00 WIB)</span>
                    </div>

                    {{-- Tanggal persetujuan --}}
                    <div class="flex items-center gap-2 mt-1 text-gray-600 text-sm">
                        <i class="bi bi-clock"></i>
                        <span>Disetujui: 10 Agustus, 07:00 WIB</span>
                    </div>
                </div>

                {{-- Ikon status disetujui --}}
                <i class="bi bi-check-circle-fill text-green-600 text-2xl"></i>
            </div>



            {{-- ====================================================== --}}
            {{-- CARD RESERVASI DITOLAK                                 --}}
            {{-- ====================================================== --}}
            <div class="bg-white rounded-xl shadow-md p-5 flex justify-between items-start gap-4">

                {{-- Informasi utama --}}
                <div>
                    <h2 class="text-lg font-semibold ">Ruang 301 Ditolak</h2>

                    {{-- Tanggal reservasi --}}
                    <div class="flex items-center gap-2 mt-2 text-gray-600 text-sm">
                        <i class="bi bi-calendar3"></i>
                        <span>Senin, 17 Agustus 2025 (08:00 - 12:00 WIB)</span>
                    </div>

                    {{-- Tanggal penolakan --}}
                    <div class="flex items-center gap-2 mt-1 text-gray-600 text-sm">
                        <i class="bi bi-clock"></i>
                        <span>Ditolak: 10 Agustus, 07:00 WIB</span>
                    </div>
                </div>

                {{-- Ikon status ditolak --}}
                <i class="bi bi-x-circle-fill text-red-600 text-2xl"></i>
            </div>



            {{-- ====================================================== --}}
            {{-- CARD CONTOH / KONTEN TAMBAHAN                          --}}
            {{-- ====================================================== --}}
            <div class="bg-white rounded-xl shadow-md p-5">
                <p class="text-gray-400 italic">Ruang 301 Ditolak</p>
            </div>

        </div>
    </div>
@endsection
