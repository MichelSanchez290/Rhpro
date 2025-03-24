<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dx035' }}</title>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <style>
        /* Estilos para las alertas */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .loading-content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .success-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .success-content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert-image {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
        }

        .alert-message {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .alert-button {
            padding: 0.5rem 1.5rem;
            background-color: #3b82f6;
            color: white;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .alert-button:hover {
            background-color: #2563eb;
        }
    </style>
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
                    <!-- GoldenAdmin puede ver todo -->
                    @can('Ver todas las encuestas')
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
                    @endcan

                    @can('Ver encuestas de la empresa')
                    <li>
                        <a href="{{ route('encuesta.index') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">list</span>
                            Encuestas de mi empresa
                        </a>
                    </li>
                    @endcan

                    <!-- SucursalAdmin solo puede ver encuestas de su sucursal -->
                    @can('Ver encuestas de la sucursal')
                    <li>
                        <a href="{{ route('encuesta.sucursal') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">list</span>
                            Encuestas de mi sucursal
                        </a>
                    </li>
                    @endcan
                </ul>

                <!-- Sección de Usuarios -->
                <h2 class="text-lg font-bold text-gray-700 mt-8">Usuarios</h2>
                <ul class="space-y-4 mt-4">
                    <li>
                        <a href="{{ route('usuarios') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">group</span>
                            Lista de Usuarios
                        </a>
                    </li>
                </ul>


                <!-- Sección de Roles -->
                <!-- @can('Ver todas las encuestas') -->
                <h2 class="text-lg font-bold text-gray-700 mt-8">Roles</h2>
                <ul class="space-y-4 mt-4">
                    <li>
                        <a href="{{ route('mostrarrol') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">manage_accounts</span>
                            Gestión de Roles
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('asignarroluser', ['id' => Crypt::encrypt(auth()->id())]) }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-all hover:scale-105">
                            <span class="material-icons mr-3">assignment_ind</span>
                            Asignar Roles
                        </a>
                    </li>
                </ul>
                <!-- @endcan -->


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

                <!-- Sección de Encuestas -->
                <h2 class="text-lg font-bold text-gray-700 mt-8">Encuestas</h2>
                <ul class="space-y-4 mt-4">
                    <li>
                        <form action="{{ route('responder-cuestionario') }}" method="GET" class="flex items-center">
                            <input type="text" name="encuesta_clave" placeholder="Ingresar clave" class="border rounded-lg p-2" required>
                            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ir</button>
                        </form>
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

    <!-- Modales para alertas -->
    <div id="loadingAlert" class="loading-overlay">
        <div class="loading-content">
            <img src="https://i.gifer.com/ZZ5H.gif" alt="Cargando..." class="alert-image">
            <p class="alert-message">Generando reporte, por favor espere...</p>
        </div>
    </div>

    <div id="successAlert" class="success-overlay">
        <div class="success-content">
            <img src="https://cdn.pixabay.com/animation/2022/07/29/03/42/03-42-11-849_512.gif" alt="Éxito" class="alert-image">
            <p class="alert-message">¡Reporte generado con éxito!</p>
            <button onclick="hideSuccessAlert()" class="alert-button">Aceptar</button>
        </div>
    </div>

    @livewireScripts
    <!-- Scripts de JavaScript -->
    @vite(['resources/js/app.js'])
    <script>
        // Funciones para controlar las alertas
        function showLoadingAlert() {
            const loadingElement = document.getElementById('loadingAlert');
            loadingElement.style.display = 'flex';
            loadingElement.offsetHeight; // Forzar reflow
        }

        function hideLoadingAlert() {
            document.getElementById('loadingAlert').style.display = 'none';
        }

        function showSuccessAlert() {
            const successElement = document.getElementById('successAlert');
            successElement.style.display = 'flex';
            successElement.offsetHeight; // Forzar reflow
        }

        function hideSuccessAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }

        // Escuchar eventos de Livewire
        document.addEventListener('livewire:init', function() {
            Livewire.on('show-loading', () => {
                showLoadingAlert();
            });

            Livewire.on('hide-loading', () => {
                hideLoadingAlert();
            });

            Livewire.on('show-success', () => {
                hideLoadingAlert();
                showSuccessAlert();
                setTimeout(hideSuccessAlert, 3000);
            });

            Livewire.on('report-error', (message) => {
                hideLoadingAlert();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                    confirmButtonColor: '#3b82f6'
                });
            });

            Livewire.on('start-download', (url) => {
                const link = document.createElement('a');
                link.href = url;
                link.target = '_blank';
                link.download = 'reporte.pdf';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });

        // Funciones existentes para copiar clave y compartir enlace
        Livewire.on('copiar-clave', function (data) {
            navigator.clipboard.writeText(data.clave)
                .then(() => alert("Clave copiada al portapapeles: " + data.clave))
                .catch(() => alert("Error al copiar la clave"));
        });

        Livewire.on('compartir-enlace', function (data) {
            navigator.clipboard.writeText(data.enlace)
                .then(() => alert("Enlace copiado al portapapeles: " + data.enlace))
                .catch(() => alert("Error al copiar el enlace"));
        });
    </script>
</body>
</html>
