<div class="min-h-screen flex justify-center items-start p-4">
    <!-- Contenido principal -->
    <div class="bg-white shadow-xl rounded-lg p-6 w-full max-w-6xl">

        <!-- Sección de Bienvenida con animación -->
        <div class="text-center mb-12 relative overflow-hidden">
            <!-- Fondo animado -->
            <div class="absolute inset-0 z-0 flex justify-center items-center opacity-10">
                <!-- <div class="animate-spin-slow">
                    <svg class="w-64 h-64 text-blue-300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M45,-74.3C58.2,-69.2,68.8,-57.3,75.7,-43.4C82.6,-29.5,85.7,-13.7,85.5,0.1C85.3,13.9,81.8,27.8,73.1,39.4C64.4,51,50.5,60.3,35.7,68.9C20.9,77.5,5.4,85.4,-9.1,83.5C-23.6,81.6,-46.2,69.9,-60.5,53.6C-74.8,37.3,-80.8,16.6,-79.9,-2.5C-79,-21.6,-71.2,-43.2,-57.4,-57.8C-43.6,-72.4,-23.8,-80,-6.9,-75.5C10,-71,20,-54.4,45,-74.3Z" transform="translate(100 100)" />
                    </svg>
                </div> -->
            </div>

            <!-- Contenido de bienvenida -->
            <div class="relative z-10">
                <h1 class="text-4xl font-bold text-blue-600 mb-4 animate-fade-in">
                    Sistema Profesional de Evaluación 360°
                </h1>

                <!-- Imagen animada -->
                <!-- <div class="flex justify-center mb-6">
                    <img src="https://www.kimche.co/wp-content/uploads/2022/06/giphy.gif"
                        alt="Encuesta 360 animación"
                        class="w-48 h-48 object-contain rounded-lg shadow-md animate-bounce-slow">
                </div>

                <p class="text-xl text-gray-700 mb-4">
                    <span class="font-semibold text-blue-500">CESRH Consulting</span> - Herramienta de evaluación integral
                </p>

                <div class="max-w-2xl mx-auto bg-blue-50 p-4 rounded-lg border border-blue-100 animate-pulse-slow">
                    <p class="text-gray-800">
                        Desde este panel podrás gestionar usuarios, asignar encuestas, supervisar evaluaciones
                        y analizar resultados para potenciar el desarrollo organizacional.
                    </p>
                </div> -->
            </div>
        </div>

        <!-- Línea divisoria decorativa -->
        <div class="relative mb-8">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-4 bg-white text-gray-500 text-sm">
                    Acciones disponibles
                </span>
            </div>
        </div>

        <!-- Opciones para Administradores -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @can('Mostrar Relaciones Laborales ADMIN')
            <a href="{{ route('portal360.relaciones.relaciones-administrador.mostrar-relacion-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-blue-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-teal-100 rounded-full group-hover:bg-teal-200 transition-colors">
                    <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-blue-600">Relaciones Laborales</h3>
                    <p class="text-sm text-gray-500">Gestión de colaboradores</p>
                </div>
            </a>
            @endcan

            @can('Mostrar Empresa ADMIN')
            <a href="{{ route('portal360.empresa.empresa-administrador.mostrar-empresa-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-purple-100 rounded-full group-hover:bg-purple-200 transition-colors">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a2 2 0 012-2h2a2 2 0 012 2v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-purple-600">Empresa</h3>
                    <p class="text-sm text-gray-500">Datos organizacionales</p>
                </div>
            </a>
            @endcan

            @can('Mostrar Preguntas ADMIN')
            <a href="{{ route('portal360.preguntas.preguntas-administrador.mostrar-preguntas-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-red-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-red-100 rounded-full group-hover:bg-red-200 transition-colors">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-red-600">Preguntas</h3>
                    <p class="text-sm text-gray-500"> Gestión preguntas</p>
                </div>
            </a>
            @endcan

            @can('Mostrar Encuesta ADMIN')
            <a href="{{ route('portal360.encuesta.encuesta-administrador.mostrar-encuesta-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-indigo-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-indigo-100 rounded-full group-hover:bg-indigo-200 transition-colors">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-indigo-600">Encuesta</h3>
                    <p class="text-sm text-gray-500">Datos de Encuesta</p>
                </div>
            </a>
            @endcan

            @can('Mostrar Asignaciones ADMIN')
            <a href="{{ route('portal360.asignaciones.asignaciones-administrador.mostrar-asignaciones-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-blue-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-blue-100 rounded-full group-hover:bg-blue-200 transition-colors">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-3-6v6m-6 0h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-blue-600">Asignaciones</h3>
                    <p class="text-sm text-gray-500">Integracion de Asignaciones</p>
                </div>
            </a>
            @endcan

            @can('Mostrar Encpre ADMIN')
            <a href="{{ route('portal360.encpre.encuesta-pregunta-encpre-administrador.mostrar-encuesta-pregunta-encpre-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-orange-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-orange-100 rounded-full group-hover:bg-orange-200 transition-colors">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-orange-600">Preguntas y Encuestas</h3>
                    <p class="text-sm text-gray-500">Gestión de Preguntas y Encuestas</p>
                </div>
            </a>
            @endcan

            <a href="{{ route('portal360.resultados.administrador-resultados.mostrar-empresa-administrador-resultadosvs') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-green-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-green-100 rounded-full group-hover:bg-green-200 transition-colors">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 6 9 17l-5-5"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-green-600">Resultados</h3>
                    <p class="text-sm text-gray-500">Análisis de Resultados</p>
                </div>
            </a>

            <a href="{{ route('portal360.compromiso.compromiso-administrador.mostrar-compromiso-administrador') }}"
                class="group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-teal-300 flex items-center space-x-4 transform hover:-translate-y-1">
                <div class="p-3 bg-teal-100 rounded-full group-hover:bg-teal-200 transition-colors">
                    <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11 17 2 2a1 1 0 1 0 3-3"></path>
                        <path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"></path>
                        <path d="m21 3 1 11h-2"></path>
                        <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"></path>
                        <path d="M3 4h8"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 group-hover:text-teal-600">Compromisos</h3>
                    <p class="text-sm text-gray-500">Plan de Compromisos</p>
                </div>
            </a>
        </div>

        <!-- Contacto -->
        <div class="mt-12 text-center">
            <p class="text-sm text-gray-500">
                ¿Necesitas ayuda? Contáctanos en
                <a href="mailto:soporte@cesrh.com" class="text-blue-600 hover:underline font-medium">soporte@cesrh.com</a>
            </p>
        </div>
    </div>
</div>
