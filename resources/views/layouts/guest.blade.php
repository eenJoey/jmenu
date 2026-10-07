<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @if ($isMenuPage = request()->routeIs('categories.*'))
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Serif:wght@400;500&display=swap">
    @endif

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @if ($isMenuPage)
        <link rel="stylesheet" href="{{ asset('css/jeronimo.css') }}">
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="shadow-md {{ $isMenuPage ? 'jc-header' : '' }}"
        style="background-color: {{ $isMenuPage ? '#fceee3' : '#b89d64' }}">
        <nav class="container mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-center">
                <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
                    href="/">
                    <img class="header__logo" src="{{ asset('images/jeronimo-logo.png') }}" alt="">
                    {{-- TODO: Add logo here in the center, gold or brown header --}}
                </a>
            </div>
        </nav>
    </div>
    <div style="background-color: {{ $isMenuPage ? '#fceee3' : '#2b1b13' }};"
        class="font-sans text-gray-900 antialiased min-h-screen {{ $isMenuPage ? 'jc-page' : '' }}">
        {{ $slot }}
    </div>
</body>

<style>
    .header__logo {
        height: 100px;
    }
</style>
</html>
