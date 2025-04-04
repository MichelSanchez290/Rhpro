<div class="bg-gradient-to-br bg-gray-100 shadow-lg rounded-lg p-6 border border-gray-200">

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
                <h2 class="text-3xl font-bold text-center text-indigo-700">
                    {{ $perfilactual->nombre_puesto ?? 'Sin asignar' }}</h2>
                <p class="text-gray-600 mt-2"><strong class="text-gray-600">Area:</strong>
                    {{ $perfilactual?->area ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Proceso:</strong>
                    {{ $perfilactual?->proceso ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Misión:</strong>
                    {{ $perfilactual?->mision ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Funciones Específicas</h3>
                    @forelse($funcionesEspecificas as $funcion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Nombre:</strong>
                                {{ $funcion->nombre }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay funciones específicas registradas</div>
                    @endforelse
                </div>

                <p class="text-gray-600"><strong class="text-gray-600">Puesto Reporta:</strong>
                    {{ $perfilactual?->puesto_reporta ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Puestos que le reportan: </strong>
                    {{ $perfilactual?->puestos_que_le_reportan ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Suplencia: </strong>
                    {{ $perfilactual?->suplencia ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Internas</h3>
                    @forelse($relacionesInternas as $interna)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Puesto:</strong>{{ $interna->puesto }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo:
                                </strong>{{ $interna->razon_motivo }}</p>
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Frecuencia:</strong>{{ $interna->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones internas registradas</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Externas</h3>
                    @forelse($relacionesExternas as $interna)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Nombre:</strong>{{ $interna->nombre }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo:
                                </strong>{{ $interna->razon_motivo }}</p>
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Frecuencia:</strong>{{ $interna->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas registradas</div>
                    @endforelse
                </div>


                <p class="text-gray-600"><strong class="text-gray-600">Rango toma de decisiones:</strong>
                    {{ $perfilactual?->rango_toma_desicones ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Decisiones directas:</strong>
                    {{ $perfilactual?->desiciones_directas ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Responsabilidades Universales</h3>
                    @forelse($responsabilidadesUniversales as $universal)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Sistema:</strong>{{ $universal->sistema }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Responsabilidad:
                                </strong>{{ $universal->responsalidad }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <p class="text-gray-600"><strong class="text-gray-600">Edad deseable:</strong>
                    {{ $perfilactual?->rango_edad_desable ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Sexo preferente:</strong>
                    {{ $perfilactual?->sexo_preferente ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Estado civil deseable:</strong>
                    {{ $perfilactual?->estado_civil_deseable ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Escolaridad:</strong>
                    {{ $perfilactual?->escolaridad ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Idioma requerido:</strong>
                    {{ $perfilactual?->idioma_requerido ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Experiencia Requerida:</strong>
                    {{ $perfilactual?->experiencia_requerida ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Nivel riesgo físico:</strong>
                    {{ $perfilactual?->nivel_riesgo_fisico ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Formación y Habilidades Humanas</h3>
                    @forelse($habilidadesHumanas as $humana)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Descripción:</strong>{{ $humana->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel:
                                </strong>{{ $humana->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Formación y Habilidades Técnicas</h3>
                    @forelse($habilidadesTecnicas as $tecnica)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Descripción:</strong>{{ $tecnica->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel:
                                </strong>{{ $tecnica->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
                    @endforelse
                </div>

                <div class="mt-4 bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="grid gap-2">
                        <!-- Elaboró -->
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                            <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wider">Elaboró</h3>
                            <div class="mt-2">
                                <p class="text-lg font-medium text-gray-800">
                                    {{ $perfilactual?->elaboro_nombre ?? 'No definido' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $perfilactual?->elaboro_puesto ?? 'No definido' }}
                                </p>
                            </div>
                        </div>

                        <!-- Revisó -->
                        <div class="bg-purple-50 p-4 rounded-lg border-l-4 border-purple-400">
                            <h3 class="text-sm font-semibold text-purple-700 uppercase tracking-wider">Revisó</h3>
                            <div class="mt-2">
                                <p class="text-lg font-medium text-gray-800">
                                    {{ $perfilactual?->reviso_nombre ?? 'No definido' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $perfilactual?->reviso_puesto ?? 'No definido' }}
                                </p>
                            </div>
                        </div>

                        <!-- Autorizó -->
                        <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                            <h3 class="text-sm font-semibold text-green-700 uppercase tracking-wider">Autorizó</h3>
                            <div class="mt-2">
                                <p class="text-lg font-medium text-gray-800">
                                    {{ $perfilactual?->autorizo_nombre ?? 'No definido' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $perfilactual?->autorizo_puesto ?? 'No definido' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="mt-6 flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg">
                        <span class="text-sm font-medium text-gray-600">Estado del perfil:</span>
                        @php
                            $statusColor = match ($perfilactual?->status) {
                                'Aprobado' => 'bg-green-100 text-green-800',
                                'Rechazado' => 'bg-red-100 text-red-800',
                                'Pendiente' => 'bg-yellow-100 text-yellow-800',
                                default => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColor }}">
                            {{ $perfilactual?->status ?? 'No definido' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full md:w-1/2 p-4 flex flex-col">

            <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                <h2 class="text-3xl font-bold text-center text-indigo-700">
                    {{ $detallePuesto->nombre_puesto ?? '---' }}
                </h2>
                <p class="text-gray-600 mt-2"><strong class="text-gray-600">Area:</strong>
                    {{ $detallePuesto->area ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Proceso:</strong>
                    {{ $detallePuesto->proceso ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Misión:</strong>
                    {{ $detallePuesto->mision ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Funciones Específicas</h3>

                    @forelse($detallePuesto->funcionesEspecificas ?? [] as $funcion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Nombre:</strong>{{ $funcion->nombre }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay funciones registrada</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-gray-600">Puesto reporta:</strong>
                    {{ $detallePuesto->puesto_reporta ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Puestos que le reportan:</strong>
                    {{ $detallePuesto->puestos_que_le_reportan ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Suplencia</strong>
                    {{ $detallePuesto->suplencia ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Internas</h3>

                    @forelse($detallePuesto->relacionesInternas ?? [] as $relacion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Puesto:</strong>
                                {{ $relacion->puesto }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo:</strong>
                                {{ $relacion->razon_motivo }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Frecuencia:</strong>
                                {{ $relacion->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones internas registradas</div>
                    @endforelse
                </div>


                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Relaciones Externas</h3>

                    @forelse($detallePuesto->relacionesExternas ?? [] as $relacion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Nombre:</strong>
                                {{ $relacion->nombre }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Razón o motivo:</strong>
                                {{ $relacion->razon_motivo }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Frecuencia:</strong>
                                {{ $relacion->frecuencia }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay relaciones externas registradas</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-gray-600">Rango toma decisiones: </strong>
                    {{ $detallePuesto->rango_toma_desicones ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Decisiones directas:</strong>
                    {{ $detallePuesto->desiciones_directas ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Responsabilidades Universales</h3>

                    @forelse($detallePuesto->responsabilidadesUniversales ?? [] as $resp)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Sistema:</strong>
                                {{ $resp->sistema }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Responsabilidad:</strong>
                                {{ $resp->responsalidad }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay responsabilidades universales registradas</div>
                    @endforelse
                </div>

                <p class="text-gray-600 mt-4"><strong class="text-gray-600">Rango edad deseable:</strong>
                    {{ $detallePuesto->rango_edad_desable ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Sexo preferente:</strong>
                    {{ $detallePuesto->sexo_preferente ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Estado civil deseable:</strong>
                    {{ $detallePuesto->estado_civil_deseable ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Escolaridad:</strong>
                    {{ $detallePuesto->escolaridad ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Idioma requerido:</strong>
                    {{ $detallePuesto->idioma_requerido ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Experiencia requerida:</strong>
                    {{ $detallePuesto->experiencia_requerida ?? '---' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Nivel riesgis físico:</strong>
                    {{ $detallePuesto->nivel_riesgo_fisico ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Habilidades Humanas</h3>

                    @forelse($detallePuesto->habilidadesHumanas?? [] as $habilidad)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Descripcion:</strong>
                                {{ $habilidad->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel:</strong>
                                {{ $habilidad->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay habilidades humanas registradas</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Habilidades Técnicas</h3>

                    @forelse($detallePuesto->habilidadesTecnicas?? [] as $habilidad)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong class="text-indigo-600">Descripcion:</strong>
                                {{ $habilidad->descripcion }}</p>
                            <p class="text-gray-800"><strong class="text-indigo-600">Nivel:</strong>
                                {{ $habilidad->nivel }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay habilidades técnicas registradas</div>
                    @endforelse
                </div>

                <div class="mt-4 bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="grid gap-2">
                        <!-- Elaboró -->
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                            <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wider">Elaboró</h3>
                            <div class="mt-2">
                                <p class="text-lg font-medium text-gray-800">
                                    {{ $detallePuesto?->elaboro_nombre ?? 'No definido' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $detallePuesto?->elaboro_puesto ?? 'No definido' }}
                                </p>
                            </div>
                        </div>

                        <!-- Revisó -->
                        <div class="bg-purple-50 p-4 rounded-lg border-l-4 border-purple-400">
                            <h3 class="text-sm font-semibold text-purple-700 uppercase tracking-wider">Revisó</h3>
                            <div class="mt-2">
                                <p class="text-lg font-medium text-gray-800">
                                    {{ $detallePuesto?->reviso_nombre ?? 'No definido' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $detallePuesto?->reviso_puesto ?? 'No definido' }}
                                </p>
                            </div>
                        </div>

                        <!-- Autorizó -->
                        <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                            <h3 class="text-sm font-semibold text-green-700 uppercase tracking-wider">Autorizó</h3>
                            <div class="mt-2">
                                <p class="text-lg font-medium text-gray-800">
                                    {{ $detallePuesto?->autorizo_nombre ?? 'No definido' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $detallePuesto?->autorizo_puesto ?? 'No definido' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="mt-6 flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg">
                        <span class="text-sm font-medium text-gray-600">Estado del perfil:</span>
                        @php
                            $statusColor = match ($detallePuesto?->status) {
                                'Aprobado' => 'bg-green-100 text-green-800',
                                'Rechazado' => 'bg-red-100 text-red-800',
                                'Pendiente' => 'bg-yellow-100 text-yellow-800',
                                default => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColor }}">
                            {{ $detallePuesto?->status ?? 'No definido' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 bg-white text-center py-8 px-6 rounded-lg shadow-lg w-full max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900">Conclusión Generada</h2>

        @if ($mostrarTabla)
            <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <!-- Encabezado con resumen -->
                <div class="bg-gradient-to-r from-blue-800 to-blue-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white">Comparación de Competencias</h3>
                    <p class="text-blue-100 mt-1">Análisis de brechas para actualización de puesto</p>
                </div>

                <!-- Tabla responsive -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Competencia</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nivel Actual</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nivel Requerido</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Diferencia</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($habilidadesComparadas as $habilidad)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <!-- Competencia -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $habilidad['nombre'] }}
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Nivel Actual -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span
                                            class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                    {{ $habilidad['nivel_usuario'] >= $habilidad['nivel_puesto'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $habilidad['nivel_usuario'] }}
                                        </span>
                                    </td>

                                    <!-- Nivel Requerido -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span
                                            class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $habilidad['nivel_puesto'] }}
                                        </span>
                                    </td>

                                    <!-- Diferencia/Brecha -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if ($habilidad['diferencia'] < 0)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                {{ $habilidad['diferencia'] }}
                                            </span>
                                        @elseif($habilidad['diferencia'] > 0)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                +{{ $habilidad['diferencia'] }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                                {{ $habilidad['diferencia'] }}
                                            </span>
                                        @endif
                                    </td>

                                    @if (session()->has('error'))
                                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                                            class="fixed bottom-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                            <div class="flex items-center">
                                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>{{ session('error') }}</span>
                                                <button @click="show = false"
                                                    class="ml-4 text-red-500 hover:text-red-700">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if ($habilidad['diferencia'] < 0)
                                            <div class="relative inline-block text-left" x-data="{ open: false }"
                                                @keydown.escape.window="open = false">

                                                <!-- Botón principal con wire:click -->
                                                <button wire:click="toggleOptions"
                                                    @click="if(@js($conclusionGuardada)) { open = !open }"
                                                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $conclusionGuardada
                                                        ? 'bg-indigo-600 text-white shadow hover:bg-indigo-700'
                                                        : 'bg-gray-100 text-gray-500 cursor-not-allowed' }}"
                                                    :disabled="!@js($conclusionGuardada)">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                    <span class="whitespace-nowrap">Asignar</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="ml-2 h-4 w-4 transition-transform duration-200"
                                                        :class="{ 'rotate-180': open }" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </button>

                                                <!-- Menú desplegable -->
                                                <div x-show="open"
                                                    x-transition:enter="transition ease-out duration-100"
                                                    x-transition:enter-start="transform opacity-0 scale-95"
                                                    x-transition:enter-end="transform opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75"
                                                    x-transition:leave-start="transform opacity-100 scale-100"
                                                    x-transition:leave-end="transform opacity-0 scale-95"
                                                    class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                                                    @click.away="open = false">

                                                    <!-- Opción Individual -->
                                                    <div class="py-1">
                                                        <a href="{{ route('agregarCapacitacionesInd', [
                                                            'id' => Crypt::encrypt($userSeleccionado->id),
                                                            'competencia' => $habilidad['nombre'],
                                                        ]) }}"
                                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 mr-3 text-indigo-500" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                            <span>Individual</span>
                                                        </a>
                                                    </div>

                                                    <!-- Opción Grupal -->
                                                    <div class="py-1">
                                                        <a href="{{ route('agregarCapacitacionesGru', [
                                                            'id' => Crypt::encrypt($userSeleccionado->id),
                                                            'competencia' => $habilidad['nombre'],
                                                        ]) }}"
                                                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 mr-3 text-green-500" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                            <span>Grupal</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                No requiere
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



            <!-- Botón de Guardar Conclusión -->
            <div class="mt-6 flex justify-end">
                <button wire:click="guardarConclusion"
                    class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-lg shadow-md hover:from-green-700 hover:to-emerald-700 transition-all duration-300 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Guardar Conclusión</span>
                </button>
            </div>
        @else
            <div class="mt-8 p-6 bg-white rounded-xl shadow-md text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-700">No hay datos para mostrar</h3>
                <p class="mt-1 text-gray-500">Aún no se ha generado una conclusión por el sistema.</p>
            </div>
        @endif

        <button wire:click="generarConclusion"
            class="mt-6 px-6 py-2 bg-blue-900 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
            Generar Conclusión
        </button>
    </div>


    <div class="flex justify-center gap-4 mt-6">
        <button onclick="window.history.back()"
            class="px-6 py-2 text-white bg-red-600 rounded-lg shadow-md hover:bg-red-700 transition">
            Salir
        </button>
    </div>


    @if (session()->has('success') || session()->has('error'))
        <div class="fixed top-5 right-5 bg-green-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg transition-opacity duration-500"
            style="z-index: 1000;" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">

            @if (session()->has('success'))
                ✅ {{ session('success') }}
            @endif

            @if (session()->has('error'))
                ❌ {{ session('error') }}
            @endif
        </div>
    @endif
</div>
