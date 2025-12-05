@extends('layouts.app')

@section('content')
    <div class="flex gap-8 p-6 mx-8">

        {{-- Sidebar --}}
        <div class="w-45 flex flex-col gap-3">

            <h3><i class="bi bi-funnel-fill mr-2"></i> Filter</h3>

            <button class="py-2 border cursor-pointer rounded-lg bg-secondary text-white shadow-md font-medium">
                Semua
            </button>

            <button class="py-2 rounded-lg cursor-pointer bg-gray-200 hover:bg-gray-300 shadow-md transition-200">
                Disetujui
            </button>

            <button class="py-2 rounded-lg cursor-pointer bg-gray-200 hover:bg-gray-300 shadow-md transition-200">
                Ditolak
            </button>
        </div>

        {{-- List riwayat --}}
        <div class="flex-1 grid grid-cols-2 gap-6">

            {{-- RESERVASI SETUJU --}}
            <div class="bg-white rounded-xl shadow-md p-5 flex justify-between items-start gap-4">
                <div>
                    <h2 class="text-lg font-semibold ">Ruang 301 Disetujui</h2>

                    <div class="flex items-center gap-2 mt-2 text-gray-600 text-sm">
                        <i class="bi bi-calendar3"></i>
                        <span>Senin, 17 Agustus 2025 (08:00 - 12:00 WIB)</span>
                    </div>

                    <div class="flex items-center gap-2 mt-1 text-gray-600 text-sm">
                        <i class="bi bi-clock"></i>
                        <span>Disetujui: 10 Agustus, 07:00 WIB</span>
                    </div>
                </div>
                <i class="bi bi-check-circle-fill text-green-600 text-2xl"></i>
            </div>

            {{-- RESERVASI DITOLAK --}}
            <div class="bg-white rounded-xl shadow-md p-5 flex justify-between items-start gap-4">
                <div>
                    <h2 class="text-lg font-semibold ">Ruang 301 Ditolak</h2>

                    <div class="flex items-center gap-2 mt-2 text-gray-600 text-sm">
                        <i class="bi bi-calendar3"></i>
                        <span>Senin, 17 Agustus 2025 (08:00 - 12:00 WIB)</span>
                    </div>

                    <div class="flex items-center gap-2 mt-1 text-gray-600 text-sm">
                        <i class="bi bi-clock"></i>
                        <span>Ditolak: 10 Agustus, 07:00 WIB</span>
                    </div>
                </div>
                <i class="bi bi-x-circle-fill text-red-600 text-2xl"></i>
            </div>
        </div>
    </div>
@endsection
