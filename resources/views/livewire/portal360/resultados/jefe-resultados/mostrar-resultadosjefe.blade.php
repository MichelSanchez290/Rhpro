<div class="p-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Resultados de Evaluación 360</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($asignaciones as $asignacion)
            <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    {{ $asignacion->calificado->name }}
                </h3>
                <p class="text-sm text-gray-600">
                    Relación: 
                    <span class="font-medium">
                        {{ $asignacion->relacion->nombre ?? 'No especificada' }}
                    </span>
                </p>
                <p class="text-sm text-gray-600">
                    Encuesta: 
                    <span class="font-medium">
                        {{ $asignacion->encuesta->nombre ?? 'ENCUESTA 360' }} <!-- Cambiar 'encuesta360' por 'encuesta' -->
                    </span>
                </p>
                <p class="text-sm text-gray-600">
                    Fecha: 
                    <span class="font-medium">
                        {{ \Carbon\Carbon::parse($asignacion->fecha)->format('d/m/Y') }}
                    </span>
                </p>
                <p class="text-sm text-gray-600">
                    Empresa: 
                    <span class="font-medium">
                        {{ $asignacion->calificado->empresa->nombre ?? 'CESRH Consultoría y Coaching' }}
                    </span>
                </p>
                <p class="text-sm text-gray-600">
                    Sucursal: 
                    <span class="font-medium">
                        {{ $asignacion->calificado->sucursal->nombre_sucursal ?? 'SUCURSAL 1' }}
                    </span>
                </p>
                <p class="text-sm mt-2">
                    Estado: 
                    <span class="font-semibold @if($asignacion->realizada) text-green-600 @else text-red-600 @endif">
                        {{ $asignacion->realizada ? 'Completada' : 'Pendiente' }}
                    </span>
                </p>
                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('portal360.envaluaciones.ver-resultados-por-usuario-admin.ver-resultados-por-usuario', $asignacion->id) }}"
                       class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Ver Resultados
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-600">
                No hay resultados disponibles para mostrar.
            </div>
        @endforelse
    </div>
</div>