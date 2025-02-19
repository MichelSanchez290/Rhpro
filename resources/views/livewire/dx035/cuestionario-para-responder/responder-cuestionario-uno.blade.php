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

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enviar Respuestas</button>
    </form>
</div>