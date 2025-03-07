<div>
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Mis Incidencias</h1>
                </div>
            </div>

            @if($incidencias->isEmpty())
                <div class="p-6 text-center text-gray-600">
                    <p>Sin incidencias actualmente</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
                    @foreach ($incidencias as $incidencia)
                        <div class="w-full mx-auto bg-white shadow-xl rounded-lg text-gray-900 p-4">
                            <div class="rounded-t-lg h-32 overflow-hidden">
                                <img class="object-cover object-top w-full" 
                                    src="{{ asset('img/cesrh.jpeg') }}"
                                    alt="Background">
                            </div>
                    
                            <div class="text-center mt-2">
                                <h2><strong>Usuario:</strong>
                                    {{ $incidencia->users->first() ? $incidencia->users->first()->name : 'Sin asignar' }}
                                </h2>
                                <p><strong>Tipo de incidencia:</strong> {{ $incidencia->tipo_incidencia }}</p>
                                <p><strong>Fecha inicio:</strong> {{ $incidencia->fecha_inicio }}</p>
                                <p><strong>Fecha final:</strong> {{ $incidencia->fecha_final }}</p>
                            </div>
                    
                            <div class="flex gap-4 mt-4">
                                <!-- Aquí pueden ir botones o acciones -->
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Botones -->
            <div class="flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5">
                <button type="button" onclick="window.history.back()"
                    class="w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">
                    Volver
                </button>
            </div>
        </div>
    </div>
</div>

