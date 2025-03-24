<div>
    <div class="flex min-h-screen items-start justify-center pt-6">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path fill="#ffffff"
                            d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar Incidencia</h1>
                </div>
            </div>

            <div class="relative mb-4">
                <div class="flex items-center justify-between">
                    @if (session()->has('message'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => {
                            show = false;
                            window.location.href = '{{ route('mostrarincidencia') }}'
                        }, 4000)" x-show="show"
                            class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path fill="#ffffff"
                                    d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-bold">{{ session('message') }}</p>
                                @if (session('message') == 'Incidencia actualizada exitosamente.')
                                    <p class="text-sm">Incidencia actualizada exitosamente.</p>
                                @endif
                            </div>
                            <button @click="show = false" class="text-white hover:text-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    @endif

                </div>
            </div>

            <form class="mt-5 mx-7">
                <div class="grid grid-cols-1 mt-5">
                    <label for="nombre_usuario" class="uppercase md:text-sm text-xs text-gray-500 font-semibold">
                        Usuario
                    </label>
                    <input type="text" id="nombre_usuario" value="{{ $nombre_usuario }}" disabled
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none" />
                </div>
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="tipo_incidencia"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Tipo de Incidencia
                    </label>
                    <select wire:model.defer="tipo_incidencia" id="tipo_incidencia"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="" selected>-- Selecciona una opción --</option>

                        <option value="Falta injustificada">
                            Falta injustificada
                        </option>
                        <option value="Salida anticipada sin permiso">
                            Salida anticipada sin permiso
                        </option>
                        <option value="Olvido de marcar entrada/salida">
                            Olvido de marcar entrada/salida
                        </option>
                        <option value="Intento de marcar asistencia por otro trabajador">
                            Intento de marcar asistencia por otro trabajador
                        </option>
                        <option value="Bajo rendimiento laboral">
                            Bajo rendimiento laboral
                        </option>
                        <option value="Incumplimiento de metas u objetivos">
                            Incumplimiento de metas u objetivos
                        </option>
                        <option value="Errores recurrentes en tareas asignadas">
                            Errores recurrentes en tareas asignadas
                        </option>
                        <option value="Retrasos constantes en la entrega de trabajos">
                            Retrasos constantes en la entrega de trabajos
                        </option>
                        <option value="Falsificación de justificantes médicos">
                            Falsificación de justificantes médicos
                        </option>
                        <option value="Enfermedad contagiosa sin aviso previo">
                            Enfermedad contagiosa sin aviso previo
                        </option>
                        <option value="Uso inadecuado de recursos o herramientas de la empresa">
                            Uso inadecuado de recursos o herramientas de la empresa
                        </option>
                        <option value="Desobediencia a instrucciones superiores">
                            Desobediencia a instrucciones superiores
                        </option>
                        <option value="Falta de respeto a compañeros o superiores">
                            Falta de respeto a compañeros o superiores
                        </option>
                        <option value="Uso indebido del tiempo laboral (uso de redes sociales, celular, etc.)">
                            Uso indebido del tiempo laboral (uso de redes sociales, celular, etc.)
                        </option>
                        <option value="Realización de actividades personales en horario laboral">
                            Realización de actividades personales en horario laboral
                        </option>
                        <option value="Uso de lenguaje ofensivo o agresivo">
                            Uso de lenguaje ofensivo o agresivo
                        </option>
                        <option value="Divulgación de información confidencial">
                            Divulgación de información confidencial
                        </option>
                        <option value="Hurto o robo dentro de la empresa">
                            Hurto o robo dentro de la empresa
                        </option>
                        <option value="Fraude o alteración de documentos">
                            Fraude o alteración de documentos
                        </option>
                        <option value="Violencia física o amenazas en el trabajo">
                            Violencia física o amenazas en el trabajo
                        </option>
                        <option value="Consumo de alcohol o drogas en horario laboral">
                            Consumo de alcohol o drogas en horario laboral
                        </option>
                        <option value="Acoso sexual o discriminación">
                            Acoso sexual o discriminación
                        </option>
                        <option value="Uso indebido de credenciales o accesos restringidos">
                            Uso indebido de credenciales o accesos restringidos
                        </option>
                    </select>

                    <x-input-error for="tipo_incidencia" />
                </div>

                
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1 mt-5">
                        <label for="fecha_inicio"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha Inicio
                        </label>
                        <input wire:model.defer="fecha_inicio" type="date" id="fecha_inicio"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />


                        <x-input-error for="incidencia.fecha_inicio" />
                    </div>

                    <div class="grid grid-cols-1 mt-5">
                        <label for="fecha_final"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha Final
                        </label>
                        <input wire:model.defer="fecha_final" type="date" id="fecha_final"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />


                        <x-input-error for="incidencia.fecha_final" />
                    </div>
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="button" wire:click="actualizarIncidencia"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Actualizar
                    </button>

                    <button type="button" onclick="window.history.back()"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
