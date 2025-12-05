@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div class="p-10 flex items-center gap-23 mx-8">

        {{-- Side Left --}}
        <div>
            <img src="https://i.pravatar.cc/200" class="w-40 h-40 rounded-full object-cover shadow">
        </div>

        {{-- Side right --}}
        <div class="bg-white p-8 rounded-3xl shadow-md w-[600px]">
            <div class="grid grid-cols-2 gap-y-5">
                {{-- Nama --}}
                <div>
                    <p class="text-gray-600 text-sm">Nama</p>
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
                    <p class="font-semibold">Aktif</p>
                </div>
            </div>
        </div>
    </div>
@endsection
