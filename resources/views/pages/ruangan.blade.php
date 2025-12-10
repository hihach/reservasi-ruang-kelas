@extends('layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header --}}
        <div class="flex justify-between mx-8 items-center mb-6">

            {{-- Side Left --}}
            <div id="lantaiWrapper" class="relative inline-block">

                <button id="btnLantai"
                    class="flex items-center space-x-2 bg-secondary cursor-pointer text-white pl-5 pr-2 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    <span>Lantai 1</span>
                    <i class="bi bi-caret-right-fill ml-5"></i>
                </button>

                <!-- Dropdown -->
                <div id="dropdownLantai"
                    class="absolute top-1/2 -translate-y-1/2 left-full ml-4 flex space-x-3 z-50 opacity-0 hidden transition-all duration-200 -translate-x-3">

                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">2</button>
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">3</button>
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">4</button>
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 cursor-pointer rounded-lg shadow-md">5</button>

                </div>
            </div>

            {{-- Side Right --}}
            <div class="relative w-80">
                <i class="bi bi-search absolute left-3 top-2 text-gray-400"></i>

                <input type="text" placeholder="Cari ruangan disini..."
                    class="w-full pl-10 pr-3 py-2 rounded-lg shadow-md cursor-pointer bg-white 
            focus:ring-2 focus:ring-blue-400 outline-none transition">
            </div>

        </div>


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
