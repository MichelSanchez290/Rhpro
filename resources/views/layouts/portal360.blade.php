<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portal 360 - Encuesta') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,700&display=swap" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

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
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64   transition-all main">
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
    <!-- jQuery (requerido por Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Script para manejar notificaciones -->
    <script>
        $(document).ready(function() {
            // Configuración de Toastr
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
                "closeButton": true,
                "timeOut": 4000, // Duración de la notificación
            };
        });

        // Escuchar eventos de Livewire para mostrar notificaciones
        window.addEventListener('toastr-success', event => {
            toastr.success(event.detail.message);
        });

        window.addEventListener('toastr-error', event => {
            toastr.error(event.detail.message);
        });
    </script>
    

    @yield('content')
</body>
</html>

