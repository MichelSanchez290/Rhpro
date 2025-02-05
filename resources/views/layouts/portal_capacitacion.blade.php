<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal de Capacitación</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireStyles
</head>
<body class="flex">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-white h-screen fixed top-0 left-0 z-50">
    <div class="p-4 text-center border-b border-gray-700">
      <img src="{{ asset('img/CESRH.png') }}" alt="Logo" class="h-12 mx-auto">
    </div>
    <nav class="mt-4 z-50">
      <ul class="space-y-2">
        <li class="opcion-con-desplegable">
          <button class="w-full text-left px-4 py-2 hover:bg-gray-700 flex items-center">
            <i class="fa-solid fa-chalkboard-user mr-2"></i> Portal de Capacitación
            <i class="fas fa-chevron-down ml-auto"></i>
          </button>
          <ul class="desplegable hidden pl-8 space-y-2">
            <a href="{{ route('mostrarPerfilPuesto') }}" class="block px-4 py-2">Ver perfiles de puesto</a>
            <a href="{{route('mostrarFuncionesEspecificas')}}" class="block px-4 py-2">Funciones específicas</a>
            <a href="{{route('mostrarRelacionesInternas')}}" class="block px-4 py-2">Relaciones internas</a>
            <a href="{{route('mostrarRelacionesExternas')}}" class="block px-4 py-2">Relaciones externas</a>
            <a href="{{route('mostrarResponsabilidadesUniversales')}}" class="block px-4 py-2">Responsabilidades universales</a>
            <a href="{{route('mostrarHabilidadesHumanas')}}" class="block px-4 py-2">Formación y habilidades humanas</a>
            <a href="{{route('mostrarHabilidadesTecnicas')}}" class="block px-4 py-2">Formación y habilidades técnicas</a>
          </ul>
        </li>
        <li>
          <button class="w-full text-left px-4 py-2 hover:bg-gray-700 flex items-center" onclick="window.location.href='{{ route('mostrarUsuarios') }}'">
            <i class="fa-solid fa-users mr-2"></i> Trabajadores
          </button>        
        </li>
        <li class="opcion-con-desplegable">
          <button class="w-full text-left px-4 py-2 hover:bg-gray-700 flex items-center">
            <i class="fa-solid fa-id-card-clip mr-2"></i> Asociar Perfil de Puesto a trabajador
            <i class="fas fa-chevron-down ml-auto"></i>
          </button>
          <ul class="desplegable hidden pl-8 space-y-2">
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Presupuestos</a></li>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Informe médico</a></li>
          </ul>
        </li>
        <li class="opcion-con-desplegable">
          <button class="w-full text-left px-4 py-2 hover:bg-gray-700 flex items-center">
            <i class="fas fa-file-alt mr-2"></i> Evaluacion del colaborador
            <i class="fas fa-chevron-down ml-auto"></i>
          </button>
          <ul class="desplegable hidden pl-8 space-y-2">
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Manual de usuario</a></li>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Políticas</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 ml-64">
    <!-- Navbar -->
    <nav class="p-4 flex items-center justify-between backdrop-blur-md shadow-md fixed top-0 left-64 right-0 z-10 bg-gray-900 text-white">
      <h1 class="text-lg font-semibold">Portal de Capacitación</h1>
      <div class="flex items-center space-x-4">
        
        <span class="block font-semibold">{{ Auth::user()->name }}</span>
        <!-- User Menu -->
        <div class="relative">
          <button class="flex items-center focus:outline-none">
            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4z"/>
            </svg>
          </button>
          <div class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-700 rounded shadow-lg">
            <div class="px-4 py-2 border-b">
            </div>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Perfil</a>
            <form method="POST" action="#">
              <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Cerrar sesión</button>
            </form>
          </div>
        </div>
      </div>
    </nav>

    <main class="mt-16 p-4">
      {{ $slot }}
    </main>
  </div>

  @stack('modals')

  @livewireScripts

  @stack('js')

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Obtener todas las opciones principales con desplegables
      const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");

      // Agregar evento de clic a cada opción principal
      opcionesConDesplegable.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
          // Obtener el desplegable asociado a la opción
          const desplegable = opcion.querySelector(".desplegable");

          // Alternar la clase "hidden" para mostrar u ocultar el desplegable
          desplegable.classList.toggle("hidden");
        });
      });
    });
  </script>
</body>
</html>