<div id="app">
    <!-- Barra superior -->
    <nav
        class="navbar bg-gray-800 text-white flex items-center justify-between px-6 py-4 fixed top-0 left-0 w-full z-50">
        <div class="flex items-center space-x-4">
            <button id="menu-toggle" class="focus:outline-none">
                <span class="icon">
                    <i class="mdi mdi-menu text-white text-2xl"></i>
                </span>
            </button>
            <img src="{{ asset('img/cesrh.jpeg') }}" alt="Logo CESRH" class="h-12 rounded-lg">
        </div>
        <div class="ms-3 relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Mi Perfil') }}
                    </x-dropdown-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </nav>

    <!-- Barra lateral -->
    <aside id="sidebar" class="bg-gray-800 text-white w-64 h-full fixed top-0 left-0 z-40 overflow-auto">
        <div class="p-4 text-lg font-bold border-b border-gray-600">
            A
        </div>
        <div class="p-4 text-lg font-bold border-b border-gray-600">
            Administrador
        </div>
        <nav class="mt-4">
            <ul class="space-y-2">
                <!-- Registros Patronales -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-file-alt mr-2"></i>
                        <span class="flex-1">Registros Patronales</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrarregpatronal') }}"
                                class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Empresas -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-building mr-2"></i>
                        <span class="flex-1">Empresas</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrarempresas') }}"
                                class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar
                            </a>
                        </li>
                        <li>
                            <a href="#" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Opción 2
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Sucursales -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-home mr-2"></i> <!-- Icono de casita -->
                        <span class="flex-1">Sucursales</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrarsucursal') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar Sucursales
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </nav>
    </aside>
</div>

<!-- Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        const opcionesConDesplegable = document.querySelectorAll('.opcion-con-desplegable');
        opcionesConDesplegable.forEach(opcion => {
            opcion.addEventListener('click', () => {
                const desplegable = opcion.querySelector('.desplegable');
                desplegable.classList.toggle('hidden');
            });
        });
    });
</script>

<!-- FontAwesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
