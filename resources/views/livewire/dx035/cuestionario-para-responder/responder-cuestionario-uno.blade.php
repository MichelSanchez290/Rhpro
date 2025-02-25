<div>
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Encuesta: {{ $encuesta->Empresa }}</h1>

    <form wire:submit.prevent="submit">
        <!-- Paso 1: Sección I -->
        @if ($currentStep == 1 && $encuesta->cuestionarios->contains(1))
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección I: Acontecimiento traumático severo</h2>
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b">Pregunta</th>
                            <th class="py-2 px-4 border-b">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas->where('Seccion', 'Acontecimiento traumático severo') as $pregunta)
                        <tr wire:key="pregunta-{{ $pregunta->id }}">
                                <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                            <span class="ml-2">Sí</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                            <span class="ml-2">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Paso 2: Secciones adicionales (II, III, IV) -->
        @if ($currentStep == 2 && $mostrarSeccionesAdicionales && $encuesta->cuestionarios->contains(1))
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección II: Recuerdos persistentes sobre el acontecimiento</h2>
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b">Pregunta</th>
                            <th class="py-2 px-4 border-b">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas->where('Seccion', 'Recuerdos persistentes sobre el acontecimiento (durante el último mes)') as $pregunta)
                        <tr wire:key="pregunta-{{ $pregunta->id }}">
                                <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                            <span class="ml-2">Sí</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                            <span class="ml-2">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección III: Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento</h2>
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b">Pregunta</th>
                            <th class="py-2 px-4 border-b">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas->where('Seccion', 'Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes)') as $pregunta)
                        <tr wire:key="pregunta-{{ $pregunta->id }}">
                                <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                            <span class="ml-2">Sí</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                            <span class="ml-2">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección IV: Afectación</h2>
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b">Pregunta</th>
                            <th class="py-2 px-4 border-b">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas->where('Seccion', 'Afectación (durante el último mes)') as $pregunta)
                        <tr wire:key="pregunta-{{ $pregunta->id }}">
                                <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                            <span class="ml-2">Sí</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                            <span class="ml-2">No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @elseif ($currentStep == 2 && !$mostrarSeccionesAdicionales && $encuesta->cuestionarios->contains(1))
                <div class="mb-8">
                    <p>No es necesario completar las secciones adicionales.</p>
                    <button wire:click="nextStep" class="bg-blue-500 text-white px-4 py-2 rounded-md">Siguiente</button>
                </div>
            
        @endif

        <!-- Paso 3: Cuestionario 2 -->
        @if ($currentStep == 3 && $encuesta->cuestionarios->contains(2))
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Cuestionario 2: Condiciones de trabajo</h2>

                <!-- Indicación 1: Condiciones de trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->where('cuestionarios_id', 2)->whereIn('id', [23, 22, 24, 25, 27, 28, 29, 30, 26]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 2: Actividades y responsabilidades -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [31, 32, 33, 34]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 3: Tiempo y responsabilidades familiares -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [35, 36, 37, 38]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 4: Decisiones en el trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [39, 40, 41, 42, 43]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 5: Capacitación e información -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con la capacitación e información que recibe sobre su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [44, 45, 46, 47, 48]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 6: Relaciones con compañeros y jefe -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes se refieren a las relaciones con sus compañeros de trabajo y su jefe.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [49, 50, 51, 52, 53, 54, 58, 59, 60, 61, 62]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Paso 4: Cuestionario 3 -->
        @if ($currentStep == 4 && $encuesta->cuestionarios->contains(3))
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Cuestionario 3: Condiciones de trabajo</h2>

                <!-- Indicación 1: Condiciones ambientales -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [68, 70, 69, 71, 72]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 2: Cantidad y ritmo de trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [73, 74, 75]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 3: Esfuerzo mental -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [76, 77, 78, 79]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 4: Actividades y responsabilidades -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [80, 81, 82, 83]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 5: Jornada de trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con su jornada de trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [84, 85, 86, 87, 88, 89]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 6: Decisiones en el trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [90, 91, 92, 93, 94]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 7: Cambios en el trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [95, 96]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 8: Capacitación e información -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [97, 98, 99, 100, 101, 102]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 9: Liderazgo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [103, 104, 105, 106, 107]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 10: Relaciones con compañeros -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes se refieren a las relaciones con sus compañeros.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [108, 109, 110, 111, 112]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 11: Reconocimiento del desempeño -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [113, 114, 115, 116, 117, 118, 119, 120, 121, 122]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Indicación 12: Violencia laboral -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso psicológico).
                    </h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Pregunta</th>
                                <th class="py-2 px-4 border-b">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas->whereIn('id', [123, 124, 125, 126, 127, 128, 129, 130, 131]) as $pregunta)
                            <tr wire:key="pregunta-{{ $pregunta->id }}">
                                    <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex space-x-4">
                                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                <label class="inline-flex items-center">
                                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                    <span class="ml-2">{{ $opcion }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Preguntas clave al final -->
        @if ($currentStep == 5)
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Preguntas clave</h2>

                <!-- Pregunta: Atención a clientes -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        En mi trabajo debo brindar servicio a clientes o usuarios:
                    </label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model.live="atencionClientes" value="1" class="form-radio">
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" wire:model.live="atencionClientes" value="0" class="form-radio">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                </div>

                <!-- Preguntas adicionales si atiende clientes -->
                @if ($atencionClientes == 1)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">
                            Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.
                        </h3>
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border-b">Pregunta</th>
                                    <th class="py-2 px-4 border-b">Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preguntas->whereIn('id', [132, 133, 134, 135]) as $pregunta)
                                <tr wire:key="pregunta-{{ $pregunta->id }}">
                                        <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <div class="flex space-x-4">
                                                @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                        <span class="ml-2">{{ $opcion }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <!-- Pregunta: Es jefe -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Soy jefe de otros trabajadores:
                    </label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model.live="esJefe" value="1" class="form-radio">
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" wire:model.live="esJefe" value="0" class="form-radio">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                </div>

                <!-- Preguntas adicionales si es jefe -->
                @if ($esJefe == 1)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">
                            Las siguientes preguntas están relacionadas con las actitudes de los trabajadores que supervisa.
                        </h3>
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border-b">Pregunta</th>
                                    <th class="py-2 px-4 border-b">Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preguntas->whereIn('id', [136, 137, 138, 139]) as $pregunta)
                                <tr wire:key="pregunta-{{ $pregunta->id }}">
                                        <td class="py-2 px-4 border-b">{{ $pregunta->Pregunta }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <div class="flex space-x-4">
                                                @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                                        <span class="ml-2">{{ $opcion }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif

        <!-- Botones de navegación -->
        <div class="flex justify-between mt-8">
            @if ($currentStep > 1)
                <button type="button" wire:click="previousStep" class="bg-gray-500 text-white px-4 py-2 rounded-md">Anterior</button>
            @endif
            @if ($currentStep < 5)
                <button type="button" wire:click="nextStep" class="bg-blue-500 text-white px-4 py-2 rounded-md">Siguiente</button>
            @else
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Enviar Respuestas</button>
            @endif
        </div>
    </form>
</div>