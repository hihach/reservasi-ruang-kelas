@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div class="flex items-center justify-between mx-15">
        {{-- Side left --}}
        <div>
            <h1 class="text-3xl font-semibold ">Selamat datang, Na Jemin</h1>
            <p class="text-gray-600 mt-2">Jadwalkan kegiatanmu dengan mudah</p>

            <button onclick="window.location='{{ route('ruangan') }}'"
                class="bg-secondary mt-3 hover:bg-blue-600 text-white px-5 py-2 rounded shadow transition-200 cursor-pointer transition-200">
                Reservasi sekarang
            </button>
        </div>

        {{-- Side right --}}
        <div class="w-1/4 ">
            <div class="bg-white p-5 shadow-md rounded-lg">
                <h3 class="text-lg font-bold flex items-center mb-4">
                    <i class="bi bi-calendar3 mr-4"></i>
                    Reservasi Mendatang
                </h3>
                <div class="flex items-start">
                    <div>
                        <p class="text-gray-700 font-medium">Pinjam Kelas</p>
                        <p class="text-gray-500 text-sm mb-3">Hari ini, 07.00</p>
                    </div>

                    {{-- Status Reservasi --}}
                    {{-- Jika ditolak --}}
                    {{--
                    <span class="bg-error text-white px-3 py-1 text-sm rounded-md ml-auto">
                        Ditolak <i class="bi bi-x ml-2"></i>
                    </span>
                    --}}

                    {{-- Jika disetujui --}}
                    <span class="bg-success text-white px-3 py-1 text-sm rounded-md ml-auto">
                        Disetujui <i class="bi bi-check ml-2"></i>
                    </span>
                </div>

                <a href="{{ route('riwayat') }}" class="block mt-4 hover:underline text-secondary text-sm transition-200">
                    Lihat semua riwayat
                </a>
            </div>
        </div>
    </div>

    {{-- List lantai --}}
    <div class="mt-10 mx-15">
        <h2 class="text-xl font-semibold mb-4">Pilih Lantai</h2>
        <div class="grid grid-cols-5 gap-4">
            {{-- Lantai 1 --}}
            <a href="{{ route('ruangan') }}" class="block">
                <div class="bg-white p-5 rounded-lg shadow-md hover:shadow-lg transition-200 cursor-pointer">
                    <div class="flex justify-center items-center space-x-2 mb-2">
                        <i class="bi bi-building-fill mr-3"></i>
                        <span class="font-semibold">Lantai 1</span>
                    </div>
                    <p class="text-gray-600 text-center text-sm">10 ruang tersedia</p>
                </div>
            </a>
        </div>
    </div>
@endsection
