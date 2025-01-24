<style>
    .bannerFondo {
        height: 400px;
    }
</style>
<x-app-layout>
    <div>
        <div class="bannerFondo bg-green-800	bg-left-top bg-auto bg-repeat-x"
            style="background-image: url(./img/continuartl_4.png)">
        </div>

        <div class="-mt-64 ">
            <div class="w-full text-center">
                <p class="text-sm tracking-widest text-white">Sistema</p>
                <h1 class="font-bold text-5xl text-white">
                    Rh Pro
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 ">

                <div class="p-2 sm:p-10 text-center cursor-pointer">
                    {{-- poner nombre de la ruta --}}
                    <a href="{{ route('inicio') }}">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500  bg-white">
                            <div class="space-y-10">
                                <i class="fa fa-spa" style="font-size:48px;"></i>

                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Módulo Recursos Humanos</div>
                                        <p class="text-gray-700 text-base">
                                            Todo tipo de masajes y técnicas
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-2 sm:p-10 text-center cursor-pointer text-white">
                    {{-- poner nombre de la ruta --}}
                    <a href="{{ route('dashboardaf') }}">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-orange-500 hover:bg-orange-600 transition duration-500">
                            <div class="space-y-10">
                                <i class="fa fa-head-side-mask" style="font-size:48px;"></i>
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Módulo Activo Fijo</div>
                                        <p class="text-base">
                                            Altos estandares de bioseguridad
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-2 sm:p-10 text-center cursor-pointer translate-x-2">
                    {{-- poner nombre de la ruta --}}
                    <a href="">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-white ">
                            <div class="space-y-10">
                                <i class="fa fa-swimmer" style="font-size:48px;"></i>

                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Módulo Portal Capacitacion</div>
                                        <p class="text-gray-700 text-base">
                                            Piscina temperada
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 ">

                <div class="p-2 sm:p-10 text-center cursor-pointer">
                    {{-- poner nombre de la ruta --}}
                    <a href="">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500  bg-white">
                            <div class="space-y-10">
                                <i class="fa fa-spa" style="font-size:48px;"></i>

                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Módulo Dx035</div>
                                        <p class="text-gray-700 text-base">
                                            Todo tipo de masajes y técnicas
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-2 sm:p-10 text-center cursor-pointer text-white">
                    {{-- poner nombre de la ruta --}}
                    <a href="">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-orange-500 hover:bg-orange-600 transition duration-500">
                            <div class="space-y-10">
                                <i class="fa fa-head-side-mask" style="font-size:48px;"></i>
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Módulo Encuesta 360</div>
                                        <p class="text-base">
                                            Altos estandares de bioseguridad
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-2 sm:p-10 text-center cursor-pointer translate-x-2">
                    {{-- poner nombre de la ruta --}}
                    <a href="">
                        <div
                            class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-white ">
                            <div class="space-y-10">
                                <i class="fa fa-swimmer" style="font-size:48px;"></i>

                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Módulo CRM</div>
                                        <p class="text-gray-700 text-base">
                                            Piscina temperada
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
