<div>
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Revisar Solicitudes</h1>
            </div>

            @if (session()->has('message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                    {{ session('message') }}
                </div>
            @endif

            <div class="p-4">
                @foreach ($incidencias_pendientes as $incidencia)
                    <div class="border p-4 mb-4 rounded">
                        <p><strong>Usuario:</strong> 
                            {{ $incidencia->users->first() ? $incidencia->users->first()->name : 'Sin asignar' }}
                        </p>
                        <p><strong>Tipo de incidencia:</strong> {{ $incidencia->tipo_incidencia }}</p>
                        <p><strong>Fecha inicio:</strong> {{ $incidencia->fecha_inicio }}</p>
                        <p><strong>Fecha final:</strong> {{ $incidencia->fecha_final }}</p>

                        <div class="flex gap-4 mt-4">
                            <button wire:click="aprobar({{ $incidencia->id }})"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Aprobar
                            </button>

                            <button wire:click="rechazar({{ $incidencia->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Rechazar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
