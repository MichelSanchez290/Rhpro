<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portal 360 - Encuesta') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-blue-50">
    <!-- <header class="bg-blue-600 text-white shadow">
        <div class="container mx-auto p-4">
            <h1 class="text-lg font-bold">Portal 360 - Encuesta</h1>
        </div>
    </header> -->

    @include('navigation-menudev')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200  transition-all main">
        @include('searchbar')
        <!-- Content -->
        <div class="pt-5">
            <main class="">
                {{ $slot }}
            </main>
        </div>
        <!-- End Content -->
    </main>
    <!-- <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; {{ date('Y') }} Portal 360. Todos los derechos reservados.</p>
    </footer> -->

    @livewireScripts
</body>
</html>