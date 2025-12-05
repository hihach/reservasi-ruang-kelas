<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRuang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-page font-inter">

    {{-- TOPBAR --}}
    @include('layouts.topbar')

    {{-- MAIN CONTENT --}}
    <main class="min-h-screen container mx-auto px-6 py-8">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
