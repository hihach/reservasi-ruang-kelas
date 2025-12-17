@extends('layouts.app')

@section('content')
    <div class="p-6">

        <div class="mb-6 mx-4 md:mx-8">
            <h1 class="text-xl font-semibold">Kotak Masuk</h1>
            <p class="text-gray-500 text-sm">Pembaruan status reservasi ruanganmu.</p>
        </div>

        {{-- Grid Wrapper --}}
        {{-- Gua ubah jadi responsive: 1 kolom di HP, 2 di Tablet, 4 di Laptop --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mx-4 md:mx-8">

            @forelse($notifikasi as $item)
                {{-- Logic Warna & Icon Berdasarkan Status --}}
                @php
                    $isApproved = $item->status === \App\StatusReservasi::DITERIMA;
                @endphp

                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex flex-col gap-3 hover:shadow-md transition">

                    {{-- Header Card: Status --}}
                    <div class="flex items-center gap-2">
                        @if($isApproved)
                            <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>
                            <h2 class="font-semibold text-lg text-green-700">Disetujui!</h2>
                        @else
                            <i class="bi bi-x-circle-fill text-red-600 text-xl"></i>
                            <h2 class="font-semibold text-lg text-red-700">Ditolak</h2>
                        @endif
                    </div>

                    {{-- Nama Ruangan --}}
                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-wide">Ruangan</p>
                        <p class="text-gray-800 font-medium">{{ $item->kelas->nama_kelas }}</p>
                    </div>

                    {{-- Tanggal --}}
                    <div class="flex items-center gap-2 text-gray-600 text-sm">
                        <i class="bi bi-calendar3 text-secondary"></i>
                        <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d M Y') }}</span>
                    </div>

                    {{-- Jam --}}
                    <div class="flex items-center gap-2 text-gray-600 text-sm">
                        <i class="bi bi-clock text-secondary"></i>
                        <span>{{ substr($item->jam_mulai, 0, 5) }} – {{ substr($item->jam_selesai, 0, 5) }} WIB</span>
                    </div>

                    {{-- Tanggal Update (Optional: Kapan admin acc/tolak) --}}
                    <div class="mt-2 pt-3 border-t border-gray-100 text-xs text-gray-400 text-right">
                        Diperbarui: {{ $item->updated_at->diffForHumans() }}
                    </div>
                </div>

            @empty
                {{-- Tampilan Kalau Kosong (State Empty) --}}
                <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                    <div class="bg-gray-100 rounded-full p-4 mb-4">
                        <i class="bi bi-bell-slash text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Belum ada notifikasi</h3>
                    <p class="text-gray-500 max-w-sm">Status reservasi kamu (Disetujui/Ditolak) akan muncul di sini setelah diproses Admin.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection
