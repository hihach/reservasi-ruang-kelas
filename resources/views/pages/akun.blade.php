@extends('layouts.app')
{{-- 
    Menggunakan layout utama 'app.blade.php'
    Semua konten halaman ini akan dimasukkan ke dalam @yield('content') di layout.
--}}

@section('content')
    {{-- Container utama halaman dengan padding dan layout flex --}}
    <div class="p-10 flex items-center gap-23 mx-8">

        {{-- =========================== --}}
        {{--        FOTO PROFIL         --}}
        {{-- =========================== --}}
        <div>
            {{-- 
                Menampilkan foto profil user.
                (Nanti bisa diganti dynamic memakai: auth()->user()->foto )
            --}}
            <img src="https://i.pravatar.cc/200" class="w-40 h-40 rounded-full object-cover shadow">
        </div>

        {{-- =========================== --}}
        {{--        CARD BIODATA        --}}
        {{-- =========================== --}}
        <div class="bg-white p-8 rounded-3xl shadow-md w-[600px]">

            {{-- Grid 2 kolom untuk item biodata --}}
            <div class="grid grid-cols-2 gap-y-5">

                {{-- Nama --}}
                <div>
                    <p class="text-gray-600 text-sm">Nama</p>
                    {{-- Data statis (nanti bisa diganti: {{ auth()->user()->nama }} ) --}}
                    <p class="font-semibold">John Doe</p>
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <p class="text-gray-600 text-sm">Jenis Kelamin</p>
                    <p class="font-semibold">Perempuan</p>
                </div>

                {{-- NIM --}}
                <div>
                    <p class="text-gray-600 text-sm">NIM</p>
                    <p class="font-semibold">23050908</p>
                </div>

                {{-- Agama --}}
                <div>
                    <p class="text-gray-600 text-sm">Agama</p>
                    <p class="font-semibold">Kristen</p>
                </div>

                {{-- Program Studi --}}
                <div>
                    <p class="text-gray-600 text-sm">Program Studi</p>
                    <p class="font-semibold">Ilmu Komputer</p>
                </div>

                {{-- Email --}}
                <div>
                    <p class="text-gray-600 text-sm">Email</p>
                    {{-- Email contoh (harusnya: {{ auth()->user()->email }} ) --}}
                    <p class="font-semibold">johndo.uym.ac.id</p>
                </div>

                {{-- Angkatan --}}
                <div>
                    <p class="text-gray-600 text-sm">Angkatan</p>
                    <p class="font-semibold">2023</p>
                </div>

                {{-- Kelas --}}
                <div>
                    <p class="text-gray-600 text-sm">Kelas</p>
                    <p class="font-semibold">Reguler</p>
                </div>

                {{-- Status --}}
                <div>
                    <p class="text-gray-600 text-sm">Status</p>
                    {{-- Contoh status mahasiswa --}}
                    <p class="font-semibold">Aktif</p>
                </div>

            </div>
        </div>

    </div>
@endsection
