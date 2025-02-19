<div>
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Encuesta: {{ $encuesta->Empresa }}</h1>

    <form wire:submit.prevent="submit">
        <!-- Sección I: Acontecimiento traumático severo -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección I: Acontecimiento traumático severo</h2>
            @foreach ($preguntas->where('Seccion', 'Acontecimiento traumático severo') as $pregunta)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                            <span class="ml-2">Sí</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Secciones adicionales (II, III, IV) -->
        @if ($mostrarSeccionesAdicionales)
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección II: Recuerdos persistentes sobre el acontecimiento</h2>
                @foreach ($preguntas->where('Seccion', 'Recuerdos persistentes sobre el acontecimiento (durante el último mes)') as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                <span class="ml-2">Sí</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección III: Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento</h2>
                @foreach ($preguntas->where('Seccion', 'Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes)') as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                <span class="ml-2">Sí</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sección IV: Afectación</h2>
                @foreach ($preguntas->where('Seccion', 'Afectación (durante el último mes)') as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="1" class="form-radio">
                                <span class="ml-2">Sí</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="0" class="form-radio">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Cuestionario 2 -->
        @if ($encuesta->cuestionarios->contains(2))
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Cuestionario 2: Condiciones de trabajo</h2>

                <!-- Indicación 1: Condiciones de trabajo -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de trabajo.
                    </h3>
                    @foreach ($preguntas->where('cuestionarios_id', 2)->whereIn('id', [23, 22, 24, 25, 27, 28, 29, 30, 26]) as $pregunta)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                            <div class="mt-1">
                                @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                    <label class="inline-flex items-center mr-6">
                                        <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                        <span class="ml-2">{{ $opcion }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                
<!-- Indicación 2: Actividades y responsabilidades -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.
                </h2>
                @foreach ($preguntas->whereIn('id', [31, 32, 33, 34]) as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                <label class="inline-flex items-center mr-6">
                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                    <span class="ml-2">{{ $opcion }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Indicación 3: Tiempo y responsabilidades familiares -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.
                </h2>
                @foreach ($preguntas->whereIn('id', [35, 36, 37, 38]) as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                <label class="inline-flex items-center mr-6">
                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                    <span class="ml-2">{{ $opcion }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Indicación 4: Decisiones en el trabajo -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.
                </h2>
                @foreach ($preguntas->whereIn('id', [39, 40, 41, 42, 43]) as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                <label class="inline-flex items-center mr-6">
                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                    <span class="ml-2">{{ $opcion }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Indicación 5: Capacitación e información -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    Las preguntas siguientes están relacionadas con la capacitación e información que recibe sobre su trabajo.
                </h2>
                @foreach ($preguntas->whereIn('id', [44, 45, 46, 47, 48]) as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                <label class="inline-flex items-center mr-6">
                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                    <span class="ml-2">{{ $opcion }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Indicación 6: Relaciones con compañeros y jefe -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    Las preguntas siguientes se refieren a las relaciones con sus compañeros de trabajo y su jefe.
                </h2>
                @foreach ($preguntas->whereIn('id', [49, 50, 51, 52, 53, 54, 58, 59, 60, 61, 62]) as $pregunta)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                        <div class="mt-1">
                            @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                <label class="inline-flex items-center mr-6">
                                    <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                    <span class="ml-2">{{ $opcion }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

             <!-- Preguntas clave al final -->
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
                    @foreach ($preguntas->whereIn('id', [63, 64, 65]) as $pregunta)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                            <div class="mt-1">
                                @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                    <label class="inline-flex items-center mr-6">
                                        <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                        <span class="ml-2">{{ $opcion }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
                    @foreach ($preguntas->whereIn('id', [55, 56, 57]) as $pregunta)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">{{ $pregunta->Pregunta }}</label>
                            <div class="mt-1">
                                @foreach (['Siempre' => 0, 'Casi siempre' => 1, 'Algunas veces' => 2, 'Casi nunca' => 3, 'Nunca' => 4] as $opcion => $valor)
                                    <label class="inline-flex items-center mr-6">
                                        <input type="radio" wire:model.live="respuestas.{{ $pregunta->id }}" value="{{ $valor }}" class="form-radio">
                                        <span class="ml-2">{{ $opcion }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

           
        @endif
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enviar Respuestas</button>
    </form>
</div>