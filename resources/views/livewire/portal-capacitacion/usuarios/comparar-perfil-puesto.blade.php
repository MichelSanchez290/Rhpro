<div class="bg-gradient-to-br from-[#F9F5F3] via-[#F9F5F3] to-[#EAE7E5] p-6">

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-blue-900 sm:text-4xl">Comparar Perfiles de Puestos</h2>
    </div>

    <div class="mb-6">
        <label for="puesto" class="block text-lg font-semibold text-gray-700 mb-2">Selecciona un puesto:</label>
        <select wire:model.live="perfil"
            class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 bg-white shadow-md">
            <option value="">Elige un puesto...</option>
            @foreach ($puestos as $puesto)
                <option value="{{ $puesto->id }}">{{ $puesto->nombre_puesto }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-col md:flex-row min-h-screen">

        <div class="w-full md:w-1/2 p-4 flex flex-col">
            <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                <h2 class="text-3xl font-bold text-center text-indigo-700">{{ $detallePuesto->nombre_puesto ?? '---' }}
                </h2>
                <p class="text-gray-600 mt-2"><strong class="text-black">Area:</strong> {{ $detallePuesto->area ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Proceso:</strong> {{ $detallePuesto->proceso ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Misión:</strong> {{ $detallePuesto->mision ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Funciones Específicas</h3>
                
                    @forelse($detallePuesto->funcionesEspecificas ?? [] as $funcion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Nombre:</strong>{{ $funcion->nombre }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay funciones registrada</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-black">Puesto reporta:</strong> {{ $detallePuesto->puesto_reporta ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Puestos que le reportan:</strong> {{ $detallePuesto->puestos_que_le_reportan ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Suplencia</strong> {{ $detallePuesto->suplencia ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Internas</h3>
                
                    @forelse($detallePuesto->relacionesInternas ?? [] as $relacion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Puesto:</strong> {{ $relacion->puesto }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo:</strong> {{ $relacion->razon_motivo }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Frecuencia:</strong> {{ $relacion->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones internas registradas</div>
                    @endforelse
                </div>
                

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Externas</h3>
                
                    @forelse($detallePuesto->relacionesExternas ?? [] as $relacion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Nombre:</strong> {{ $relacion->nombre }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo:</strong> {{ $relacion->razon_motivo }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Frecuencia:</strong> {{ $relacion->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas registradas</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-black">Rango toma decisiones: </strong> {{ $detallePuesto->rango_toma_desicones ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Decisiones directas:</strong> {{ $detallePuesto->desiciones_directas ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Responsabilidades Universales</h3>
                
                    @forelse($detallePuesto->responsabilidadesUniversales ?? [] as $resp)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Sistema:</strong> {{ $resp->sistema }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Responsabilidad:</strong> {{ $resp->responsalidad }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay responsabilidades universales registradas</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-black">Rango edad deseable:</strong> {{ $detallePuesto->rango_edad_desable ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Sexo preferente:</strong> {{ $detallePuesto->sexo_preferente ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Estado civil deseable:</strong> {{ $detallePuesto->estado_civil_deseable ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Escolaridad:</strong> {{ $detallePuesto->escolaridad ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Idioma requerido:</strong> {{ $detallePuesto->idioma_requerido ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Experiencia requerida:</strong> {{ $detallePuesto->experiencia_requerida ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Nivel riesgis físico:</strong> {{ $detallePuesto->nivel_riesgo_fisico ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Habilidades Humanas</h3>
                
                    @forelse($detallePuesto->habilidadesHumanas?? [] as $habilidad)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Descripcion:</strong> {{ $habilidad->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel:</strong> {{ $habilidad->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay habilidades humanas registradas</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Habilidades Técnicas</h3>
                
                    @forelse($detallePuesto->habilidadesTecnicas?? [] as $habilidad)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Descripcion:</strong> {{ $habilidad->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel:</strong> {{ $habilidad->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay habilidades técnicas registradas</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-black">Elaboro nombre:</strong> {{$detallePuesto->elaboro_nombre ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Elaboro puesto:</strong> {{$detallePuesto->elaboro_puesto ?? '---' }}</p>
                    
                <p class="text-gray-600"><strong class="text-black">Reviso nombre:</strong> {{$detallePuesto->reviso_nombre ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Reviso puesto:</strong> {{$detallePuesto->reviso_puesto ?? '---' }}</p>
                
                <p class="text-gray-600"><strong class="text-black">Autorizo nombre:</strong> {{$detallePuesto->autorizo_nombre ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-black">Autorizo puesto:</strong> {{$detallePuesto->autorizo_puesto ?? '---' }}</p>

                <p class="text-gray-600 mt-4"><strong class="text-black">Estatus:</strong> {{ $detallePuesto->status ?? '---' }}</p>
            </div>
        </div>


        <div class="w-full md:w-1/2 p-4 flex flex-col">

            <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                <h2 class="text-3xl font-bold text-center text-indigo-700">Nombre del puesto: </h2>
                <p class="text-gray-600 mt-2">Área:</p>
                <p class="text-gray-600">Proceso:</p>
                <p class="text-gray-600">Misión:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Funciones Específicas</h3>
                </div>

                <p class="text-gray-600">Puesto Reporta:</p>
                <p class="text-gray-600">Puestos que le reportan:</p>
                <p class="text-gray-600">Suplencia:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Relaciones Internas</h3>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Relaciones Externas</h3>
                </div>

                <p class="text-gray-600">Rango toma de decisiones:</p>
                <p class="text-gray-600">Decisiones directas:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Responsabilidades Universales</h3>
                </div>

                <p class="text-gray-600">Rango edad deseable:</p>
                <p class="text-gray-600">Sexo preferente:</p>
                <p class="text-gray-600">Estado civil deseable:</p>
                <p class="text-gray-600">Escolaridad:</p>
                <p class="text-gray-600">Idioma requerido:</p>
                <p class="text-gray-600">Experiencia Requerida:</p>
                <p class="text-gray-600">Nivel riesgo físico:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Técnica</h3>
                </div>

                <p class="text-gray-600">Elaboro Nombre:</p>
                <p class="text-gray-600">Elaboro Puesto:</p>
                    
                <p class="text-gray-600">Reviso Nombre:</p>
                <p class="text-gray-600">Reviso Puesto:</p>
                    
                <p class="text-gray-600">Autorizo Nombre:</p>
                <p class="text-gray-600">Autorizo Puesto:</p>

                <p class="text-gray-600 mt-4">Estado:</p>
            </div>
        </div>
    </div>

    <div class="mt-10 bg-blue-100 text-center py-8 px-6 rounded-lg shadow-lg w-full max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900">Conclusión Generada</h2>
        <p class="text-gray-700 mt-4 text-lg">
            {{ $conclusion ?? 'Aún no hay una conclusión generada por el sistema.' }}
        </p>

        <button class="mt-6 px-5 py-2 bg-blue-900 text-white text-sm rounded-lg hover:bg-blue-700 transition">
            Regenerar Conclusión
        </button>
    </div>

    <div class="flex justify-center gap-4 mt-6">
        <button class="px-6 py-2 text-white bg-red-600 rounded-lg shadow-md hover:bg-red-700 transition">
            Salir
        </button>

        <button class="px-6 py-2 text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700 transition">
            Asignar Capacitación
        </button>
    </div>

</div>