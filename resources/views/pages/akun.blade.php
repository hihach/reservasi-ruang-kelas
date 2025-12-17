@extends('layouts.app')

@section('content')
    <div class="p-10 mx-8">

        <div class="bg-white p-8 rounded-3xl shadow-md max-w-3xl">
            <h1 class="text-xl font-semibold mb-6">Profil Akun</h1>

            <div class="grid grid-cols-2 gap-y-5 gap-x-10">

                <div>
                    <p class="text-gray-600 text-sm">Nama</p>
                    <p class="font-semibold">{{ $user->nama }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">Email</p>
                    <p class="font-semibold">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">NIM</p>
                    <p class="font-semibold">{{ $user->nim ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">Program Studi</p>
                    <p class="font-semibold">{{ $user->program_studi ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">Angkatan</p>
                    <p class="font-semibold">{{ $user->Angkatan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Agama</p>
                    <p class="font-semibold">{{ $user->agama ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Jenis Kelamin</p>
                    <p class="font-semibold">{{ $user->jenis_kelamin ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-600 text-sm">Status</p>
                    <span class="inline-block px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                        Aktif
                    </span>
                </div>

            </div>
        </div>

    </div>
@endsection
