@php
    $isNotifPage = request()->routeIs('notifikasi');
@endphp

<div id="notifWrapper" class="relative">

    <!-- Tombol Notifikasi -->
    <button id="notifBtn"
        class="relative flex items-center py-2 px-5 rounded-md transition-200 
        {{ $isNotifPage
            ? 'bg-white text-secondary shadow-sm'
            : 'text-gray-300 hover:bg-gray-200/20 hover:text-gray-200' }}">

        <i class="bi bi-bell-fill text-xl"></i>

        <span class="absolute top-1 right-3 bg-red-500 text-white text-[10px] px-1.5 rounded-full">3</span>
    </button>

    <!-- Popup -->
    <div id="notifDropdown"
        class="absolute right-0 mt-2 w-[450px] bg-white rounded-xl shadow-lg z-50 overflow-hidden hidden opacity-0 transition-opacity duration-200">

        <!-- Header -->
        <div class="flex justify-between items-center px-4 py-3 border-b">
            <h4 class="font-semibold text-gray-800">Pemberitahuan</h4>
            <button class="text-sm text-blue-500 hover:underline">
                Tandai Semua Dibaca
            </button>
        </div>

        <hr class="border-gray-200">

        <!-- List -->
        <div class="max-h-[300px] overflow-y-auto">

            {{-- Belum dibaca --}}
            {{-- Ditolak --}}
            <div class="px-4 py-3">
                <p class="font-semibold text-sm text-error flex items-center gap-1">
                    Reservasi Ditolak!
                </p>
                <p class="text-xs text-gray-600"> <i class="bi bi-building-fill mr-2"></i>
                    Ruang 410 </p>
                <p class="text-xs text-gray-600">
                    <span><i class="bi bi-calendar3 mr-2"></i> Selasa, 17 Januari 2025</span>
                    <span class="px-5"><i class="bi bi-clock mr-2"></i> 13:30 - 15:00 WIB</span>
                </p>
            </div>

            <hr class="border-gray-200">

            {{-- Belum dibaca --}}
            {{-- Ditolak --}}
            <div class="px-4 py-3 bg-gray-100">
                <p class="font-semibold text-sm text-error flex items-center gap-1">
                    Reservasi Ditolak!
                </p>
                <p class="text-xs text-gray-600"> <i class="bi bi-building-fill mr-2"></i>
                    Ruang 410 </p>
                <p class="text-xs text-gray-600">
                    <span><i class="bi bi-calendar3 mr-2"></i> Selasa, 17 Januari 2025</span>
                    <span class="px-5"><i class="bi bi-clock mr-2"></i> 13:30 - 15:00 WIB</span>
                </p>
            </div>

            <hr class="border-gray-200">

            {{-- Sudah dibaca --}}
            {{-- Disetujui --}}
            <div class="px-4 py-3 bg-gray-100">
                <p class="font-semibold text-sm text-success flex items-center gap-1">
                    Reservasi Disetujui!
                </p>
                <p class="text-xs text-gray-600"> <i class="bi bi-building-fill mr-2"></i>
                    Ruang 410 </p>
                <p class="text-xs text-gray-600">
                    <span><i class="bi bi-calendar3 mr-2"></i> Selasa, 17 Januari 2025</span>
                    <span class="px-5"><i class="bi bi-clock mr-2"></i> 13:30 - 15:00 WIB</span>
                </p>
            </div>

        </div>

        <hr class="border-gray-200">

        <!-- Footer -->
        <div class="border-t px-4 py-3 text-center">
            <a href="{{ route('notifikasi') }}" class="text-sm text-blue-500 hover:underline">
                Lihat Semua
            </a>
        </div>
    </div>
</div>
