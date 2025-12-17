<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRuang</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])

</head>

<body class="bg-page font-sans">

    {{-- TOPBAR --}}
    @include('layouts.topbar')

    {{-- MAIN CONTENT --}}
    <main class="min-h-screen container mx-auto px-6 py-8">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')
    @stack('scripts')
</body>

</html>
