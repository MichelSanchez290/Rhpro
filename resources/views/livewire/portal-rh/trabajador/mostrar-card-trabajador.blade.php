<div class="h-full bg-gray-200 p-8">
    <!-- Buscador -->
    <div class="flex relative rounded-md w-full max-w-3xl mx-auto">
        <input type="text" wire:model.live="search" placeholder="Nombre de usuario o Clave de Trabajador"
            class="w-full p-3 rounded-md border-2 border-r-white rounded-r-none border-gray-300 placeholder-gray-500" />
        <button
            class="inline-flex items-center gap-2 bg-blue-700 text-white text-lg font-semibold py-3 px-6 rounded-r-md">
            <span class="hidden md:block">
                <svg class="text-gray-200 h-5 w-5 p-0 fill-current" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 56.966 56.966" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                             s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                             c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                             s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </span>
        </button>
    </div>

    <!-- Filtros -->
    <div class="mt-6 bg-white p-5 rounded-lg shadow-md">
        <h1 class="text-lg font-semibold text-gray-900 text-center mb-4">
            Seleccione su Empresa, Sucursal y Departamento para filtrar los usuarios
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Empresa -->
            <div class="relative w-full">
                <select wire:model.live="empresa"
                    class="w-full bg-gray-50 text-gray-600 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Selecciona Empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sucursal -->
            <div class="relative w-full">
                <select wire:model.live="sucursal"
                    class="w-full bg-gray-50 text-gray-600 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Selecciona Sucursal</option>
                    @forelse ($sucursales as $sucursal)
                        @foreach ($sucursal->sucursales as $mi_sucursal)
                            <option value="{{ $mi_sucursal->id }}">{{ $mi_sucursal->nombre_sucursal }}</option>
                        @endforeach
                    @empty
                        <option value="">Sin sucursales</option>
                    @endforelse
                </select>
            </div>

            <!-- Departamento -->
            <div class="relative w-full">
                <select wire:model.live="departamento"
                    class="w-full bg-gray-50 text-gray-600 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Selecciona Departamento</option>
                    @forelse ($departamentos as $departamento)
                        @foreach ($departamento->departamentos as $mi_depa)
                            <option value="{{ $mi_depa->id }}">{{ $mi_depa->nombre_departamento }}</option>
                        @endforeach
                    @empty
                        <option value="">Sin departamentos</option>
                    @endforelse
                </select>
            </div>

            <!-- Botón Aplicar Filtros -->
            <div class="flex justify-center">
                <button type="button" wire:click="$refresh"
                    class="bg-blue-700 text-white font-medium rounded-lg px-6 py-2 hover:bg-blue-800 focus:ring-2 focus:ring-blue-400">
                    Aplicar Filtros
                </button>
            </div>
        </div>
    </div>

    @if ($noResults)
        <div class="lg:col-span-5 sm:col-span-4 col-span-1 text-center">
            <span class="ml-6 text-gray-400 text-4xl font-extrabold">
                Sin resultados para la búsqueda "{{ $this->search }}"
            </span>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
            @forelse ($trabajadores as $trabajador)
                <div class="w-full mx-auto bg-white shadow-xl rounded-lg text-gray-900 p-4">
                    <div class="rounded-t-lg h-32 overflow-hidden">
                        <img class="object-cover object-top w-full" src="{{ asset('img/cesrh.jpeg') }}"
                            alt="Background">
                    </div>

                    <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center h-32 w-32"
                            src="{{ $usuarios[$trabajador->user_id]->profile_photo_path ? asset('storage/' . $usuarios[$trabajador->user_id]->profile_photo_path) : asset('img/user.png') }}"
                            alt="Foto de perfil">
                    </div>

                    <div class="text-center mt-2">
                        <h2 class="font-semibold">{{ $usuarios[$trabajador->user_id]->name ?? 'Sin Nombre' }}</h2>
                        <p class="text-gray-500">{{ $usuarios[$trabajador->user_id]->email ?? 'Sin Correo' }}</p>
                        <p class="text-gray-500">Clave: {{ $trabajador->clave_trabajador }}</p>
                        <p class="text-gray-500">
                            Reg Patronal:
                            {{ $registros_patronales[$trabajador->registro_patronal_id]->registro_patronal ?? 'Sin Departamento' }}
                        </p>
                        <p class="text-gray-500">
                            Empresa: {{ $emp[$usuarios[$trabajador->user_id]->empresa_id]->nombre ?? 'Sin Empresa' }}
                        </p>
                        <p class="text-gray-500">
                            Sucursal:
                            {{ $suc[$usuarios[$trabajador->user_id]->sucursal_id]->nombre_sucursal ?? 'Sin Sucursal' }}
                        </p>
                        <p class="text-gray-500">
                            Departamento:
                            {{ $depa[$usuarios[$trabajador->user_id]->departamento_id]->nombre_departamento ?? 'Sin Departamento' }}
                        </p>
                        <p class="text-gray-500">
                            Puesto:
                            {{ $puest[$usuarios[$trabajador->user_id]->puesto_id]->nombre_puesto ?? 'Sin Puesto' }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-4 border-t mx-8 mt-2">
                        <button type="button" wire:click="redirigir('{{ $trabajador->id }}')"
                            class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                            Ver perfil
                        </button>
                    </div>
                </div>
            @empty
                @unless ($noResults)
                    <div class="lg:col-span-5 sm:col-span-4 col-span-1 text-center">
                        <span class="ml-6 text-gray-400 text-4xl font-extrabold">
                            No hay trabajadores registrados
                        </span>
                    </div>
                @endunless
            @endforelse
        </div>
    @endif
</div>
