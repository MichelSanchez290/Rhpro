<div class="h-full bg-gray-200 p-8">
    <!-- -->
    <form class="flex flex-col md:flex-row gap-3">
        <div class="flex">
            <input type="text" placeholder="Buscar por "
                class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-blue-500 focus:outline-none focus:border-blue-900">
            <button type="submit" class="bg-blue-700 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
        </div>
        <select id="pricingType" name="pricingType"
            class="w-full md:w-80 h-10 border-2 border-blue-500 focus:outline-none focus:border-blue-900 text-gray-700 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
            <option value="All" selected="">Filtrar por</option>
            <option value="empresa">Empresa</option>
            <option value="sucursal">Sucursal</option>
            <option value="Paid">Hola</option>
        </select>
    </form>
    

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
        @foreach($trabajadores as $trabajador)
        <div class="w-full mx-auto bg-white shadow-xl rounded-lg text-gray-900 p-4">
            <div class="rounded-t-lg h-32 overflow-hidden">
                <img class="object-cover object-top w-full" 
                    src="{{ asset('img/cesrh.jpeg') }}"
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
                <p class="text-gray-500">Sucursal: {{ $sucursales[$trabajador->sucursal_id]->nombre_sucursal ?? 'Sin Sucursal' }}</p>
                <p class="text-gray-500">Departamento: {{ $departamentos[$trabajador->departamento_id]->nombre_departamento ?? 'Sin Departamento' }}</p>
            </div>
    
            <div class="flex items-center justify-center p-4 border-t mx-8 mt-2">
                <button type="button" wire:click="redirigir('{{ $trabajador->id }}')"
                    class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Ver perfil
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>


