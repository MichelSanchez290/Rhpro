<div class="h-full bg-gray-200 p-8">
    <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>

            <div class="flex flex-col items-center -mt-20">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile.jpg" class="w-40 border-4 border-white rounded-full">
                    <div class="flex items-center space-x-2 mt-2">
                        <p class="text-2xl">Nombre: {{ $userSeleccionado->name }}</p>
                        <span class="bg-blue-500 rounded-full p-1" title="Verified">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="text-gray-700">Puesto: {{ $userSeleccionado->puesto }} Ingeniero de sistemas</p>
                    <p class="text-sm text-gray-500">Correo electronico: {{ $userSeleccionado->email }}</p>
            </div>
            <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                    <button wire:click="comparar()" class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                        </svg>                          
                        <span>Comparar</span>
                    </button>

                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>                          
                        <span>Evaluar</span>
                    </button>
            </div>
            </div>
    </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="w-full flex flex-col 2xl:w-1/3">
            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-3xl font-bold text-center text-indigo-700">Nombre del puesto: </h2>
                    <p class="text-gray-600 mt-2">Área:</p>
                    <p class="text-gray-600">Proceso:</p>
                    <p class="text-gray-600">Misión:</p>

                   <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Funciones Especificas</h3>
                    </div>

                    <p class="text-gray-600">Puesto Reporta:</p>
                    <p class="text-gray-600">Puestos que le reportan:</p>
                    <p class="text-gray-600">Suplencia:</p>

                    <!-- Relaciones Internas -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Relaciones Internas</h3>
                    </div>

                    <!-- Relaciones Externas -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Relaciones Externas</h3>
                    </div>

                    <p class="text-gray-600">Rango toma de desiciones:</p>
                    <p class="text-gray-600">Decisiones directas:</p>

                    <!-- Responsabilidades Universales -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Responsabilidades Universales</h3>        
                    </div>

                    <p class="text-gray-600">Rango edad deseable:</p>
                    <p class="text-gray-600">Sexo preferente:</p>
                    <p class="text-gray-600">Estado civil deseable:</p>
                    <p class="text-gray-600">Escolaridad:</p>
                    <p class="text-gray-600">Idioma requerido:</p>
                    <p class="text-gray-600">Experiencia Requerida:</p>
                    <p class="text-gray-600">Nivel riesgo fisico:</p>
                    
                    <!-- Formación Habilidad Humana -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
                        
                    </div>

                    <!-- Formación Habilidad Técnica -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Técnica</h3>    
                    </div>

                    <p class="text-gray-600">
                        Estado:    
                    </p>
            </div>

    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
            <h4 class="text-xl text-gray-900 font-bold">Registros Patronales</h4>       
        </div>
    </div>

            <div class="flex flex-col w-full 2xl:w-2/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Departamentos</h4>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="flex items-center justify-between">
                <h4 class="text-xl text-gray-900 font-bold">Sucursales</h4>
            </div>
        </div>
</div>
