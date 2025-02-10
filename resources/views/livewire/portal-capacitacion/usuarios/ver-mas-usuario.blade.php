<div class="h-full bg-gray-200 p-8">
    <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>

            <div class="flex flex-col items-center -mt-20">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile.jpg" class="w-40 border-4 border-white rounded-full">
                    <div class="flex items-center space-x-2 mt-2">
                        <p class="text-2xl">Nombre: {{ $userSeleccionado->name }}</p>
                        <span class="bg-blue-500 rounded-full p-1" title="Verified">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-gray-700">Puesto: {{ $userSeleccionado->perfilActual()?->nombre_puesto ?? 'Sin asignar' }}</p>

                    <p class="text-sm text-gray-500">Correo electronico: {{ $userSeleccionado->email }}</p>
            </div>
            <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                    <button wire:click="comparar()" class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                        </svg>                          
                        <span>Comparar</span>
                    </button>

                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>                          
                        <span>Evaluar</span>
                    </button>
            </div>
            </div>
    </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-3xl font-bold text-center text-indigo-700">{{ $perfilactual->nombre_puesto ?? 'Sin asignar' }}</h2>
                <p class="text-gray-600 mt-2">Área: {{ $perfilactual?->area ?? 'No definido' }}</p>
                <p class="text-gray-600">Proceso: {{ $perfilactual?->proceso ?? 'No definido' }}</p>
                <p class="text-gray-600">Misión: {{ $perfilactual?->mision ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Funciones Específicas</h3>
                    @forelse($funcionesEspecificas as $funcion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Nombre:</strong>{{ $funcion->nombre }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay funciones asignadas</div>
                    @endforelse
                </div>

                <p class="text-gray-600">Puesto Reporta: {{ $perfilactual?->puesto_reporta ?? 'No definido' }}</p>
                <p class="text-gray-600">Puestos que le reportan: {{ $perfilactual?->puestos_que_le_reportan ?? 'No definido' }}</p>
                <p class="text-gray-600">Suplencia: {{ $perfilactual?->suplencia ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Internas</h3>
                    @forelse($relacionesInternas as $interna)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Puesto:</strong>{{ $interna->puesto }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo: </strong>{{ $interna->razon_motivo }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Frecuencia:</strong>{{ $interna->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones internas asignadas</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Externas</h3>
                    @forelse($relacionesExternas as $interna)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Nombre:</strong>{{ $interna->nombre }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo: </strong>{{ $interna->razon_motivo }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Frecuencia:</strong>{{ $interna->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <p class="text-gray-600">Rango toma de decisiones: {{ $perfilactual?->rango_decisiones ?? 'No definido' }}</p>
                <p class="text-gray-600">Decisiones directas: {{ $perfilactual?->decisiones_directas ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Responsabilidades Universales</h3>
                    @forelse($responsabilidadesUniversales as $universal)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Sistema:</strong>{{ $universal->sistema }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Responsabilidad: </strong>{{ $universal->responsalidad }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <p class="text-gray-600">Edad deseable: {{ $perfilactual?->edad_deseable ?? 'No definido' }}</p>
                <p class="text-gray-600">Sexo preferente: {{ $perfilactual?->sexo_preferente ?? 'No definido' }}</p>
                <p class="text-gray-600">Estado civil deseable: {{ $perfilactual?->estado_civil ?? 'No definido' }}</p>
                <p class="text-gray-600">Escolaridad: {{ $perfilactual?->escolaridad ?? 'No definido' }}</p>
                <p class="text-gray-600">Idioma requerido: {{ $perfilactual?->idioma ?? 'No definido' }}</p>
                <p class="text-gray-600">Experiencia Requerida: {{ $perfilactual?->experiencia ?? 'No definido' }}</p>
                <p class="text-gray-600">Nivel riesgo físico: {{ $perfilactual?->nivel_riesgo ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Formación y Habilidades Humanas</h3>
                    @forelse($habilidadesHumanas as $humana)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Descripción:</strong>{{ $humana->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel: </strong>{{ $humana->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Formación y Habilidades Técnicas</h3>
                    @forelse($habilidadesTecnicas as $tecnica)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Descripción:</strong>{{ $tecnica->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel: </strong>{{ $tecnica->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
                <p class="text-gray-600">Elaboró: {{ $perfilactual?->elaboro_nombre ?? 'No definido' }} - {{ $perfilactual?->elaboro_puesto ?? 'No definido' }}</p>
                <p class="text-gray-600">Revisó: {{ $perfilactual?->reviso_nombre ?? 'No definido' }} - {{ $perfilactual?->reviso_puesto ?? 'No definido' }}</p>
                <p class="text-gray-600">Autorizó: {{ $perfilactual?->autorizo_nombre ?? 'No definido' }} - {{ $perfilactual?->autorizo_puesto ?? 'No definido' }}</p>

                <p class="text-gray-600">Estado: {{ $perfilactual?->status ?? 'No definido' }}</p>

            </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
            <h4 class="text-xl text-gray-900 font-bold">Registros Patronales</h4>       
        </div>
    </div>

            <div class="flex flex-col w-full 2xl:w-2/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Departamentos</h4>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="flex items-center justify-between">
                <h4 class="text-xl text-gray-900 font-bold">Sucursales</h4>
            </div>
        </div>
</div>
