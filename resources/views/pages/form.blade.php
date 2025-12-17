@extends('layouts.app')

@section('content')
    <div class="p-8 max-w-5xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center mb-6 px-4">
            <div>
                <h1 class="text-xl font-semibold">Form Pengajuan Ruangan</h1>
                <p class="text-gray-500 text-sm">Pastikan data di bawah ini sudah benar.</p>
            </div>
            <span class="bg-secondary text-white ml-auto px-4 py-1 rounded-lg text-sm font-semibold shadow-md">
                {{ $dataReservasi['nama_kelas'] }}
            </span>
        </div>

        {{-- Form Utama --}}
        <form action="{{ route('reservasi.store') }}" method="POST" class="space-y-6 px-4">
            @csrf

            {{-- HIDDEN INPUTS (Data dari halaman sebelumnya) --}}
            <input type="hidden" name="id_kelas" value="{{ $dataReservasi['id_kelas'] }}">
            <input type="hidden" name="tanggal" value="{{ $dataReservasi['tanggal'] }}">
            <input type="hidden" name="jam_mulai" value="{{ $dataReservasi['jam_mulai'] }}">
            <input type="hidden" name="jam_selesai" value="{{ $dataReservasi['jam_selesai'] }}">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Nama Peminjam (Readonly) --}}
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
                    <label class="text-sm font-medium text-gray-700">Nama Peminjam</label>
                    <input type="text" value="{{ Auth::user()->nama }}" readonly
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed">
                </div>

                {{-- NIM / Username (Readonly) --}}
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
                    <label class="text-sm font-medium text-gray-700">NIM / NID</label>
                    <input type="text" value="{{ Auth::user()->nim }}" readonly
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed">
                </div>

                {{-- Tanggal (Readonly) --}}
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
                    <label class="text-sm font-medium text-gray-700">Tanggal Booking</label>
                    <input type="text" value="{{ \Carbon\Carbon::parse($dataReservasi['tanggal'])->format('d M Y') }}"
                        readonly
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed">
                </div>

                {{-- Waktu (Readonly) --}}
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
                    <label class="text-sm font-medium text-gray-700">Waktu</label>
                    <input type="text" value="{{ $dataReservasi['jam_mulai'] }} - {{ $dataReservasi['jam_selesai'] }}"
                        readonly
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-200 bg-gray-50 text-gray-500 cursor-not-allowed font-mono">
                </div>

                {{-- Kegiatan (Wajib Isi) --}}
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100 md:col-span-2">
                    <label class="text-sm font-medium text-gray-700">Nama Kegiatan <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="alasan" required
                        class="w-full mt-2 px-3 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-secondary outline-none transition"
                        placeholder="Contoh: Rapat Himpunan Mahasiswa">
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-3 mt-10 relative">
                <button type="button" id="btn-batal"
                    class="px-5 py-2.5 rounded-lg bg-red-100 text-red-600 font-medium hover:bg-red-200 transition">
                    Batal
                </button>

                <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-success text-white font-semibold shadow-md hover:bg-green-700 hover:shadow-lg transition">
                    Ajukan Pengajuan
                </button>
            </div>

            {{-- POPUP BATAL --}}
            <div id="popup-batal" class="fixed inset-0 bg-black bg-opacity-30 z-40 hidden flex items-center justify-center">
                <div class="bg-white w-80 p-6 rounded-xl shadow-2xl transform scale-95 transition-transform duration-200">
                    <h3 class="text-lg font-bold flex items-center text-gray-800 mb-2">
                        <i class="bi bi-exclamation-circle text-red-500 mr-2"></i> Konfirmasi
                    </h3>
                    <p class="text-gray-600 text-sm mb-6">Yakin mau membatalkan proses booking ini?</p>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="batal-tidak"
                            class="px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200">Lanjut Booking</button>
                        <a href="{{ route('ruangan.index') }}"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Ya, Batal</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const btnBatal = document.getElementById("btn-batal");
                const popupBatal = document.getElementById("popup-batal");
                const batalTidak = document.getElementById("batal-tidak");

                btnBatal.addEventListener("click", () => popupBatal.classList.remove("hidden"));
                batalTidak.addEventListener("click", () => popupBatal.classList.add("hidden"));

                // Klik background tutup popup
                popupBatal.addEventListener("click", (e) => {
                    if (e.target === popupBatal) popupBatal.classList.add("hidden");
                });
            });
        </script>
    @endpush
@endsection
