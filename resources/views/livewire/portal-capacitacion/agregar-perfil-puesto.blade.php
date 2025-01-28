<div class="w-full">
    <!-- Background Gradient -->
    <div class="bg-gradient-to-b from-blue-800 to-blue-600 h-96"></div>
    
    <!-- Container -->
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <!-- Form Card -->
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
            <!-- Title -->
            <p class="text-3xl font-bold leading-7 text-center">Perfil de Puestos</p>
            
            <!-- Form -->
            <form>
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Nombre de puesto</label>
                        <input type="text" wire:model="perfil.nombre_puesto" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Área al que pertenece</label>
                        <input type="text" wire:model="perfil.area" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Proceso al que pertenece</label>
                        <input type="text" wire:model="perfil.proceso" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Misión del Puesto</label>
                    <textarea type="text" wire:model="perfil.mision" class="h-40 text-base leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"></textarea>
                </div>

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Funciones específicas del puesto</label>

                    <button wire:click="agregarFuncion" type="button" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Agregar un Funciones Especificas 
                    </button>
                    @for($i = 0; $i < $numerofuncion; $i++)
                        <div class="transition-all duration-300 bg-gray-100 p-4 rounded-lg shadow-lg border-l-4 border-r-4  border-blue-600">
                            <div class="flex justify-end">
                                <button wire:click="eliminarFunciones({{ $i }})" type="button" class="break-inside bg-[#D20939] rounded-xl p-4 mb-4">
                                     <div class="flex items-center space-x-4">
                                        <i class="fa-solid fa-folder-minus text-white fa-xl"></i>
                                        <span class="text-base font-medium text-white">Eliminar</span>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-4 text-center font-bold rounded-md text-white bg-blue-700 text-2xl">
                                <h1>Funciones Especificas Agregar</h1>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <select wire:model="funciones.{{ $i }}.id">
                                    <option value="">Selecciona una función</option>
                                    @foreach($this->selectFuncion as $course)
                                        <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="funciones.{{ $i }}.id" />
               
                            </div>
                        </div>

                        <div class="pt-10"></div>
                    @endfor
                </div>

                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Puesto al que reporta</label>
                        <input type="text" wire:model="perfil.puesto_reporta" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Puestos que le reportan</label>
                        <input type="text" wire:model="perfil.puestos_que_le_reportan" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Suplencia</label>
                        <input type="text" wire:model="perfil.suplencia" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Relaciones Internas</label>

                    <button wire:click="agregarInterna" type="button" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Agregar una Relacion Interna
                    </button>
                    @for($i = 0; $i < $numerointerna; $i++)
                        <div class="transition-all duration-300 bg-gray-100 p-4 rounded-lg shadow-lg border-l-4 border-r-4  border-blue-600">
                            <div class="flex justify-end">
                                <button wire:click="eliminarInternas({{ $i }})" type="button" class="break-inside bg-[#D20939] rounded-xl p-4 mb-4">
                                     <div class="flex items-center space-x-4">
                                        <i class="fa-solid fa-folder-minus text-white fa-xl"></i>
                                        <span class="text-base font-medium text-white">Eliminar</span>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-4 text-center font-bold rounded-md text-white bg-blue-700 text-2xl">
                                <h1>Agregar Relaciones Internas</h1>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <select wire:model="internas.{{ $i }}.id">
                                    <option value="">Selecciona una relación interna</option>
                                    @foreach($this->selectInterna as $course)
                                        <option value="{{ $course->id }}">{{ $course->puesto}} / {{ $course->razon_motivo}} / {{$course->frecuencia}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="internas.{{ $i }}.id" />
                            </div>
                        </div>
                        <div class="pt-10"></div>
                    @endfor
                </div>

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Relaciones Externas</label>

                    <button wire:click="agregarExterna" type="button" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Agregar una Relacion Externa
                    </button>
                    @for($i = 0; $i < $numeroexterna; $i++)
                        <div class="transition-all duration-300 bg-gray-100 p-4 rounded-lg shadow-lg border-l-4 border-r-4  border-blue-600">
                            <div class="flex justify-end">
                                <button wire:click="eliminarExternas({{ $i }})" type="button" class="break-inside bg-[#D20939] rounded-xl p-4 mb-4">
                                     <div class="flex items-center space-x-4">
                                        <i class="fa-solid fa-folder-minus text-white fa-xl"></i>
                                        <span class="text-base font-medium text-white">Eliminar</span>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-4 text-center font-bold rounded-md text-white bg-blue-700 text-2xl">
                                <h1>Agregar Relaciones Externas</h1>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <select wire:model="externas.{{ $i }}.id">
                                    <option value="">Selecciona una relación externa</option>
                                    @foreach($this->selectExterna as $course)
                                        <option value="{{ $course->id }}">{{ $course->nombre}} / {{ $course->razon_motivo}} / {{$course->frecuencia}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="externas.{{ $i }}.id" />
                            </div>
                        </div>
                        <div class="pt-10"></div>
                    @endfor
                </div>

                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Rango de toma de decisiones</label>
                        <select wire:model="perfil.rango_toma_desicones" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Decisiones directas</label>
                        <input type="text" wire:model="perfil.desiciones_directas" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Responsabilidades Universales</label>

                    <button wire:click="agregarResponsabilidades" type="button" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Agregar una Responsabilidad Universal 
                    </button>
                    @for($i = 0; $i < $numeroresponsabilidad; $i++)
                        <div class="transition-all duration-300 bg-gray-100 p-4 rounded-lg shadow-lg border-l-4 border-r-4  border-blue-600">
                            <div class="flex justify-end">
                                <button wire:click="eliminarResponsabilidades({{ $i }})" type="button" class="break-inside bg-[#D20939] rounded-xl p-4 mb-4">
                                     <div class="flex items-center space-x-4">
                                        <i class="fa-solid fa-folder-minus text-white fa-xl"></i>
                                        <span class="text-base font-medium text-white">Eliminar</span>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-4 text-center font-bold rounded-md text-white bg-blue-700 text-2xl">
                                <h1>Agregar Responsabilidades Universales</h1>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <select wire:model="responsabilidades.{{ $i }}.id">
                                    <option value="">Selecciona una responsabilidad universal</option>
                                    @foreach($this->selectResponsabilidad as $course)
                                        <option value="{{ $course->id }}">{{ $course->sistema}} / {{ $course->responsalidad}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="responsabilidades.{{ $i }}.id" />
                            </div>
                        </div>
                        <div class="pt-10"></div>
                    @endfor
                </div> 

                <div>
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">Rango de edad deseable</label>
                            <input type="text" wire:model="perfil.rango_edad_desable" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">Sexo</label>
                            <select wire:model="perfil.sexo_preferente" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Indistinto">Indistinto</option>
                                <option value="Mujer">Mujer</option>
                                <option value="Hombre">Hombre</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">Estado civil deseable</label>
                            <select wire:model="perfil.estado_civil_deseable" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Indistinto">Indistinto</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">Escolaridad</label>
                            <select wire:model="perfil.escolaridad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Preparatoria">Preparatoria</option>
                                <option value="Oficio">Oficio</option>
                                <option value="Carrera Corta">Carrera Corta</option>
                                <option value="Carrera Técnica">Carrera Técnica</option>
                                <option value="Licenciatura/Ingeniería: Sistemas, IT o afin.">Licenciatura/Ingeniería: Sistemas, IT o afin.</option>
                                <option value="Maestría deseable">Maestría deseable</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">Idioma requerido</label>
                            <select wire:model="perfil.idioma_requerido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Ingles B1">Ingles B1</option>
                                <option value="Aleman (deseable)">Aleman (deseable)</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">Experiencia requerida</label>
                            <input type="text" wire:model="perfil.experiencia_requerida" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                        </div>
                    </div>

                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">Nivel de riesgo fisico</label>
                            <select wire:model="perfil.nivel_riesgo_fisico" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Alto">Alto</option>
                                <option value="Moderado">Moderado</option>
                                <option value="Bajo">Bajo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Formación y Habilidades Humanas</label>

                    <button wire:click="agregarHumanas" type="button" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Agregar una Habilidad Humana 
                    </button>
                    @for($i = 0; $i < $numerohumana; $i++)
                        <div class="transition-all duration-300 bg-gray-100 p-4 rounded-lg shadow-lg border-l-4 border-r-4  border-blue-600">
                            <div class="flex justify-end">
                                <button wire:click="eliminarHumanas({{ $i }})" type="button" class="break-inside bg-[#D20939] rounded-xl p-4 mb-4">
                                     <div class="flex items-center space-x-4">
                                        <i class="fa-solid fa-folder-minus text-white fa-xl"></i>
                                        <span class="text-base font-medium text-white">Eliminar</span>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-4 text-center font-bold rounded-md text-white bg-blue-700 text-2xl">
                                <h1>Agregar Formación y Habilidades Humanas</h1>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <select wire:model="humanas.{{ $i }}.id">
                                    <option value="">Selecciona una habilidad humana</option>
                                    @foreach($this->selectHumana as $course)
                                        <option value="{{ $course->id }}">{{ $course->descripcion}} / {{ $course->nivel}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="humanas.{{ $i }}.id" />
                            </div>
                        </div>
                        <div class="pt-10"></div>
                    @endfor
                </div> 

                <div class="w-full flex flex-col mt-8">
                    <label class="font-semibold leading-none">Formación y Habilidades Tecnicas</label>

                    <button wire:click="agregarTecnicas" type="button" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Agregar una Habilidad Tecnica 
                    </button>
                    @for($i = 0; $i < $numerotecnica; $i++)
                        <div class="transition-all duration-300 bg-gray-100 p-4 rounded-lg shadow-lg border-l-4 border-r-4  border-blue-600">
                            <div class="flex justify-end">
                                <button wire:click="eliminarTecnicas({{ $i }})" type="button" class="break-inside bg-[#D20939] rounded-xl p-4 mb-4">
                                     <div class="flex items-center space-x-4">
                                        <i class="fa-solid fa-folder-minus text-white fa-xl"></i>
                                        <span class="text-base font-medium text-white">Eliminar</span>
                                    </div>
                                </button>
                            </div>
                            <div class="mb-4 text-center font-bold rounded-md text-white bg-blue-700 text-2xl">
                                <h1>Agregar Formación y Habilidades Tecnicas</h1>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <select wire:model="tecnicas.{{ $i }}.id">
                                    <option value="">Selecciona una habilidad tecnica</option>
                                    @foreach($this->selectTecnica as $course)
                                        <option value="{{ $course->id }}">{{ $course->descripcion}} / {{ $course->nivel}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="tecnicas.{{ $i }}.id" />
                            </div>
                        </div>
                        <div class="pt-10"></div>
                    @endfor
                </div> 

                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Elaboro Nombre</label>
                        <input type="text" wire:model="perfil.elaboro_nombre" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Elaboro Puesto</label>
                        <input type="text" wire:model="perfil.elaboro_puesto" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Reviso Nombre</label>
                        <input type="text" wire:model="perfil.reviso_nombre" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Reviso Puesto</label>
                        <input type="text" wire:model="perfil.reviso_puesto" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Autorizo Nombre</label>
                        <input type="text" wire:model="perfil.autorizo_nombre" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Autorizo Puesto</label>
                        <input type="text" wire:model="perfil.autorizo_puesto" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <!-- Subject -->
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label class="font-semibold leading-none">Status</label>
                        <input type="text" wire:model="perfil.status" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-center w-full">
                    <button class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                        Guardar Información
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

