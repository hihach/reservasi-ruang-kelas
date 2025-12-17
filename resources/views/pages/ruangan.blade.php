@extends('layouts.app')

@section('content')
    <div class="p-6 min-h-screen">
        {{-- Header & Filter --}}
        <div class="flex flex-col md:flex-row justify-between mx-4 md:mx-8 items-center mb-8 gap-4">

            {{-- Side Left: Dropdown Lantai --}}
            <div id="lantaiWrapper" class="relative inline-block z-20">
                <button id="btnLantai"
                    class="flex items-center space-x-4 bg-secondary cursor-pointer text-white pl-6 pr-4 py-3 rounded-xl shadow-lg hover:bg-blue-700 transition duration-200">
                    <span class="font-semibold tracking-wide">
                        {{ request('lantai') ? $namaLantaiTerpilih : 'Semua Lantai' }}
                    </span>
                    <i class="bi bi-caret-right-fill text-sm"></i>
                </button>

                <div id="dropdownLantai"
                    class="absolute top-1/2 -translate-y-1/2 left-full ml-4 flex space-x-2 z-50 opacity-0 hidden transition-all duration-300 -translate-x-5">

                    {{-- Tombol Reset (Semua) --}}
                    <a href="{{ route('ruangan.index') }}"
                        class="bg-white text-gray-700 hover:bg-blue-50 hover:text-secondary border border-gray-200 px-4 py-2 cursor-pointer rounded-lg shadow-md transition whitespace-nowrap font-medium">
                        Semua
                    </a>

                    {{-- Loop Data Lantai --}}
                    @foreach ($semuaLantai as $l)
                        <a href="{{ route('ruangan.index', ['lantai' => $l->id]) }}"
                            class="bg-white text-gray-700 hover:bg-blue-50 hover:text-secondary border border-gray-200 px-4 py-2 cursor-pointer rounded-lg shadow-md transition whitespace-nowrap font-medium">
                            {{ $l->nama_lantai }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Side Right: Search Bar --}}
            <div class="relative w-full md:w-96">
                <form action="{{ route('ruangan.index') }}" method="GET">
                    {{-- Kalau lagi filter lantai, tetep bawa param lantainya pas search --}}
                    @if (request('lantai'))
                        <input type="hidden" name="lantai" value="{{ request('lantai') }}">
                    @endif

                    <i class="bi bi-search absolute left-4 top-3.5 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nomor ruangan..."
                        class="w-full pl-12 pr-4 py-3 rounded-xl shadow-sm border border-gray-200 bg-white focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition duration-200">
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mx-4 md:mx-8 gap-6">
            @forelse($semuaKelas as $kelas)
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 group-hover:text-secondary transition">
                                {{ $kelas->nama_kelas }}
                            </h3>
                            <p class="text-xs text-gray-500 font-medium bg-gray-100 px-2 py-1 rounded mt-1 inline-block">
                                {{ $kelas->lantai->nama_lantai }}
                            </p>
                        </div>
                        <i class="fa-solid fa-building text-gray-300 text-xl"></i>
                    </div>

                    <p class="text-gray-500 text-sm mb-4">
                        <i class="bi bi-people mr-2"></i> Kapasitas: {{ $kelas->kapasitas }}
                    </p>

                    {{-- Logic Tombol: Langsung ke Reservasi Create bawa ID Kelas --}}
                    <a href="{{ route('reservasi.create', ['class_id' => $kelas->id]) }}"
                        class="block w-full text-center bg-success hover:bg-green-600 text-white font-medium rounded-lg py-2.5 text-sm transition shadow-sm hover:shadow">
                        Booking Sekarang
                    </a>
                </div>
            @empty
                {{-- State Kosong --}}
                <div class="col-span-full text-center py-20">
                    <div class="bg-gray-50 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-search text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Ruangan tidak ditemukan</h3>
                    <p class="text-gray-500">Coba cari kata kunci lain atau reset filter.</p>
                    <a href="{{ route('ruangan.index') }}" class="text-secondary hover:underline mt-2 inline-block">Reset
                        Filter</a>
                </div>
            @endforelse
        </div>

        <div class="mt-8 mx-8">
            {{ $semuaKelas->withQueryString()->links() }}
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const btnLantai = document.getElementById("btnLantai");
                const dropdownLantai = document.getElementById("dropdownLantai");
                const lantaiWrapper = document.getElementById("lantaiWrapper");

                let open = false;

                function toggleDropdown() {
                    open = !open;

                    if (open) {
                        dropdownLantai.classList.remove("hidden");
                        // Delay dikit biar transisi CSS jalan
                        setTimeout(() => {
                            dropdownLantai.classList.remove("opacity-0", "-translate-x-5");
                            dropdownLantai.classList.add("opacity-100", "translate-x-0");
                        }, 10);
                    } else {
                        dropdownLantai.classList.remove("opacity-100", "translate-x-0");
                        dropdownLantai.classList.add("opacity-0", "-translate-x-5");

                        setTimeout(() => dropdownLantai.classList.add("hidden"), 300);
                    }
                }

                // Klik tombol lantai
                btnLantai.addEventListener("click", (e) => {
                    e.stopPropagation();
                    toggleDropdown();
                });

                // Klik luar dropdown → tutup
                document.addEventListener("click", (e) => {
                    if (!lantaiWrapper.contains(e.target) && open) {
                        toggleDropdown();
                    }
                });
            });
        </script>
    @endpush
@endsection
