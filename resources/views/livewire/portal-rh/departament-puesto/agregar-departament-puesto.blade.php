<body class="bg-gray-200">
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="27" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M208 80c0-26.5 21.5-48 48-48l64 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-8 0 0 40 152 0c30.9 0 56 25.1 56 56l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-4.4-3.6-8-8-8l-152 0 0 40 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-40-152 0c-4.4 0-8 3.6-8 8l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-30.9 25.1-56 56-56l152 0 0-40-8 0c-26.5 0-48-21.5-48-48l0-64z"/></svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Relacionar Departamento con Puesto </h1>
                </div>
            </div>

            <form class="mt-5 mx-7">

                <!-- departamentos -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="departamento_id"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamentos</label>
                    <select wire:model.defer="depaPuest.departamento_id" id="departamento_id"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="">Seleccione un Departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- puesto -->
                <div class="grid grid-cols-1 mt-5">
                    <label for="puesto_id"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Puestos</label>
                    <select wire:model.defer="depaPuest.puesto_id" id="puesto_id"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option value="">Seleccione un Puesto</option>
                        @foreach ($puestos as $puest)
                            <option value="{{ $puest->id }}">{{ $puest->nombre_puesto }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Teléfono y Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    
                    <div class="grid grid-cols-1">
                        <label for="status"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                        <select wire:model.defer="depaPuest.status" id="status"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                    <button type="button" wire:click="saveDepaPuest()"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar
                    </button>

                    <button type="button" wire:click="redirigirDepaPuest"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
