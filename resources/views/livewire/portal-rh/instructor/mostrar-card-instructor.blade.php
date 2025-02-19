<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
    @foreach($instructores as $instructor)
    <div class="w-full mx-auto bg-white shadow-xl rounded-lg text-gray-900 p-4">
        <div class="rounded-t-lg h-32 overflow-hidden">
            <img class="object-cover object-top w-full" 
                src="{{ asset('img/cesrh.jpeg') }}"
                alt="Background">
        </div>

        <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
            <img class="object-cover object-center h-32 w-32"
                src="{{ $usuarios[$instructor->user_id]->profile_photo_path ? asset('storage/' . $usuarios[$trabajador->user_id]->profile_photo_path) : asset('img/user.png') }}" 
                alt="Foto de perfil">
        </div>

        <div class="text-center mt-2">
            <h2 class="font-semibold">{{ $usuarios[$instructor->user_id]->name ?? 'Sin Nombre' }}</h2>
            <p class="text-gray-500">{{ $usuarios[$instructor->user_id]->email ?? 'Sin Correo' }}</p>
            <p class="text-gray-500">RFC: {{ $instructor->rfc }}</p>
            <p class="text-gray-500">Puesto: {{ $puestos[$instructor->puesto_id]->nombre_puesto ?? 'Sin Puesto' }}</p>
            <p class="text-gray-500">Departamento: {{ $departamentos[$instructor->departamento_id]->nombre_departamento ?? 'Sin Departamento' }}</p>
        </div>

        <div class="flex items-center justify-center p-4 border-t mx-8 mt-2">
            <button type="button" wire:click="redirigir('{{ $instructor->id }}')"
                class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                Ver perfil
            </button>
        </div>
    </div>
    @endforeach
</div>
