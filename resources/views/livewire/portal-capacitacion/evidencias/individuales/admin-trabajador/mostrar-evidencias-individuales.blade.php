<div class="max-w-6xl mx-auto p-8 bg-white shadow-lg rounded-lg">
    <!-- Encabezado y botón de subir evidencia -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">📁 Evidencias de la Capacitación Individual</h2>
        
        <a href="{{ route('agregarEvidenciasIndTrabajador', Crypt::encrypt($caps_individuales_id)) }}"
           class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition-transform transform hover:scale-105 flex items-center gap-2 shadow-md">
            ⬆️ <span class="font-medium">Subir Evidencia</span>
        </a>
    </div>

    @if ($evidencias->isEmpty())
        <p class="text-gray-600 text-lg text-center py-8">No se han subido evidencias para esta capacitación.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($evidencias as $evidencia)
                <div class="bg-gray-100 border border-gray-300 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105 relative">
                    <img src="{{ asset('storage/' . $evidencia->evidencias) }}" 
                        alt="Evidencia" 
                        class="w-full h-52 object-cover rounded-md shadow-lg mb-4">


                    <div class="text-gray-700 space-y-2">
                        <p class="font-semibold"><strong>Comentario:</strong> {{ $evidencia->comentarios ?? 'No hay comentarios' }}</p>
                        <p><strong>Estado:</strong> <span class="capitalize">{{ $evidencia->status }}</span></p>
                        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($evidencia->fecha)->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex justify-center space-x-4 mt-4 ">
                        <button class="text-blue-600 hover:text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>                              
                        </button>
                        <button wire:click="confirmDelete({{ $evidencia->id }})"
                            class="text-red-600 hover:text-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>     
                </div>
            @endforeach
        </div>
    @endif

</div>
