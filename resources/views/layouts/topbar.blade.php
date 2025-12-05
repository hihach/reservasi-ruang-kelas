<nav class="bg-[#063970] text-white shadow">
    <div class="container m-auto px-6 flex items-center justify-between h-16">

        {{-- Side Left --}}
        <div class="flex items-center space-x-2">
            <span class="text-3xl ms-15 font-bold">SIRuang</span>
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
            <a href="{{ route('ruangan') }}"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->routeIs('ruangan', 'jam', 'form')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:text-white hover:bg-gray-200/20' }}">
                Reservasi
            </a>

            {{-- Riyawat --}}
            <a href="/riwayat"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->is('riwayat')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-white' }}">
                Riwayat
            </a>
        </nav>

        {{-- Side Right --}}
        <div class="flex items-center me-15 space-x-6">

            {{-- Notifikasi --}}
            <a href="{{ route('notifikasi') }}"
                class="flex items-center py-2 px-5 rounded-md transition-200
                {{ request()->routeIs('notifikasi')
                    ? 'bg-white text-secondary'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-gray-200' }}">
                <i class="bi bi-bell-fill text-xl"></i>
            </a>

            {{-- Akun --}}
            <a href="{{ route('akun') }}"
                class="flex items-center space-x-2 py-2 px-3 rounded-md transition-200
                {{ request()->routeIs('akun')
                    ? 'bg-white text-secondary'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-gray-200' }}">
                <i class="bi bi-person-circle"></i>
                <span>John Doe</span>
            </a>

            <div class="w-px h-6 bg-gray-300"></div>

            {{-- Keluar --}}
            {{-- menggunakan Alpine.js --}}
            <div x-data="{ openLogout: false }" class="relative">

                {{-- Tombol buka dropdown logout --}}
                <button @click="openLogout = !openLogout"
                    class="bg-red-500 cursor-pointer hover:bg-red-600 text-white px-3 py-1 rounded flex items-center space-x-2">
                    <span>Keluar</span>
                </button>

                {{-- Konfirmasi keluar --}}
                <div x-show="openLogout" @click.outside="openLogout = false" x-transition
                    class="absolute right-0 mt-2 w-68 bg-white shadow-lg rounded-lg py-4 px-7 z-10">

                    <h5 class="text-black font-semibold text-lg">
                        <i class="bi bi-box-arrow-right text-error mr-3"></i>
                        Konfirmasi Keluar
                    </h5>

                    <p class="text-black mb-3 text-sm mt-1">
                        Apakah Anda yakin ingin keluar?
                    </p>

                    {{-- Button konfirmasi --}}
                    <div class="flex justify-center space-x-2">

                        <button @click="openLogout = false"
                            class="px-3 py-1 bg-Subtle text-black rounded hover:bg-gray-300 transition-200">
                            Batal
                        </button>

                        <form action="{{ route('login') }}" method="">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 bg-error text-white rounded hover:bg-red-600 transition-200">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
