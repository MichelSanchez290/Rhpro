<div class="h-full bg-gray-200 p-8">
    <!-- -->
    <form class="flex flex-col md:flex-row gap-3">
        <!-- Búsqueda -->
        <div class="flex">
            <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar por Nombre o Clave"
                class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-blue-500 focus:outline-none focus:border-blue-900">
            <button type="button" class="bg-blue-700 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
        </div>

        <!-- Filtro por Registro Patronal -->
        <select wire:model="registroPatronal"
            class="w-full md:w-80 h-10 border-2 border-blue-500 focus:outline-none focus:border-blue-900 text-gray-700 rounded px-2 md:px-3 py-0 md:py-1">
            <option value="">Filtrar por Registro Patronal</option>
            @foreach($registrosPatronales as $registro)
                <option value="{{ $registro->id }}">{{ $registro->registro_patronal }}</option>
            @endforeach
        </select>

        <!-- Filtro por Departamento -->
        <select wire:model="departamento"
            class="w-full md:w-80 h-10 border-2 border-blue-500 focus:outline-none focus:border-blue-900 text-gray-700 rounded px-2 md:px-3 py-0 md:py-1">
            <option value="">Seleccionar Departamento</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
            @endforeach
        </select>

        <!-- Filtro por Puesto -->
        <select wire:model="puesto"
            class="w-full md:w-80 h-10 border-2 border-blue-500 focus:outline-none focus:border-blue-900 text-gray-700 rounded px-2 md:px-3 py-0 md:py-1">
            <option value="">Seleccionar Puesto</option>
            @foreach($puestos as $puesto)
                <option value="{{ $puesto->id }}">{{ $puesto->nombre_puesto }}</option>
            @endforeach
        </select>

    </form>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
        @foreach ($becarios as $becario)
            <div class="w-full mx-auto bg-white shadow-xl rounded-lg text-gray-900 p-4">
                <div class="rounded-t-lg h-32 overflow-hidden">
                    <img class="object-cover object-top w-full" src="{{ asset('img/cesrh.jpeg') }}" alt="Background">
                </div>

                <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <img class="object-cover object-center h-32 w-32"
                        src="{{ $usuarios[$becario->user_id]->profile_photo_path ? asset('storage/' . $usuarios[$trabajador->user_id]->profile_photo_path) : asset('img/user.png') }}"
                        alt="Foto de perfil">
                </div>

                <div class="text-center mt-2">
                    <h2 class="font-semibold">{{ $usuarios[$becario->user_id]->name ?? 'Sin Nombre' }}</h2>
                    <p class="text-gray-500">{{ $usuarios[$becario->user_id]->email ?? 'Sin Correo' }}</p>
                    <p class="text-gray-500">Clave: {{ $becario->clave_becario }}</p>
                    <p class="text-gray-500">Puesto: {{ $puestos[$becario->puesto_id]->nombre_puesto ?? 'Sin Puesto' }}</p>
                    <p class="text-gray-500">Departamento: {{ $departamentos[$becario->departamento_id]->nombre_departamento ?? 'Sin Departamento' }}</p>
                    <p class="text-gray-500">Reg Patronal: {{ $registros_patronales[$becario->registro_patronal_id]->registro_patronal ?? 'Sin Departamento' }} </p>
                </div>

                <div class="flex items-center justify-center p-4 border-t mx-8 mt-2">
                    <button type="button" wire:click="redirigir('{{ $becario->id }}')"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Ver perfil
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
