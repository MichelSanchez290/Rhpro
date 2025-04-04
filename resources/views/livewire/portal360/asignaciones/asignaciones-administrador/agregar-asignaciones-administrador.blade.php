<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-md">
            <!-- Encabezado -->
            <h2 class="text-2xl font-bold text-blue-800 text-center mb-6">Agregar Asignación</h2>

            <!-- Barra de progreso -->
            <div class="w-full bg-gray-200 rounded-full h-2.5 my-6">
                <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-300"
                    style="width: {{ ($step/$maxSteps)*100 }}%">
                </div>
            </div>

            <!-- Formulario -->
            <form wire:submit.prevent="saveAsignacionAdministradordev" class="space-y-6">
                <!-- Empresa -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="empresa_id" class="block text-sm font-medium text-blue-700 mb-2">Seleccionar Empresa</label>
                    <select id="empresa_id"
                        wire:model.live="empresa_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        <option value="">-- Seleccione una empresa --</option>
                        @foreach($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                    @error('empresa_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Sucursal -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="sucursal_id" class="block text-sm font-medium text-blue-700 mb-2">Seleccionar Sucursal</label>
                    <select id="sucursal_id"
                        wire:model.live="sucursal_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($empresa_id) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($empresa_id))>
                        <option value="">-- Seleccione una sucursal --</option>
                        @foreach($sucursales as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                        @endforeach
                    </select>
                    @error('sucursal_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tipo de Usuario Calificador -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="tipo_user_calificador" class="block text-sm font-medium text-blue-700 mb-2">Tipo de Usuario Calificador</label>
                    <select id="tipo_user_calificador"
                        wire:model.live="tipo_user_calificador"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($sucursal_id) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($sucursal_id))>
                        <option value="">-- Seleccione tipo de usuario --</option>
                        @foreach($tipos_usuario as $tipo)
                        <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>
                    @error('tipo_user_calificador')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Calificador -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="calificador_id" class="block text-sm font-medium text-blue-700 mb-2">Seleccionar Calificador</label>
                    <select id="calificador_id"
                        wire:model.live="calificador_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($tipo_user_calificador) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($tipo_user_calificador))>
                        <option value="">-- Seleccione un calificador --</option>
                        @foreach($usuarios_calificador as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                    @error('calificador_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tipo de Usuario Calificado -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="tipo_user_calificado" class="block text-sm font-medium text-blue-700 mb-2">Tipo de Usuario Calificado</label>
                    <select id="tipo_user_calificado"
                        wire:model.live="tipo_user_calificado"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($calificador_id) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($calificador_id))>
                        <option value="">-- Seleccione tipo de usuario --</option>
                        @foreach($tipos_usuario as $tipo)
                        <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>
                    @error('tipo_user_calificado')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Calificado -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="calificado_id" class="block text-sm font-medium text-blue-700 mb-2">Seleccionar Calificado</label>
                    <select id="calificado_id"
                        wire:model.live="calificado_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($tipo_user_calificado) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($tipo_user_calificado))>
                        <option value="">-- Seleccione un calificado --</option>
                        @foreach($usuarios_calificado as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                    @error('calificado_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Relación -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="relacion_id" class="block text-sm font-medium text-blue-700 mb-2">Seleccionar Relación</label>
                    <select id="relacion_id"
                        wire:model.live="relacion_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($calificado_id) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($calificado_id))>
                        <option value="">-- Seleccione una relación --</option>
                        @foreach($relaciones as $relacion)
                        <option value="{{ $relacion->id }}">{{ $relacion->nombre }}</option>
                        @endforeach
                    </select>
                    @error('relacion_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Encuesta -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="encuesta_id" class="block text-sm font-medium text-blue-700 mb-2">Seleccionar Encuesta</label>

                    @if($todasUsadas)
                    <div class="p-4 bg-yellow-100 text-yellow-700 rounded-lg mb-4">
                        ⚠️ Este calificador ya ha utilizado todas las encuestas disponibles
                    </div>
                    @endif

                    <select id="encuesta_id"
                        wire:model.live="encuesta_id"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($relacion_id) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($relacion_id))>
                        <option value="">-- Seleccione una encuesta --</option>
                        @foreach($encuestas as $encuesta)
                        @php
                        $usada = in_array($encuesta->id, $encuestasUsadas);
                        @endphp
                        <option value="{{ $encuesta->id }}"
                            @if($usada)
                            disabled
                            class="bg-gray-100 text-gray-400"
                            title="Esta encuesta ya fue utilizada por este calificador"
                            @endif>
                            {{ $encuesta->nombre }}
                            @if($usada) (Usada) @endif
                        </option>
                        @endforeach
                    </select>

                    @error('encuesta_id')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Fecha de Realización -->
                <div class="transition-all duration-300 hover:shadow-md p-4 rounded-lg border border-gray-100">
                    <label for="realizada" class="block text-sm font-medium text-blue-700 mb-2">Fecha de Realización</label>
                    <input type="datetime-local"
                        id="realizada"
                        wire:model.live="realizada"
                        class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 {{ empty($encuesta_id) ? 'bg-gray-100' : '' }}"
                        @disabled(empty($encuesta_id))>
                    @error('realizada')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('portal360.asignaciones.asignaciones-administrador.mostrar-asignaciones-administrador') }}"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="flex items-center px-5 py-2.5 text-sm font-medium text-white rounded-lg transition-colors duration-300 focus:ring-2 focus:ring-blue-500 shadow-sm {{ $canSubmit ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-300 cursor-not-allowed' }}"
                        {{ $canSubmit ? '' : 'disabled' }}>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                        </svg>
                        Guardar Asignación
                    </button>
                </div>
            </form>

            <!-- Mensajes de éxito/error -->
            @if (session()->has('success'))
            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
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