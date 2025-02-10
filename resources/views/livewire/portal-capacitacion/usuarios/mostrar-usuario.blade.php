<div class="flex flex-col items-center min-h-screen bg-gradient-to-br from-[#F9F5F3] via-[#F9F5F3] to-[#EAE7E5] py-10 px-4">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-blue-900 sm:text-4xl">Usuarios Registrados</h2>
    </div>

<<<<<<< HEAD
        <div class="flex justify-center my-6">
            <div class="relative w-2/3 max-w-lg">
                <input 
                    type="text" 
                    wire:model.live="search"
                    placeholder="Buscar por nombre..." 
                    class="w-full p-3 pl-10 text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                />
                <svg class="absolute left-3 top-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div> 

        <ul role="list" class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-0 gap-y-0 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse($users as $user)
            <li>
                <div class="m-2 space-y-2">
                    <div class="group flex flex-col gap-1 rounded-lg p-5 text-gray" tabindex="1">
                        <div class="group relative m-0 flex h-72 w-72 rounded-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg">
                            <div class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100">
                                <img class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110" src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                            </div>
                            <div class="p-3 rounded-xl opacity-60 absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110 group-hover:opacity-100" style="background-color: Gray; width:70%;">
                                <h1 class="text-lg font-bold text-white">{{ $user->name }}</h1>
                                <h2 class="text-m font-light text-gray-200">{{ $user->puesto}}Ingeniero de Sistemas</h2>
                            </div>
                        </div>
                        <p class="pl-5 text-gray-400 hover:text-gray-500">
                            <a href="{{ route('vermasUsuarios', Crypt::encrypt($user->id)) }}">
                                <span class="sr-only">Ver mas</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>&nbsp;<span style="font-size: .8em; font-style: italic;">Ver mas</span>
                            </a>
                        </p>                      
                    </div>
=======
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl">
        @forelse($users as $user) 
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <!-- Imagen de portada -->
                <div class="h-[180px] bg-cover bg-center" 
                    style="background-image: url(https://media.istockphoto.com/id/945061408/es/foto/retrato-de-la-hermosa-joven-empresaria.jpg?s=612x612&w=0&k=20&c=Bpym7PmiZIV5-8x5pJycHvON5GOsfb3-9-gRiFufmwI=);">
                </div>

                <!-- Contenido de la tarjeta -->
                <div class="p-6 text-center">
                    <p class="text-xl font-semibold text-gray-800">{{ $user->name }}</p>
                    <p class="text-sm text-blue-700 font-medium mt-1">{{ $user->puesto }} - Ingeniero de sistemas</p>
                    <p class="text-gray-600 text-sm mt-3">{{ $user->email }}</p>

                    <a href="{{ route('vermasUsuarios', Crypt::encrypt($user->id)) }}" 
                        class="block mt-6 px-4 py-2 bg-blue-900 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                        Ver más
                    </a>
>>>>>>> a4317df6425c1541d5d82d1f8b63f07d16cd25e1
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-lg col-span-full text-center">No hay usuarios registrados.</p>
        @endforelse
    </div>
</div>
