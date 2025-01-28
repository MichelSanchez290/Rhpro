<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dx035' }}</title>

    <!-- Vite para CSS y JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <span>Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}</span>
        <a href="{{ route('logout') }}" class="text-white font-semibold"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <nav class="bg-white w-64 min-h-screen p-4 border-r">
            <h2 class="text-lg font-bold mb-4">PANEL DE ADMINISTRACIÓN</h2>
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-gray-200">Página Principal</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-200">Panel Rápido</a>
                </li>
            </ul>

            <h2 class="text-lg font-bold mt-6 mb-4">ENCUESTAS</h2>
            <ul>
                <li>
                    <a href="{{ route('encuesta.create') }}" class="block py-2 px-4 hover:bg-gray-200">Crear Encuesta</a>
                </li>
                <li>
                    <a href="{{ route('encuesta.index') }}" class="block py-2 px-4 hover:bg-gray-200">Listar Encuestas</a>
                </li>
            </ul>

            <h2 class="text-lg font-bold mt-6 mb-4">USUARIOS</h2>
            <ul>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-200">Usuarios Activos</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-200">Usuarios Inactivos</a></li>
            </ul>

            <footer class="mt-8 text-sm text-gray-500">
                Ingresaste como: {{ Auth::user()->name ?? 'Usuario' }}
            </footer>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 text-center">
        Derechos reservados © {{ date('Y') }}
    </footer>

    @livewireScripts
</body>
</html>
