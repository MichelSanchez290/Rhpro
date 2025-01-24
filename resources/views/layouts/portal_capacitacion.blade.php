<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal de Capacitación</title>
  <!-- Agregar el enlace al archivo de estilos de Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Agregar el enlace al archivo de la biblioteca FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
</head>
<body>
<!-- Navegación Superior -->
<nav class="bg-blue-500 p-4 flex items-center justify-between">
    <div>
        <h1 class="text-white text-xl font-semibold">Portal de Capacitación</h1>
    </div>
    <div class="flex items-center space-x-4">
        <!-- Nombre de usuario y menú desplegable -->
        <div class="relative">
            <!-- Botón del menú -->
            <button id="user-menu-button" class="text-white flex items-center focus:outline-none">
                {{ Auth::user()->name }}
                <svg class="ms-2 h-4 w-4 text-white ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <!-- Menú desplegable -->
            <div id="user-menu" class="hidden absolute bg-white text-gray-700 rounded shadow-lg mt-2 w-48 right-0">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Perfil
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>


  <div class="flex">
    <!-- Navegación lateral -->
    <aside class="bg-gray-800 text-white w-64 min-h-screen p-4">
      <nav>
        <ul class="space-y-2">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-calendar-alt mr-2"></i>
                <span>Portal de Capacitación</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <li>
                <a href="{{ route('mostrarPerfilPuesto') }}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Ver perfiles de puesto
                </a>
              </li>
              <li>
                <a href="{{route('mostrarFuncionesEspecificas')}}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Funciones especificas
                </a>
              </li>
              <li>
                <a href="{{route('mostrarRelacionesInternas')}}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Relaciones internas
                </a>
              </li>
              <li>
                <a href="{{route('mostrarRelacionesExternas')}}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Relaciones externas
                </a>
              </li>
              <li>
                <a href="{{route('mostrarResponsabilidadesUniversales')}}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Responsabilidades universales
                </a>
              </li>
              <li>
                <a href="{{route('mostrarHabilidadesHumanas')}}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Formación y habilidades humanas
                </a>
              </li>
              <li>
                <a href="{{route('mostrarHabilidadesTecnicas')}}" class="block p-2 hover:bg-gray-700 flex items-center">
                  Formación y habilidades tecnicas
                </a>
              </li>
            </ul>
          </li>
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-money-bill-wave mr-2"></i>
                <span>Contabilidad</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Tratamientos
                </a>
              </li>
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Gastos
                </a>
              </li>
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Facturas
                </a>
              </li>
            </ul>
          </li>
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-chart-bar mr-2"></i>
                <span>Informes</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Presupuestos
                </a>
              </li>
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Informe médico
                </a>
              </li>
            </ul>
          </li>
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
              <div class="flex items-center">
                <i class="fas fa-file-alt mr-2"></i>
                <span>Documentación</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Firmas pendientes
                </a>
              </li>
              <li>
                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Documentos
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-4">
      {{ $slot }}
    </main>
  </div>
<!--
    <div class="flex bg-blue-500 p-4 items-center">
        <div class="flex flex-wrap -mx-3 my-3">
            <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
                <p class="text-sm text-slate-500 py-1 text-center">
                    Copyright © 2022 Todos los derechos estan reservados CESRH.
                </p>
            </div>
        </div>
    </div>
-->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");
      opcionesConDesplegable.forEach(function (opcion) {
        opcion.addEventListener("click", function () {
          const desplegable = opcion.querySelector(".desplegable");
          desplegable.classList.toggle("hidden");
        });
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('user-menu-button');
        const menu = document.getElementById('user-menu');

        menuButton.addEventListener('click', function () {
            menu.classList.toggle('hidden'); // Mostrar/ocultar el menú
        });

        // Cerrar el menú si se hace clic fuera de él
        document.addEventListener('click', function (event) {
            if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    });
  </script>

  @stack('modals')

  @livewireScripts
</body>
</html>
