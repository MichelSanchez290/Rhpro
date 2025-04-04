<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <!-- Encabezado -->
            <h2 class="text-2xl font-bold text-blue-800 text-center mb-6">Editar Compromiso</h2>

            <!-- Formulario -->
            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Fecha de Alta -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="alta" class="block text-sm font-medium text-blue-700 mb-2">Fecha de Alta</label>
                    <input type="date"
                        id="alta"
                        wire:model="alta"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                    @error('alta')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fecha de Vencimiento -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="vencimiento" class="block text-sm font-medium text-blue-700 mb-2">Fecha de Vencimiento</label>
                    <input type="date"
                        id="vencimiento"
                        wire:model="vencimiento"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                    @error('vencimiento')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Compromiso -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="compromiso" class="block text-sm font-medium text-blue-700 mb-2">Compromiso</label>
                    <textarea id="compromiso"
                        wire:model="compromiso"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        rows="3"></textarea>
                    @error('compromiso')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Usuario (Calificador/Calificado) -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="users_id" class="block text-sm font-medium text-blue-700 mb-2">Usuario (Calificador/Calificado)</label>
                    <select id="users_id"
                        wire:model="users_id"
                        wire:change="$refresh"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        <option value="">Selecciona un usuario</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->hasRole('calificador') ? 'Calificador' : 'Calificado' }})</option>
                        @endforeach
                    </select>
                    @error('users_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Verificado -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="verificado" class="block text-sm font-medium text-blue-700 mb-2">Verificado</label>
                    <div class="flex items-center">
                        <button type="button"
                            wire:click="$toggle('verificado')"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out {{ $verificado ? 'bg-blue-600' : 'bg-gray-200' }}"
                            role="switch">
                            <span class="sr-only">Toggle Verificado</span>
                            <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $verificado ? 'translate-x-5' : 'translate-x-0' }}"></span>
                        </button>
                        <span class="ml-2 text-gray-700">{{ $verificado ? 'Verificado' : 'No verificado' }}</span>
                    </div>
                    @error('verificado')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Pregunta Contestada (Opcional) -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="preguntas_id" class="block text-sm font-medium text-blue-700 mb-2">Pregunta Contestada (Opcional)</label>
                    <select id="preguntas_id"
                        wire:model="preguntas_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        <option value="">Sin pregunta</option>
                        @if ($preguntas && $preguntas->count() > 0)
                        @foreach ($preguntas as $pregunta)
                        <option value="{{ $pregunta->id }}">{{ $pregunta->texto }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('preguntas_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('portal360.compromiso.compromiso-administrador.mostrar-compromiso-administrador') }}"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                        </svg>
                        Guardar Cambios
                    </button>
                </div>
            </form>

            <!-- Mensajes de éxito/error -->
            @if (session()->has('message'))
            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('message') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="mt-6 p-4 bg-red-100 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
</div>