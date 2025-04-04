<div class="h-full bg-gray-200 p-8">
    <div class="bg-white rounded-lg shadow-xl pb-8">
        <div class="w-full h-[250px]">
            <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg"
                class="w-full h-full rounded-tl-lg rounded-tr-lg">
        </div>

        <div class="flex flex-col items-center -mt-20">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($userSeleccionado->name ?? 'Usuario') }}&background=random"
                alt="Foto de {{ $userSeleccionado->name ?? 'Usuario' }}"
                class="w-26 h-40 rounded-full shadow-md transform transition-all duration-500 hover:scale-110">
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl">Nombre: {{ $userSeleccionado->name }}</p>
                <span class="bg-blue-500 rounded-full p-1" title="Verified">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
            </div>
            <p class="text-gray-700">Puesto: {{ $userSeleccionado->perfilActual()?->nombre_puesto ?? 'Sin asignar' }}
            </p>

            <p class="text-sm text-gray-500">Correo electronico: {{ $userSeleccionado->email }}</p>
        </div>
        <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
            <div class="flex items-center space-x-4 mt-2">
                <button
                    onclick="window.location.href='{{ route('compararPerfilPuesto', Crypt::encrypt($userSeleccionado->id)) }}'"
                    class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                    </svg>
                    <span>Comparar</span>
                </button>

                <button
                    onclick="window.location.href='{{ route('evaluarColaborador', Crypt::encrypt($userSeleccionado->id)) }}'"
                    class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <span>Evaluar</span>
                </button>

                <button
                    onclick="window.location.href='{{ route('historialEvalaciones', Crypt::encrypt($userSeleccionado->id)) }}'"
                    class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <span>Historial de Calificaciones</span>
                </button>

                <button
                    onclick="window.location.href='{{ route('verCapacitacionesInd', Crypt::encrypt($userSeleccionado->id)) }}'"
                    class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                    </svg>
                    <span>Capacitaciones</span>
                </button>
            </div>
        </div>
    </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-3xl font-bold text-center text-indigo-700">
                    {{ $perfilactual->nombre_puesto ?? 'Sin asignar' }}</h2>
                <p class="text-gray-600 mt-2"><strong class="text-gray-600">Área:</strong>
                    {{ $perfilactual?->area ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Proceso:</strong>
                    {{ $perfilactual?->proceso ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Misión:</strong>
                    {{ $perfilactual?->mision ?? 'No definido' }}</p>

                <div class="mt-4">
                    <h3 class="text-xl font-bold text-indigo-700 mb-3">Funciones Específicas</h3>
                    @forelse($funcionesEspecificas as $funcion)
                        <div class="bg-white shadow-md rounded-lg p-4 mb-3 border-l-4 border-indigo-500">
                            <p class="text-gray-800"><strong
                                    class="text-indigo-600">Nombre:</strong>{{ $funcion->nombre }}</p>
                        </div>
                    @empty
                        <div class="text-gray-500 italic">No hay funciones asignadas</div>
                    @endforelse
                </div>

                <p class="text-gray-600"><strong class="text-gray-600">Puesto Reporta:</strong>
                    {{ $perfilactual?->puesto_reporta ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Puestos que le reportan:</strong>
                    {{ $perfilactual?->puestos_que_le_reportan ?? 'No definido' }}</p>
                <p class="text-gray-600"><strong class="text-gray-600">Suplencia:</strong>
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
                        <div class="text-gray-500 italic">No hay relaciones internas asignadas</div>
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
                        <div class="text-gray-500 italic">No hay relaciones externas asignadas</div>
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

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-indigo-700 mb-4">Formación y Habilidades Humanas</h3>
                    @if ($habilidadesHumanas->isNotEmpty())
                        <div class="overflow-x-auto rounded-lg shadow-lg">
                            <table class="w-full bg-white border-collapse">
                                <thead>
                                    <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Descripción
                                        </th>
                                        <th class="px-4 py-4 text-center text-sm font-semibold uppercase"
                                            colspan="5">Nivel</th>
                                    </tr>
                                    <tr class="bg-blue-50">
                                        <th class="px-4 py-2 text-left text-xs text-gray-600 font-medium"></th>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <th class="px-3 py-2 text-center text-xs text-gray-600 font-medium">
                                                {{ $i }}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($habilidadesHumanas as $humana)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 text-gray-800 font-medium flex items-center">
                                                <span class="text-green-500 text-xl mr-2">✓</span>
                                                {{ $humana->descripcion }}
                                            </td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td class="px-4 py-4 text-center">
                                                    @if ($humana->nivel == $i)
                                                        <span class="text-red-500 font-bold text-xl">×</span>
                                                    @endif
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 italic text-sm">No hay habilidades humanas asignadas.</p>
                    @endif
                </div>

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-indigo-700 mb-4">Formación y Habilidades Técnicas</h3>
                    @if ($habilidadesTecnicas->isNotEmpty())
                        <div class="overflow-x-auto rounded-lg shadow-lg">
                            <table class="w-full bg-white border-collapse">
                                <thead>
                                    <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Descripción
                                        </th>
                                        <th class="px-4 py-4 text-center text-sm font-semibold uppercase"
                                            colspan="5">Nivel</th>
                                    </tr>
                                    <tr class="bg-blue-50">
                                        <th class="px-4 py-2 text-left text-xs text-gray-600 font-medium"></th>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <th class="px-3 py-2 text-center text-xs text-gray-600 font-medium">
                                                {{ $i }}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($habilidadesTecnicas as $tecnica)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 text-gray-800 font-medium flex items-center">
                                                <span class="text-green-500 text-xl mr-2">✓</span>
                                                {{ $tecnica->descripcion }}
                                            </td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td class="px-4 py-4 text-center">
                                                    @if ($tecnica->nivel == $i)
                                                        <span class="text-red-500 font-bold text-xl">×</span>
                                                    @endif
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 italic text-sm">No hay habilidades técnicas asignadas.</p>
                    @endif
                </div>

                <div class="mt-8 bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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

            @if ($comparacionesPuestos->isNotEmpty())
                @php
                    $groupedComparaciones = $comparacionesPuestos->groupBy('fecha_comparacion');
                @endphp

                @foreach ($groupedComparaciones as $fecha => $comparaciones)
                    <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 py-4">
                            <h3 class="text-xl font-bold text-white">Evaluación del
                                {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h3>
                            @if ($comparaciones->first()->puestoNuevo)
                                <p class="text-blue-100 mt-1">Perfil Nuevo:
                                    {{ $comparaciones->first()->puestoNuevo->nombre_puesto }}</p>
                            @endif
                        </div>

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
                                    @foreach ($comparaciones as $comparacion)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $comparacion->competencias_requeridas ?? 'N/A' }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $comparacion->nivel_actual >= $comparacion->nivel_nuevo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $comparacion->nivel_actual ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    {{ $comparacion->nivel_nuevo ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @if (isset($comparacion->diferencia))
                                                    @if ($comparacion->diferencia < 0)
                                                        <span
                                                            class="text-red-600 font-medium">{{ $comparacion->diferencia }}</span>
                                                    @else
                                                        <span
                                                            class="text-green-600 font-medium">+{{ $comparacion->diferencia }}</span>
                                                    @endif
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @if ($comparacion->diferencia < 0)
                                                    <div class="relative inline-block text-left"
                                                        x-data="{ open: false }">
                                                        @if ($comparacion->capacitacion_asignada)
                                                        <a href="{{ route('verCapacitacionEspecifica', ['user_id' => Crypt::encrypt($comparacion->users_id), 'competencia' => $comparacion->competencias_requeridas]) }}"
                                                            class="px-3 py-2 rounded-md bg-emerald-500 hover:bg-emerald-600 text-white shadow-md flex items-center justify-center">
                                                             ✔ Ver Capacitación
                                                         </a>
                                                                                                                
                                                        @else
                                                            <button @click="open = !open"
                                                                @keydown.escape="open = false"
                                                                class="px-3 py-2 rounded-md bg-indigo-600 hover:bg-indigo-700 text-white flex items-center mx-auto">
                                                                Asignar
                                                                <svg class="ml-1 h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </button>

                                                            <div x-show="open"
                                                                x-transition:enter="transition ease-out duration-100"
                                                                x-transition:enter-start="transform opacity-0 scale-95"
                                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                                x-transition:leave="transition ease-in duration-75"
                                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                                x-transition:leave-end="transform opacity-0 scale-95"
                                                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
                                                                @click.away="open = false">

                                                                <div class="py-1">
                                                                    <a href="{{ route('agregarCapacitacionesInd', [
                                                                        'id' => Crypt::encrypt($userSeleccionado->id),
                                                                        'competencia' => $comparacion->competencias_requeridas,
                                                                    ]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                                                        Individual
                                                                    </a>
                                                                
                                                                    <a href="{{ route('agregarCapacitacionesGru', [
                                                                        'id' => Crypt::encrypt($userSeleccionado->id),
                                                                        'competencia' => $comparacion->competencias_requeridas,
                                                                    ]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                                                        Grupal
                                                                    </a>

                                                                </div>                                                                
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span class="text-gray-400">No requiere</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="mt-8 p-6 bg-white rounded-xl shadow-md text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-700">No hay evaluaciones registradas</h3>
                    <p class="mt-1 text-gray-500">Actualmente no hay comparaciones de puestos guardadas para este
                        usuario.</p>
                </div>
            @endif


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
</div>
