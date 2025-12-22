<nav class="bg-[#063970] text-white shadow">
    <div class="container m-auto px-6 flex items-center justify-between h-16">

        {{-- Side Left --}}
        <div class="flex items-center space-x-2">
            <a href="/" class="text-3xl ms-15 font-bold">SIRuang</a>
        </div>

        {{-- Side Middle --}}
        <nav class="flex items-center space-x-6">

            {{-- Home --}}
            <a href="/"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->is('/')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-white' }}">
                Beranda
            </a>

            {{-- Reservasi --}}
            <a href="{{ route('ruangan.index') }}"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->routeIs('ruangan.*', 'reservasi.*')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:text-white hover:bg-gray-200/20' }}">
                Reservasi
            </a>

            {{-- Riyawat --}}
            <a href="/riwayat"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->routeis('riwayat')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-white' }}">
                Riwayat
            </a>
        </nav>

        {{-- Side Right --}}
        <div class="flex items-center me-15 space-x-6">

            {{-- Notifikasi --}}
            <x-notification-popup />


            {{-- Akun --}}
            <a href="{{ route('profile.edit') }}"
                class="flex items-center space-x-2 py-2 px-3 rounded-md transition-200
                {{ request()->routeIs('profile.*')
                    ? 'bg-white text-secondary'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-gray-200' }}">
                <i class="bi bi-person-circle"></i>
                <span>{{ auth()->user()->nama ?? 'Tamu' }}</span>
            </a>

            <div class="w-px h-6 bg-gray-300"></div>

            {{-- Keluar --}}
            <div id="logoutWrapper" class="relative">
                <x-logout-dropdown />

            </div>
        </div>
    </div>
</nav>
