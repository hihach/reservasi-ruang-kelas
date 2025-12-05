<nav class="bg-[#063970] text-white shadow">
    <div class="container m-auto px-6 flex items-center justify-between h-16">

        {{-- ======================== --}}
        {{--        LEFT LOGO         --}}
        {{-- ======================== --}}
        <div class="flex items-center space-x-2">
            {{-- Nama aplikasi --}}
            <span class="text-3xl ms-15 font-bold">SIRuang</span>
        </div>

        {{-- ======================== --}}
        {{--        MIDDLE MENU       --}}
        {{-- ======================== --}}
        {{-- Menu navigasi utama --}}
        <nav class="flex items-center space-x-6">

            {{-- ======================== --}}
            {{-- Menu: Beranda --}}
            {{-- Highlight jika berada di route "/" --}}
            {{-- ======================== --}}
            <a href="/"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->is('/')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-white' }}">
                Beranda
            </a>

            {{-- ======================== --}}
            {{-- Menu: Reservasi --}}
            {{-- Aktif jika route adalah ruangan / jam / form --}}
            {{-- ======================== --}}
            <a href="{{ route('ruangan') }}"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->routeIs('ruangan', 'jam', 'form')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:text-white hover:bg-gray-200/20' }}">
                Reservasi
            </a>

            {{-- ======================== --}}
            {{-- Menu: Riwayat --}}
            {{-- Aktif jika url = /riwayat --}}
            {{-- ======================== --}}
            <a href="/riwayat"
                class="px-4 py-2 rounded-md transition-200
                {{ request()->is('riwayat')
                    ? 'bg-white text-secondary font-semibold shadow-sm'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-white' }}">
                Riwayat
            </a>

        </nav>

        {{-- ======================== --}}
        {{--        RIGHT ICONS       --}}
        {{-- ======================== --}}
        <div class="flex items-center me-15 space-x-6">

            {{-- ======================== --}}
            {{-- Icon Notifikasi --}}
            {{-- Highlight jika berada pada route notifikasi --}}
            {{-- ======================== --}}
            <a href="{{ route('notifikasi') }}"
                class="flex items-center py-2 px-5 rounded-md transition-200
                {{ request()->routeIs('notifikasi')
                    ? 'bg-white text-secondary'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-gray-200' }}">
                <i class="bi bi-bell-fill text-xl"></i>
            </a>

            {{-- ======================== --}}
            {{-- Icon User / Profil --}}
            {{-- Highlight jika berada di route akun --}}
            {{-- ======================== --}}
            <a href="{{ route('akun') }}"
                class="flex items-center space-x-2 py-2 px-3 rounded-md transition-200
                {{ request()->routeIs('akun')
                    ? 'bg-white text-secondary'
                    : 'text-gray-300 hover:bg-gray-200/20 hover:text-gray-200' }}">
                <i class="bi bi-person-circle"></i>

                {{-- Nama user — nanti bisa diganti dengan auth()->user()->nama --}}
                <span>John Doe</span>
            </a>

            {{-- Garis pemisah --}}
            <div class="w-px h-6 bg-gray-300"></div>

            {{-- ========================= --}}
            {{--      LOGOUT DROPDOWN      --}}
            {{-- ========================= --}}
            {{-- Dropdown menggunakan Alpine.js --}}
            <div x-data="{ openLogout: false }" class="relative">

                {{-- Tombol buka dropdown logout --}}
                <button @click="openLogout = !openLogout"
                    class="bg-red-500 cursor-pointer hover:bg-red-600 text-white px-3 py-1 rounded flex items-center space-x-2">
                    <span>Keluar</span>
                </button>

                {{-- ========================= --}}
                {{-- Dropdown Konfirmasi Logout --}}
                {{-- Muncul ketika openLogout = true --}}
                {{-- ========================= --}}
                <div x-show="openLogout" @click.outside="openLogout = false" x-transition
                    class="absolute right-0 mt-2 w-68 bg-white shadow-lg rounded-lg py-4 px-7 z-10">

                    {{-- Judul Konfirmasi --}}
                    <h5 class="text-black font-semibold text-lg">
                        <i class="bi bi-box-arrow-right text-error mr-3"></i>
                        Konfirmasi Keluar
                    </h5>

                    {{-- Deskripsi --}}
                    <p class="text-black mb-3 text-sm mt-1">
                        Apakah Anda yakin ingin keluar?
                    </p>

                    {{-- Tombol aksi --}}
                    <div class="flex justify-center space-x-2">

                        {{-- Menutup dropdown --}}
                        <button @click="openLogout = false"
                            class="px-3 py-1 bg-Subtle text-black rounded hover:bg-gray-300 transition-200">
                            Batal
                        </button>

                        {{-- ========================= --}}
                        {{-- Tombol Keluar --}}
                        {{-- Arahkan ke route logout jika backend sudah dibuat --}}
                        {{-- Sekarang diarahkan ke route login --}}
                        {{-- ========================= --}}
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
