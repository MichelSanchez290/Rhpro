<x-app-layout>
    <div x-data="{ open: false }" class="flex h-screen gradient text-white">
        <!-- Botón de menú móvil -->
        <div class="pt-12">
            <button @click="open = !open" class="absolute left-4 z-50 p-2 bg-blue-900 rounded-md lg:hidden">
                <i class="fas fa-bars text-white text-2xl"></i>
            </button>
        </div>

        <!-- Sidebar -->
        <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 w-64 bg-gray-800 p-6 space-y-6 pt-24 transform transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0">
            <button @click="open = false" class="absolute top-4 right-4 lg:hidden text-white">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="flex items-center space-x-4">
                <img class="w-12 h-12 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="" />
                <div>
                    <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-400">{{ Auth::user()->getRoleNames()->first() }}</p>
                </div>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-700">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </a>
                <a href="{{ route('analitycs') }}" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-700">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </a>
                <a href="{{ route('profile.show') }}"
                    class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-700">
                    <i class="fas fa-cog"></i>
                    <span>Perfil</span>
                </a>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-6 overflow-auto pt-24">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <a href="{{ route('inicio') }}">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center">Módulo Recursos Humanos</h2>
                        <div class="h-40 bg-gray-700 rounded flex justify-center items-center">
                            <img class="h-32 w-32" src="{{ asset('images/rh.png') }}" alt="RH" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('inicio-activo') }}">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center">Módulo Activo Fijo</h2>
                        <div class="h-40 bg-gray-700 rounded flex justify-center items-center">
                            <img class="h-32 w-32" src="{{ asset('images/activofijo.png') }}" alt="Activo Fijo" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('inicio-capacitacion') }}">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center">Módulo Portal Capacitación</h2>
                        <div class="h-40 bg-gray-700 rounded flex justify-center items-center">
                            <img class="h-32 w-32" src="{{ asset('images/capacitacion.png') }}" alt="Capacitación" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('encuesta.index') }}">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center">Módulo Dx035</h2>
                        <div class="h-40 bg-gray-700 rounded flex justify-center items-center">
                            <img class="h-32 w-32" src="{{ asset('images/dx035.png') }}" alt="Dx035" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('portal360.inicio') }}">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center">Módulo Encuesta 360</h2>
                        <div class="h-40 bg-gray-700 rounded flex justify-center items-center">
                            <img class="h-32 w-32" src="{{ asset('images/360.png') }}" alt="Encuesta 360" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('InicioCrm') }}">
                    <div class="bg-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4 text-center">Módulo CRM</h2>
                        <div class="h-40 bg-gray-700 rounded flex justify-center items-center">
                            <img class="h-32 w-32" src="{{ asset('images/crm.png') }}" alt="CRM" />
                        </div>
                    </div>
                </a>
            </div>
        </main>
    </div>
</x-app-layout>
