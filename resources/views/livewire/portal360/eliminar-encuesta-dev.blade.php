<div>
    
</div>


<!-- 
<div>
    <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 p-8">
        <header class="px-5 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800 text-xl">Eliminar Encuesta</h2>
        </header>

       
        <div class="space-y-4">
            <p>¿Estás seguro de que deseas eliminar esta encuesta? Esta acción no se puede deshacer.</p>

           
            <div class="flex justify-end gap-2 mt-4">
                <a
                    href="{{ route('portal360.mostrarEncuestaDev') }}"
                    class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">
                    Cancelar
                </a>
                <button 
                    wire:click.prevent="deleteEncuesta('{{ Crypt::encrypt($encuestaId) }}')"
                    class="bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-600">
                    Eliminar Encuesta
                </button>
            </div>
        </div>
    </div>
</div> -->