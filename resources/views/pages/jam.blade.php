@extends('layouts.app')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mx-8">
        <h1 class="text-xl font-semibold">Reservasi Ruang 301</h1>
        <input type="date" class="border rounded-md p-2 text-sm">
    </div>

    {{-- Jam --}}
    <div id="jamContainer" class="grid grid-cols-5 gap-6 mt-10 mx-8"></div>

    {{-- Summary --}}
    <div id="summaryBox"
        class="mt-10 mx-8 bg-white rounded-xl shadow-md p-6 hidden opacity-0 transition-opacity duration-300">

        <h3 class="font-semibold text-center mb-4">Reservasi</h3>

        <div class="flex justify-center gap-6 text-sm mb-4">
            <span><i class="bi bi-door-closed"></i> 301</span>
            <span><i class="bi bi-calendar3"></i> 17/Agustus/2025</span>
            <span>
                <i class="bi bi-clock"></i>
                <span id="summaryJamMulai"></span> -
                <span id="summaryJamSelesai"></span>
            </span>
        </div>

        <button class="bg-success text-white w-full p-3 rounded-xl">Lanjut Reservasi</button>
    </div>

    <div class="mx-8 mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md text-sm text-gray-700">
        <p class="leading-relaxed">
            Klik <span class="font-semibold text-secondary">jam pertama</span> untuk menentukan
            waktu <span class="font-semibold text-success">mulai reservasi</span>, lalu klik
            <span class="font-semibold text-secondary">jam kedua</span> untuk memilih
            waktu <span class="font-semibold text-success">selesai reservasi</span>.
        </p>
    </div>

</div>



@endsection
