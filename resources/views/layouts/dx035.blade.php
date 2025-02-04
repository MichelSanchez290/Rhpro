<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dx035' }}</title>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-white text-gray-900 shadow-xl mb-4">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex items-center">
                <!-- Logo -->
                <img src="{{ asset('Dx035Images/Dx035logo_envolvente.png') }}" alt="Logo Dx035" class="h-16 sm:h-20 mr-4 rounded-lg">
                <div class="text-lg font-semibold whitespace-nowrap">
                    Dx035 - Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-gray-800 font-medium">
                    {{ Auth::user()->name ?? 'Usuario' }}
                </div>
                <a href="{{ route('logout') }}" class="bg-blue-500 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-blue-600 transition-all transform hover:scale-105"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <!-- Layout Principal -->
    <div class="flex">
        <!-- Sidebar -->
        <nav class="bg-white w-80 min-h-screen shadow-lg border-r hover:bg-blue-50 transition-all -mt-4">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-600 mb-6 whitespace-nowrap">Panel de Administración</h1>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('home') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">dashboard</span>
                            Página Principal
                        </a>
                    </li>
                </ul>

                <!-- Sección de Encuestas -->
                <h2 class="text-lg font-bold text-gray-700 mt-8">Encuestas</h2>
                <ul class="space-y-4 mt-4">
                    <li>
                        <a href="{{ route('encuesta.create') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">add_circle</span>
                            Crear Encuesta
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('encuesta.index') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">list</span>
                            Listar Encuestas
                        </a>
                    </li>
                </ul>

                <!-- Sección de Usuarios -->
                <h2 class="text-lg font-bold text-gray-700 mt-8">Usuarios</h2>
                <ul class="space-y-4 mt-4">
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">group</span>
                            Usuarios Activos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">group_off</span>
                            Usuarios Inactivos
                        </a>
                    </li>
                </ul>

                <!-- Sección de Cuestionarios (Actualizada con las nuevas rutas) -->
                <h2 class="text-lg font-bold text-gray-700 mt-8">Cuestionarios</h2>
                <ul class="space-y-4 mt-4">
                    <li>
                        <a href="{{ route('preguntas.agregar') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">add_circle</span>
                            Agregar Pregunta Base
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('preguntas.mostrar') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">list</span>
                            Listar Preguntas Base
                        </a>
                    </li>
                </ul>
            </div>
            <footer class="p-4 border-t mt-auto text-sm text-gray-500 bg-gray-200">
                <p>Ingresaste como: {{ Auth::user()->name ?? 'Usuario' }}</p>
                <p class="mt-2">© {{ date('Y') }} Dx035</p>
            </footer>
        </nav>

        <!-- Contenido Principal -->
        <main class="flex-1 p-8 bg-gray-100">
            {{ $slot }}
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p class="text-sm">Dx035 - Todos los derechos reservados © {{ date('Y') }}</p>
    </footer>

    @livewireScripts
</body>
</html>
