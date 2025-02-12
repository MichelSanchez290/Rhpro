<div id="app">
    <!-- Barra superior -->
    <nav class="navbar bg-gray-800 text-white flex items-center justify-between px-6 py-4 fixed top-0 left-0 w-full z-50">
        <div class="flex items-center space-x-4">
            <button id="menu-toggle" class="focus:outline-none">
                <span class="icon">
                    <i class="mdi mdi-menu text-white text-2xl"></i>
                </span>
            </button>
            <img src="{{ asset('img/cesrh.jpeg') }}" alt="Logo CESRH" class="h-12 rounded-lg">
        </div>

        <!-- Settings Dropdown con Alpine.js -->
        <div class="relative" x-data="{ open: false }">
            <!-- Botón de usuario -->
            <button @click="open = !open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                @else
                    <span class="inline-flex rounded-md">
                        <span class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </span>
                @endif
            </button>

            <!-- Contenido del Dropdown -->
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 shadow-lg rounded-md">
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Administrar Cuenta') }}
                </div>
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    {{ __('Perfil') }}
                </a>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        {{ __('API Tokens') }}
                    </a>
                @endif
                <div class="border-t border-gray-200"></div>
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        {{ __('Cerrar Sesión') }}
                    </button>
                </form>
            </div>
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
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="14" width="17.5" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M36.8 192l566.3 0c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0L121.7 0c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224l0 160 0 80c0 26.5 21.5 48 48 48l224 0c26.5 0 48-21.5 48-48l0-80 0-160-64 0 0 160-192 0 0-160-64 0zm448 0l0 256c0 17.7 14.3 32 32 32s32-14.3 32-32l0-256-64 0z"/></svg><!-- Icono de casita -->
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
                <!-- Departamentos -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> <!-- Icono -->
                        <span class="flex-1">Departamentos</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrardepa') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar Departamentos
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Puestos -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <!-- Icono -->
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        <span class="flex-1">Puestos</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrarpuesto') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar Puestos
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Trabajadores -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <!-- Icono -->
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="14" width="17.5" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320l213.3 0c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7l-42.7 0C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2l-103.2 0C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7l300.6 0c-2.1-5.2-3.2-10.9-3.2-16.4l0-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192l-42.7 0c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3l0-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6l0 3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3l-2.9 1.7c-9.2 5.3-20.4 4-29.6-1.3s-16.1-14.5-16.1-25.1l0-3.4c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9l0 3.4c0 10.6-6.9 19.8-16.1 25.1s-20.4 6.6-29.6 1.3l-2.9-1.7c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l2.9 1.7c9.2 5.3 13.7 15.8 13.7 26.4s-4.5 21.1-13.7 26.4l-3 1.7c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3l2.9-1.7c9.2-5.3 20.4-4 29.6 1.3s16.1 14.5 16.1 25.1l0 3.4c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9l0-3.4c0-10.6 6.9-19.8 16.1-25.1s20.4-6.6 29.6-1.3l2.9 1.7c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-3-1.7c-9.2-5.3-13.7-15.8-13.7-26.4s4.5-21.1 13.7-26.4l3-1.7zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z"/></svg>
                        <span class="flex-1">Trabajadores</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrartrabajador') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar Trabajadores
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mostrarcardtrabajador') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Cards Trabajadores
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- instructores -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <!-- Icono -->
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                        <span class="flex-1">Instructores</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrarinstructor') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Mostrar Instructores
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mostrarcardinstructor') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Cards Instructores
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Relaciones -->
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between px-2 py-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-sitemap mr-2"></i> <!-- Icono -->
                        <span class="flex-1">Relaciones</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <ul class="desplegable ml-8 hidden">
                        <li>
                            <a href="{{ route('mostrarempressucursal') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Empresa con Sucursales 
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mostrarsucursaldepa') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Sucursales con Departamentos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mostrardepapuesto') }}" class="p-2 hover:bg-gray-700 flex items-center">
                                <i class="mr-2 text-xs"></i> Departamentos con Puestos
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
