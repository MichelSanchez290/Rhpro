<div>
    <div class="text-center rounded-xl">
        <div class="m-2">
            <label for="numero" class="font-bold">Seleccione número de formularios:</label>
            <div class="mt-4 mb-2">
                <select wire:model="numeroLista" class="rounded-md border-2 border-gray-950 font-semibold">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                </dif>
            </div>
            <div class="w-full">
                <button wire:click="seleccionar"
                    class="mt-2 font-semibold active:shadow-inner active:shadow-black p-1 border-2 border-gray-900 rounded-md">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
