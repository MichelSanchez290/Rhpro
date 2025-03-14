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

    <!-- Modal de confirmación -->
    <div id="modalConfirm"
        class="{{ $showModal ? '' : 'hidden' }} fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="flex justify-end p-2">
                <button wire:click="$set('showModal', false)" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 pt-0 text-center">
                <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">¿Estás seguro de que deseas eliminar esta
                    evidencia?</h3>
                <button wire:click="deleteFuncion"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                    Eliminar
                </button>
                <button wire:click="$set('showModal', false)"
                    class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
