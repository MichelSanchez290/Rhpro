<div>
    <div class=" text-center rounded-xl">
        <div class="text-center w-full">
            <h1 class="m-5 font-bold">
                Seleccione el número de tablas que desea generar.
            </h1>
        </div>
        <div class="w-full  m-2">
            <select wire:model.defer='seleccion' class="rounded-md border-2 border-gray-950 font-semibold">
                <option disabled value=""></option>
                <option disabled value="">---------</option>
                <option value="#">1</option>
                <option value="#">2</option>
                <option value="#">3</option>
                <option value="#">4</option>
                <option value="#">5</option>
                <option value="#">6</option>
                <option value="#">7</option>
                <option value="#">8</option>
                <option value="#">9</option>
                <option value="#">10</option>
                <option disabled value="">---------</option>
            </select>
        </div>
        <div class="w-full">
            <button wire:click='aceptar'
                class="mt-2 font-semibold active:shadow-inner active:shadow-black mb-2 p-1 border-2 border-gray-900 rounded-md">
                Aceptar
            </button>
        </div>
    </div>
</div>
