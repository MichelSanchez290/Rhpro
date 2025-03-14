<div>
    <div class="max-w-6xl mx-auto px-8 py-10">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">
                Encuesta: {{ $asignacion->encuesta->nombre }}
            </h2>
            <p class="text-gray-700 mb-6 text-center">
                {{ $asignacion->encuesta->indicaciones }}
            </p>
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-700">
                    <strong>Calificador:</strong> {{ $calificador->name }} (ID: {{ $calificador->id }})
                    <br>
                    <strong>Calificado:</strong> {{ $calificado->name }} (ID: {{ $calificado->id }})
                </p>
                <div class="flex items-center">
                    <label for="perPage" class="text-sm font-medium text-gray-700 mr-2">Mostrar:</label>
                    <select wire:model.live="perPage" id="perPage" class="border border-gray-300 rounded-md shadow-sm px-2 py-1">
                        @foreach ($perPageOptions as $option)
                        <option value="{{ $option }}">{{ $option === 'all' ? 'Todas' : $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <form wire:submit.prevent="submit">
                @foreach($paginatedPreguntas as $encpre)
                @php $pregunta = $encpre->pregunta; @endphp
                <div class="mb-8 bg-gray-100 p-6 rounded-lg shadow-md" wire:key="pregunta-{{ $pregunta->id }}">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">
                        {{ $pregunta->texto }}
                    </h3>
                    <p class="text-gray-600 mb-4">{{ $pregunta->descripcion }}</p>

                    <div class="space-y-3">
                        @foreach($pregunta->respuestas as $respuesta)
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input
                                type="radio"
                                wire:model.live="respuestas.{{ $pregunta->id }}"
                                value="{{ $respuesta->id }}"
                                class="h-5 w-5 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="text-gray-700">
                                {{ $respuesta->texto }}
                            </span>
                        </label>
                        @endforeach
                    </div>

                    @error('respuestas.' . $pregunta->id)
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endforeach

                <div class="flex justify-between items-center mt-8">
                    <div class="text-gray-600">
                        {{ $paginatedPreguntas->links() }}
                    </div>
                    <button
                        type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-150 ease-in-out shadow-lg">
                        Completar Encuesta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>