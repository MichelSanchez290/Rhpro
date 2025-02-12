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
          <button class="w-full text-left px-4 py-2 hover:bg-gray-700 flex items-center" onclick="window.location.href='{{ route('asociarPuestoTrabajador') }}'">
            <i class="fa-solid fa-id-card-clip mr-2"></i> Asociar Perfil de Puesto a trabajador
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
        
        <div class="ms-3 relative">
          <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                      <button
                          class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                          <img class="h-8 w-8 rounded-full object-cover"
                              src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                      </button>
                  @else
                      <span class="inline-flex rounded-md">
                          <button type="button"
                              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                              {{ Auth::user()->name }}

                              <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>
                          </button>
                      </span>
                  @endif
              </x-slot>

              <x-slot name="content">
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                      {{ __('Manage Account') }}
                  </div>

                  <x-dropdown-link href="{{ route('profile.show') }}">
                      {{ __('Profile') }}
                  </x-dropdown-link>

                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                      <x-dropdown-link href="{{ route('api-tokens.index') }}">
                          {{ __('API Tokens') }}
                      </x-dropdown-link>
                  @endif

                  <div class="border-t border-gray-200"></div>

                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}" x-data>
                      @csrf

                      <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
              </x-slot>
          </x-dropdown>
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