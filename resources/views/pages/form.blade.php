@extends('layouts.app')

@section('content')
    <div class="p-8">
        {{-- Header --}}
        <div class="flex items-center mb-6 mx-8">
            {{-- Side left --}}
            <div>
                <h1 class="text-xl font-semibold">Form Pengajuan Ruangan</h1>
                <p class="text-gray-500 text-sm">Isi data reservasi untuk kegiatanmu</p>
            </div>

            {{-- Side right --}}
            <span class="bg-secondary text-white ml-auto px-4 py-1 rounded-lg text-sm font-semibold shadow-md">
                R. 301
            </span>
        </div>

        {{-- From --}}
        <form action="{{ route('home') }}" method="" class="space-y-6 mx-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Nama Peminjam --}}
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <label class="text-sm font-medium">Nama Peminjam</label>
                    <input type="text" name="nama"
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 focus:ring focus:ring-blue-400 outline-none"
                        placeholder="John Doe">
                </div>

                {{-- NIM --}}
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <label class="text-sm font-medium">NIM</label>
                    <input type="text" name="nim"
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 focus:ring focus:ring-blue-400 outline-none"
                        placeholder="230509089">
                </div>

                {{-- Kegiatan --}}
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <label class="text-sm font-medium">Kegiatan</label>
                    <input type="text" name="kegiatan"
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 focus:ring focus:ring-blue-400 outline-none"
                        placeholder="-">
                </div>

                {{-- Jumlah Peserta --}}
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <label class="text-sm font-medium">Jumlah Peserta</label>
                    <input type="number" name="peserta"
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 focus:ring focus:ring-blue-400 outline-none"
                        placeholder="40">
                </div>

                {{-- Tanggal --}}
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <label class="text-sm font-medium">Tanggal</label>
                    <input type="date" name="tanggal"
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 focus:ring focus:ring-blue-400 outline-none">
                </div>

                {{-- Waktu --}}
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <label class="text-sm font-medium">Waktu</label>
                    <input type="text" name="waktu"
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 focus:ring focus:ring-blue-300 outline-none"
                        placeholder="08:00 - 12:00">
                </div>

            </div>

            {{-- Button --}}
            {{-- State Alpine.js untuk mengontrol dropup & popup --}}
            <div x-data="{ openNotif: false, confirmBatal: false }">

                <div class="flex justify-end space-x-3 relative mt-25">

                    {{-- Button batal --}}
                    <button type="button" @click="confirmBatal = !confirmBatal"
                        class="px-5 py-2 rounded-md bg-error shadow-md transition-200 text-white hover:bg-red-700">
                        Batal
                    </button>

                    {{-- Popart konfirmasi batal --}}
                    <div x-show="confirmBatal" @click.outside="confirmBatal = false" x-transition
                        class="absolute bottom-full right-0 mb-2 w-69 bg-white shadow-lg rounded-lg py-4 px-6 z-20">

                        <h3 class="text-black text-lg font-semibold flex items-center">
                            <i class="bi bi-x-circle mr-2 text-error"></i>
                            Konfirmasi Pembatalan
                        </h3>

                        <p class="text-black text-xs mt-1 mb-3">
                            Apakah Anda yakin ingin membatalkan pengajuan ini?
                        </p>

                        {{-- Button Konfirmasi --}}
                        <div class="flex justify-center space-x-2">
                            <button type="button" @click.stop="confirmBatal = false"
                                class="px-3 py-1 bg-Subtle text-black rounded hover:bg-gray-300 transition">
                                Tidak
                            </button>

                            <a href="{{ route('home') }}"
                                class="px-3 py-1 bg-error text-white rounded hover:bg-red-600 transition">
                                Ya
                            </a>
                        </div>

                    </div>

                    {{-- Button ajukan --}}
                    <button type="button" @click="openNotif = true"
                        class="px-5 py-2 cursor-pointer rounded-md transition-200 shadow-md bg-success text-white hover:bg-green-700">
                        Ajukan Pengajuan
                    </button>

                </div>

                {{-- Popart konfirmasi ajukan berhasil di kirim --}}
                <div x-show="openNotif"
                    class="fixed bottom-5 right-5 bg-success text-white p-7 rounded-lg shadow-lg flex items-center space-x-4 z-50 me-17">
                    <div>
                        <p class="font-semibold">
                            <i class="bi bi-envelope-check-fill text-2xl mr-3"></i>
                            Pengajuan berhasil dikirim
                        </p>

                        <p class="text-sm mt-2">
                            Pengajuan reservasi Ruang 301 telah dikirim. Status akan diperbarui setelah ditinjau.
                        </p>

                        {{-- Button Konfirmasi --}}
                        <div class="mt-4 flex space-x-6 justify-center">

                            <a href="{{ route('riwayat') }}"
                                class="px-3 py-1 bg-white text-success rounded hover:bg-gray-100">
                                Lihat Riwayat
                            </a>

                            <button @click="openNotif = false" class="px-3 py-1 bg-error rounded hover:bg-red-600">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
