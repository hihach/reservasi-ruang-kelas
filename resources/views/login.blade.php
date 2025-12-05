<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SIRuang</title>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- Google Font Inter --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 min-h-screen flex items-center justify-center bg-cover font-inter"
    style="background-image: url('/images/bg-loginn.jpg'); background-repeat: no-repeat; width: 100%; height: auto; background-position: 50% -30px;">
    <div class="absolute inset-0 bg-primary/75"></div>
    <div class="relative z-10 container mx-auto px-6 flex justify-between items-center">
        {{-- Side Left --}}
        <div class="w-1/2 ms-30 ">
            <h1 class="text-4xl text-white font-bold mb-3">SIRuang</h1>
            <p class="text-white text-lg">
                Sistem Informasi Ruangan Universitas Yatsi Madani
            </p>
        </div>

        {{-- Side right --}}
        <div class="w-1/3 me-30">
            <div class="bg-white p-8 rounded-xl border">
                <h2 class="text-2xl font-bold mb-6">LOGIN</h2>
                <form action="{{ route('home') }}" method="">
                    @csrf
                    {{-- NIM --}}
                    <label class="block text-sm font-medium mb-1">NIM</label>
                    <input type="text" name="nim" placeholder="Masukkan NIM"
                        class="w-full bg-white shadow-md rounded-md px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    {{-- Password --}}
                    <label class="block text-sm font-medium mb-1">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" name="password" placeholder="Masukkan kata sandi"
                            class="w-full bg-white shadow-md rounded-md px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button type="button" class="absolute right-3 top-2.5 text-gray-500">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                    </div>

                    <div class="flex justify-between items-center mb-4 text-xs">

                        {{-- Checkbox --}}
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2"> Ingat saya
                        </label>

                        {{-- lupa password --}}
                        <a href="#" class="text-blue-600 hover:underline">
                            Lupa kata sandi?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary cursor-pointer text-white py-2 rounded-md hover:bg-secondary">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
