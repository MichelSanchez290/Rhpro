<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organized Layout</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <style>
        :root {
            --light: #ffffff;
            /* Fondo blanco */
            --darker: #f3f4f6;
            /* Gris claro para el fondo oscuro */
        }

        .dark .dark\:text-light {
            color: #1e293b;
            /* Texto oscuro en modo oscuro */
        }

        .dark .dark\:bg-dark {
            background-color: var(--light);
        }

        .dark .dark\:bg-darker {
            background-color: var(--darker);
        }

        .dark .dark\:text-gray-300 {
            color: #4b5563;
            /* Texto gris oscuro */
        }

        .dark .dark\:text-indigo-500 {
            color: #4b5563;
            /* Texto gris oscuro */
        }

        .dark .dark\:text-indigo-100 {
            color: #1e293b;
            /* Texto oscuro */
        }

        .dark .dark\:hover\:text-light:hover {
            color: #1e293b;
            /* Texto oscuro al hacer hover */
        }

        .dark .dark\:border-indigo-800 {
            border-color: #d1d5db;
            /* Borde gris claro */
        }

        .dark .dark\:border-indigo-700 {
            border-color: #d1d5db;
            /* Borde gris claro */
        }

        .dark .dark\:bg-indigo-600 {
            background-color: #f3f4f6;
            /* Fondo gris claro */
        }

        .dark .dark\:hover\:bg-indigo-600:hover {
            background-color: #e5e7eb;
            /* Fondo gris claro al hacer hover */
        }

        .dark .dark\:border-indigo-500 {
            border-color: #d1d5db;
            /* Borde gris claro */
        }

        .hover\:overflow-y-auto:hover {
            overflow-y: auto;
        }

        /* Fondo blanco para el layout en modo oscuro */
        .dark .dark\:bg-gradient-to-r {
            background-image: none;
            background-color: var(--light);
        }

        /* Estilos personalizados para los botones del menú */
        .menu-button {
            background: linear-gradient(to right, #9333ea, #4f46e5);
            /* Degradado de purple-600 a indigo-600 */
            color: white;
            /* Texto blanco */
            border: none;
            transition: background 0.3s ease;
        }

        .menu-button:hover {
            background: linear-gradient(to right, #7e22ce, #4338ca);
            /* Degradado más oscuro al hacer hover */
        }
    </style>
</head>

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark': isDark }" @resize.window="watchScreen()">
        <!-- Fondo con degradado en modo oscuro -->
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-gray-800">
                Loading.....
            </div>

            <!-- Sidebar first column -->
            <!-- Backdrop -->
            <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 z-10 bg-gray-800 lg:hidden"
                style="opacity: 0.5" aria-hidden="true"></div>

            <aside x-show="isSidebarOpen" x-transition:enter="transition-all transform duration-300 ease-in-out"
                x-transition:enter-start="-translate-x-full opacity-0"
                x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transition-all transform duration-300 ease-in-out"
                x-transition:leave-start="translate-x-0 opacity-100"
                x-transition:leave-end="-translate-x-full opacity-0" x-ref="sidebar"
                @keydown.escape="window.innerWidth <= 1024 ? isSidebarOpen = false : ''" tabindex="-1"
                class="fixed inset-y-0 z-10 flex-shrink-0 w-64 bg-white border-r lg:static focus:outline-none">
                <div class="flex flex-col h-full">
                    <!-- Sidebar links -->
                    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Imagen arriba de "Inventario" -->
                        <div class="flex justify-center mb-4">
                            <div class="w-32 h-32 overflow-hidden">
                                <img src="https://scontent.fpbc1-1.fna.fbcdn.net/v/t1.6435-9/124244679_1482274165295614_6537949627170046701_n.png?_nc_cat=100&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeEG534Ps7skCtflT-Hmxsr_ScJFrC86w35JwkWsLzrDfmiA6FuV67meMlKtPi8cboyE9R7BRqXjArsV8FDIfERa&_nc_ohc=MfGzOI1soa0Q7kNvgEaz5ex&_nc_oc=AdhSqPxIDjo2G8KKtXHSMa5pPNoXQAlAFeegtqSzI9pHGWgJsHOm6NcAwprDpqBoXR0c9ZZ3cuoy2CqRc_7XTMLf&_nc_zt=23&_nc_ht=scontent.fpbc1-1.fna&_nc_gid=AsE5ZBomoptp3sPrCtPrcVl&oh=00_AYB59PEVss7hBTz0WJYaQR0KTK1jXsVVdRNZwC3T7H-0yg&oe=67C23A43"
                                    alt="Inventario" class="w-full h-full object-scale-down p-2">
                            </div>
                        </div>

                        <!-- Dashboards links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- Botón del menú con degradado normal y transición al seleccionar -->
                            <a href="#" @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-white transition-colors duration-200 rounded-md bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] hover:from-[#1763A6] hover:to-[#1763A6]"
                                :class="{ 
                                    'from-blue-700 to-sky-500
                                    ': isActive || open }" role="button"
                                aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm"> Inventario </span>
                                <span class="ml-auto" aria-hidden="true">
                                    <!-- Icono de flecha -->
                                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <!-- Submenú -->
                            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostrartipoactivo') }}'">
                                    Activos Existentes
                                </a>
                            </div>
                        </div>

                        <!-- Components links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- Botón del menú con degradado normal y transición al seleccionar -->
                            <a href="#" @click="$event.preventDefault(); open = !open"
                                class="flex items-center p-2 text-white transition-all duration-300 rounded-md bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] hover:from-[#1763A6] hover:to-[#1763A6]"
                                :class="{
                                    'from-blue-700 to-sky-500
                                    ': isActive || open }" role="button"
                                aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm"> Activos </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <!-- Icono de flecha -->
                                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <!-- Submenú -->
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostraracttec') }}'">
                                    Activo de Tecnologias
                                </a>
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostraractof') }}'">
                                    Activo de Oficina
                                </a>
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostraractmob') }}'">
                                    Activo de Mobiliario
                                </a>
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostraractpape') }}'">
                                    Activo de Papeleria
                                </a>
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostraractuni') }}'">
                                    Activo de Uniformes
                                </a>
                                <a href="#" role="menuitem"
                                    class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-gray-900 hover:text-gray-700"
                                    onclick="window.location.href='{{ route('mostraractsou') }}'">
                                    Activo de Souvenirs
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Sidebar footer -->
                    <div class="relative flex items-center justify-center flex-shrink-0 px-2 py-4 space-x-4">
                        <!-- User avatar button -->
                        <div class="" x-data="{ open: false }">
                            <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
                                type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                                class="block transition-opacity duration-200 rounded-full bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] hover:bg-[#1763A6] focus:outline-none focus:ring focus:ring-[#1EA4D9]">
                                <span class="sr-only">User menu</span>
                                <img class="w-12 h-12 rounded-full border-2 border-white"
                                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                    alt="Ahmed Kamel" />
                            </button>

                            <!-- User dropdown menu -->
                            <div x-show="open" x-ref="userMenu"
                                x-transition:enter="transition-all transform ease-out"
                                x-transition:enter-start="-translate-y-1/2 opacity-0"
                                x-transition:enter-end="translate-y-0 opacity-100"
                                x-transition:leave="transition-all transform ease-in"
                                x-transition:leave-start="translate-y-0 opacity-100"
                                x-transition:leave-end="-translate-y-1/2 opacity-0" @click.away="open = false"
                                @keydown.escape="open = false"
                                class="absolute max-w-xs py-1 bg-white rounded-md shadow-lg min-w-max left-5 right-5 bottom-full ring-1 ring-black ring-opacity-5 focus:outline-none"
                                tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                                <a href="#" role="menuitem"
                                    onclick="Livewire.dispatch('openModal', { component: 'card' })"
                                    class="block px-4 py-2 text-sm hover:bg-[#1EA4D9]  text-gray-900 hover:text-white">
                                    Tu perfil
                                </a>
                                <a href="#" role="menuitem"
                                    class="block px-4 py-2 text-sm hover:bg-[#1EA4D9]  text-gray-900 hover:text-white">
                                    Configuraciones
                                </a>
                                <a href="#" role="menuitem"
                                    class="block px-4 py-2 text-sm hover:bg-[#1EA4D9]  text-gray-900 hover:text-white">
                                    Cerrar Sesion
                                </a>
                            </div>
                        </div>

                        <!-- Settings button -->
                        <button @click="openSettingsPanel"
                            class="p-2 text-white transition-all duration-300 rounded-full bg-gradient-to-r from-[#1763A6] to-[#1EA4D9] hover:from-[#1763A6] hover:to-[#1763A6] focus:outline-none focus:ring-[#1EA4D9]">
                            <span class="sr-only">Open settings panel</span>
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </aside>
            <!-- Main content -->
            <div class="flex-1 max-w-full w-full overflow-hidden">
                <div class="w-full p-4">
                    {{ $slot }}
                </div>
            </div>
               
        </div>
    </div>
    @stack('modals')
    @stack('js')
    @livewireScripts
    @livewire('wire-elements-modal')
</body>
{{-- <footer class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img src="https://scontent.fpbc1-1.fna.fbcdn.net/v/t1.6435-9/124244679_1482274165295614_6537949627170046701_n.png?_nc_cat=100&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeEG534Ps7skCtflT-Hmxsr_ScJFrC86w35JwkWsLzrDfmiA6FuV67meMlKtPi8cboyE9R7BRqXjArsV8FDIfERa&_nc_ohc=MfGzOI1soa0Q7kNvgEaz5ex&_nc_oc=AdhSqPxIDjo2G8KKtXHSMa5pPNoXQAlAFeegtqSzI9pHGWgJsHOm6NcAwprDpqBoXR0c9ZZ3cuoy2CqRc_7XTMLf&_nc_zt=23&_nc_ht=scontent.fpbc1-1.fna&_nc_gid=AsE5ZBomoptp3sPrCtPrcVl&oh=00_AYB59PEVss7hBTz0WJYaQR0KTK1jXsVVdRNZwC3T7H-0yg&oe=67C23A43"
        alt="Inventario" class="w-20 h-20 object-scale-down">
      </a>
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2025 CESRH
        <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@knyttneve</a>
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <a class="text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
    </div>
  </footer> --}}
<script>
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }

        return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
            setLightTheme() {
                this.isDark = false
                setTheme(this.isDark)
            },
            setDarkTheme() {
                this.isDark = true
                setTheme(this.isDark)
            },
            watchScreen() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false
                    this.isSecondSidebarOpen = false
                } else if (window.innerWidth >= 1024) {
                    this.isSidebarOpen = true
                    this.isSecondSidebarOpen = true
                }
            },
            isSidebarOpen: window.innerWidth >= 1024 ? true : false,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSecondSidebarOpen: window.innerWidth >= 1024 ? true : false,
            toggleSecondSidbarColumn() {
                this.isSecondSidebarOpen = !this.isSecondSidebarOpen
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
                this.isSettingsPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.settingsPanel.focus()
                })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
                this.isSearchPanelOpen = true
                this.$nextTick(() => {
                    this.$refs.searchInput.focus()
                })
            },
        }
    }
</script>

</html>
