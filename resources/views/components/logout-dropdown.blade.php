<div id="logoutWrapper" class="relative">
    <button id="logoutBtn"
        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200 ease-in-out font-medium text-sm shadow-sm">
        <span>Keluar</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-80" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <div id="logoutDropdown"
        class="absolute right-0 mt-3 w-72 bg-white rounded-xl shadow-2xl border border-gray-100 z-50 transform transition-all duration-200 origin-top-right scale-95 opacity-0 invisible">

        <div class="absolute -top-2 right-4 w-4 h-4 bg-white transform rotate-45 border-l border-t border-gray-100"></div>

        <div class="p-6 relative z-10">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 bg-red-50 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>

                <div>
                    <h5 class="text-gray-900 font-bold text-lg">
                        Konfirmasi Keluar
                    </h5>
                    <p class="text-gray-500 text-sm mt-1 leading-relaxed">
                        Apakah Anda yakin ingin mengakhiri sesi ini?
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 mt-6">
                <button id="cancelLogout"
                    class="px-4 py-2 bg-white text-gray-600 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                    Batal
                </button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 shadow-md hover:shadow-lg transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Ya, Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
