<div id="logoutWrapper" class="relative">

    <button id="logoutBtn"
        class="bg-red-500 cursor-pointer hover:bg-red-600 text-white px-3 py-1 rounded flex items-center space-x-2">
        <span>Keluar</span>
    </button>

    <div id="logoutDropdown"
        class="absolute right-0 mt-2 w-68 bg-white shadow-lg rounded-lg py-4 px-7 z-10 hidden opacity-0 transition-opacity duration-200">

        <h5 class="text-black font-semibold text-lg">
            <i class="bi bi-box-arrow-right text-error mr-3"></i>
            Konfirmasi Keluar
        </h5>

        <p class="text-black mb-3 text-sm mt-1">
            Apakah Anda yakin ingin keluar?
        </p>

        <div class="flex justify-center space-x-2">
            <button id="cancelLogout" class="px-3 py-1 bg-Subtle text-black rounded hover:bg-gray-300 transition-200">
                Batal
            </button>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-3 py-1 bg-error text-white rounded hover:bg-red-600 transition-200">
                    Keluar
                </button>
            </form>
        </div>

    </div>
</div>
