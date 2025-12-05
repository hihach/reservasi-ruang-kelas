@extends('layouts.app')

@section('content')
    <div class="p-6">

        {{-- Header --}}
        <div class="flex justify-between items-start">

            {{-- Side Left --}}
            <div class="flex items-start ms-8">

                {{-- Tombol back --}}
                <button onclick="window.history.back()"
                    class="p-2 rounded-lg hover:bg-gray-400/20 text-Title cursor-pointer transition-200 mr-5">
                    <i class="bi bi-caret-left-fill text-lg"></i>
                </button>

                {{-- Judul halaman --}}
                <div>
                    <h1 class="text-xl font-semibold">Reservasi Ruang 301</h1>
                    <p class="text-sm text-gray-500 mb-4">Pilih tanggal dan jam yang tersedia</p>
                </div>
            </div>

            {{-- Side Right --}}
            <div class="flex items-center gap-2 bg-white px-5 py-3 rounded-lg shadow-md">
                {{-- Input tanggal --}}
                <input type="date" name="tanggal" id="">
            </div>

        </div>



        {{-- List jam --}}
        <div class="grid grid-cols-5 gap-6 mt-10 mx-8">

            {{-- JAM TERSEDIA --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center">
                <p class="font-medium mb-3 text-gray-700">
                    <i class="bi bi-clock-fill mr-3"></i>07:00
                </p>

                <button onclick="window.location='{{ route('form') }}'"
                    class="bg-success text-sm hover:bg-green-600 text-white w-full p-2 cursor-pointer rounded-lg transition-200">
                    Ajukan
                </button>
            </div>

            {{-- JAM TIDAK TERSEDIA --}}
            <div class="bg-white p-4 rounded-xl shadow-md text-center">
                <p class="font-medium mb-3 text-gray-700">
                    <i class="bi bi-clock-fill mr-3"></i>14:00
                </p>

                <button class="bg-gray-400 text-sm text-white w-full p-2 rounded-lg cursor-not-allowed">
                    Ajukan
                </button>
            </div>

        </div>

    </div>
@endsection
