@extends('layouts.app')

@section('content')
    {{-- Header --}}

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mx-4 md:mx-15 mt-6">

        {{-- Side left (Greeting) --}}
        <div class="mb-6 md:mb-0">
            <h1 class="text-3xl font-semibold text-Title">Selamat datang, {{ explode(' ', $user->nama)[0] }} 👋</h1>
            <p class="text-body mt-2">Jadwalkan kegiatanmu dengan mudah hari ini.</p>

            <a href="{{ route('ruangan.index') }}"
                class="inline-block bg-secondary mt-4 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow transition duration-200 cursor-pointer">
                Reservasi Sekarang
            </a>
        </div>

        {{-- Side right (Widget Reservasi Terdekat) --}}
        <div class="w-full md:w-1/3">
            <div class="bg-white p-5 shadow-md rounded-xl border border-Subtle">
                <h3 class="text-lg font-bold flex items-center mb-4 text-Title">
                    <i class="bi bi-calendar3 mr-3 text-secondary"></i>
                    Reservasi Berikutnya
                </h3>

                @if ($reservasiMendatang)
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-inverse font-semibold text-lg">{{ $reservasiMendatang->kelas->nama_kelas }}</p>
                            <p class="text-body text-sm mb-1">
                                {{ \Carbon\Carbon::parse($reservasiMendatang->tanggal)->translatedFormat('l, d M Y') }}
                            </p>
                            <p class="text-body text-sm font-mono">
                                {{ \Carbon\Carbon::parse($reservasiMendatang->jam_mulai)->format('H:i') }} WIB
                            </p>
                        </div>

                        {{-- Status Badge Dinamis --}}
                        <span
                            class="px-3 py-1 text-xs font-medium rounded-full ml-2
                            {{ $reservasiMendatang->status === \App\StatusReservasi::DITERIMA ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            @if ($reservasiMendatang->status === \App\StatusReservasi::DITERIMA)
                                Disetujui <i class="bi bi-check ml-1"></i>
                            @else
                                Pending <i class="bi bi-hourglass-split ml-1"></i>
                            @endif
                        </span>
                    </div>
                @else
                    {{-- Tampilan Kalau Gak Ada Jadwal --}}
                    <div class="text-center py-4 text-gray-400">
                        <i class="bi bi-calendar-x text-3xl mb-2 block"></i>
                        <p class="text-sm">Belum ada jadwal reservasi mendatang.</p>
                    </div>
                @endif

                <a href="{{ route('riwayat') }}"
                    class="block mt-4 text-right text-secondary text-sm hover:underline font-medium transition duration-200">
                    Lihat semua riwayat &rarr;
                </a>
            </div>
        </div>
    </div>

    {{-- List Lantai (Looping dari Database) --}}
    <div class="mt-12 mx-4 md:mx-15">
        <h2 class="text-xl font-semibold mb-6 text-Title border-l-4 border-secondary pl-3">Pilih Lokasi Ruangan</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @forelse($lantai as $l)
                {{-- Link ke Filter Lantai --}}
                <a href="{{ route('ruangan.index', ['lantai' => $l->id]) }}" class="block group">
                    <div
                        class="bg-white p-6 rounded-xl shadow-sm border border-Subtle hover:shadow-lg hover:border-secondary transition duration-200 cursor-pointer h-full flex flex-col items-center justify-center">
                        <div class="mb-3 p-3 bg-blue-50 rounded-full group-hover:bg-blue-100 transition">
                            <i class="bi bi-building-fill text-2xl text-secondary"></i>
                        </div>
                        <span class="font-bold text-lg text-Title">{{ $l->nama_lantai }}</span>
                        <p class="text-body text-sm mt-1">{{ $l->kelas_count }} ruang tersedia</p>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-10 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                    <p class="text-gray-500">Belum ada data lantai. Hubungi Admin.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
