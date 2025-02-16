<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- FontaAwasome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
        <!-- FontaAwasome -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
   <!-- Scripts de JavaScript -->
   @vite(['resources/js/app.js'])
   <script>
    // Escuchar el evento para copiar la clave
    Livewire.on('copiar-clave', function (data) {
        const clave = data.clave;
        navigator.clipboard.writeText(clave)
            .then(() => alert("Clave copiada al portapapeles: " + clave))
            .catch(() => alert("Error al copiar la clave"));
    });

    // Escuchar el evento para compartir el enlace
    Livewire.on('compartir-enlace', function (data) {
        const enlace = data.enlace;
        navigator.clipboard.writeText(enlace)
            .then(() => alert("Enlace copiado al portapapeles: " + enlace))
            .catch(() => alert("Error al copiar el enlace"));
    });
</script>

    </body>
</html>

