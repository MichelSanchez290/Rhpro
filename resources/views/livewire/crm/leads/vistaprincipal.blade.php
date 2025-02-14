<div>
    <div class="bg-gray-100 font-sans  w-full border-2 border-red-700">
        <div class="p-8">
            <div class="w-full">
                <div class="flex border-2 border-blue-700"">
                    <button wire:click="uno"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300 border-2 border-gray-900 mx-2">
                        E-Smart
                    </button>
                    <button wire:click="dos"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300 border-2 border-gray-900 mx-2">
                        Training
                    </button>
                    <button wire:click="tres"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300 border-2 border-gray-900 mx-2">
                        HeadHunting
                    </button>
                    <button wire:click="cuatro"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300 border-2 border-gray-900 mx-2">
                        Nom 035
                    </button>
                </div>

                @if ($paginacion == 1)
                    <div>
                        Hola mundo 1
                    </div>
                @endif

                @if ($paginacion == 2)
                    <div>
                        Hola mundo 2
                    </div>
                @endif

                @if ($paginacion == 3)
                    <div>
                        HeadHunting
                    </div>
                @endif

                @if ($paginacion == 4)
                    <div>
                        Nom 035
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
