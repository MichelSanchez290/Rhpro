<div class="bg-white py-4 sm:py-6 min-h-screen">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto w-full lg:mx-0 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-blue-900 sm:text-4xl">Usuarios Registrados</h2>
        </div>

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
                </div>
            </li>
            @empty
            <div class="text-center text-gray-500 col-span-3 mt-6">
                <p class="text-lg">😕 No se encontraron resultados para "<strong>{{ $search }}</strong>"</p>
            </div>
            @endforelse
        </ul>
    </div>
</div>
