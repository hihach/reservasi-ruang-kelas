@extends('layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header --}}
        <div class="flex justify-between ms-8 items-center mb-6">
            {{-- Side left --}}
            <!-- x-data = state Alpine untuk buka/tutup dropdown -->
            <div x-data="{ open: false }" class="relative inline-block">
                <button @click="open = !open"
                    class="flex items-center space-x-2 bg-secondary cursor-pointer text-white pl-5 pr-2 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    <span>Lantai 1</span>
                    <i class="bi bi-caret-right-fill ml-5"></i>
                </button>

                <!-- Dropdown Horizontal -->
                <!-- x-show = tampil jika open = true -->
                <!-- @click.outside = tutup jika klik area luar -->
                <!-- x-transition = animasi smooth -->
                <div x-show="open" @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-x-3"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 -translate-x-3"
                    class="absolute top-1/2 -translate-y-1/2 left-full ml-4 flex space-x-3 z-50">

                    <!-- Tombol lantai lain -->
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">
                        2
                    </button>

                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">
                        3
                    </button>

                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">
                        4
                    </button>

                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">
                        5
                    </button>
                </div>
            </div>

            <!-- ============================== -->

            {{-- Side right --}}
            <div class="relative me-8 w-80">

                <!-- Icon Search -->
                <i class="bi bi-search absolute left-3 top-2 text-gray-400"></i>

                <!-- Input -->
                <input type="text" placeholder="Cari ruangan disini..."
                    class="w-full pl-10 pr-3 py-2 rounded-lg shadow-md cursor-pointer bg-white 
                           focus:ring-2 focus:ring-blue-400 outline-none transition">
            </div>

        </div>

        <!-- ============================== -->

        <!-- list ruangan -->
        <div class="grid grid-cols-4 mx-8 gap-4">

            <!-- Ruang Tersedia -->
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="font-semibold text-lg flex items-center space-x-2 mb-3">
                    <i class="fa-solid fa-building text-gray-700"></i>
                    <span>Ruang 101</span>
                </h3>

                <a href="{{ route('jam') }}"
                    class="block text-center bg-success hover:bg-green-600 text-white rounded-lg p-2 text-sm transition">
                    Tersedia
                </a>
            </div>

            <!-- Ruang Tidak Tersedia -->
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="font-semibold text-lg flex items-center space-x-2 mb-3">
                    <i class="fa-solid fa-building text-gray-700"></i>
                    <span>Ruang 102</span>
                </h3>

                <span class="block text-center p-2 bg-gray-400 cursor-not-allowed text-sm text-white rounded-lg ">
                    Tidak Tersedia
                </span>
            </div>

        </div>
    </div>
@endsection
