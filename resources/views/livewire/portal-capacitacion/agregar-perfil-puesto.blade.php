<!-- resources/views/livewire/job-description-form.blade.php -->
<div class="p-6 bg-gray-100">
        <!-- Definición del Puesto -->
        <div>
            <h2 class="text-lg font-semibold">Definición del Puesto</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Nombre del Puesto</label>
                    <input type="text" wire:model="perfil.nombre_puesto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Área al que pertenece</label>
                    <input type="text" wire:model="perfil.area" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Proceso al que pertenece</label>
                    <input type="text" wire:model="perfil.proceso" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- Misión del Puesto -->
            <div>
                <label class="block text-sm font-medium">Misión del Puesto</label>
                <textarea wire:model="perfil.mission" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Funciones Específicas -->
            <div class="mt-4">
                <label class="block text-sm font-medium">Funciones específicas del puesto</label>
            </div>

        </div>


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

        <!-- Ubicación Organizacional -->
        <div>
            <h2 class="text-lg font-semibold">Ubicación Organizacional</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Puesto al que reporta</label>
                    <input type="text" wire:model="perfil.puesto_reporta" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Puestos que le reportan</label>
                    <input type="text" wire:model="perfil.puestos_que_le_reportan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Suplencia</label>
                    <input type="text" wire:model="perfil.suplencia" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        <!-- Relaciones Internas -->
        <div>
            <h2 class="text-lg font-semibold">Relaciones Internas</h2>
        </div>
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

        <!-- Relaciones Externas -->
        <div>
            <h2 class="text-lg font-semibold">Relaciones Externas</h2>
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
                        <select wire:model="externa.{{ $i }}.id">
                                <option value="">Selecciona una relación externa</option>
                                @foreach($this->selectExterna as $course)
                                    <option value="{{ $course->id }}">{{ $course->nombre}} / {{ $course->razon_motivo}} / {{$course->frecuencia}}</option>
                                    
                                @endforeach
                            </select>
                            <x-input-error for="externa.{{ $i }}.id" />
                       
                    </div>
                </div>
    
                <div class="pt-10"></div>
            @endfor
        </div>
        
         <!-- Nivel de Autoridad -->
         <div>
            <h2 class="text-lg font-semibold">Nivel de Autoridad</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div class="flex-[2]">
                    <label class="block text-sm font-medium">Rango de toma de decisiones respecto a la calidad del producto y cumplimiento al SGC: </label>
                    <select wire:model="perfil.rango_toma_desicones" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Decisiones Directas</label>
                    <input type="text" wire:model="perfil.desiciones_directas" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        
        <!-- Responsabilidades Universales  -->
        <div>
            <h2 class="text-lg font-semibold">Responsabilidades Universales </h2>
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

                
        <!-- Perfil del puesto  -->
        <div>
            <h2 class="text-lg font-semibold">Perfil del Puesto</h2>
            <!-- Contenedor principal con diseño de grid -->
            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Rango de edad -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Rango de edad deseable</label>
                    <input type="text" wire:model="perfil.rango_edad_desable" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Sexo preferente -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Sexo preferente</label>
                    <input type="text" wire:model="perfil.sexo_preferente" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>    
        
            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Estado civil deseable -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Estado civil deseable</label>
                    <input type="text" wire:model="perfil.estado_civil_deseable" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Escolaridad -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Escolaridad</label>
                    <input type="text" wire:model="perfil.escolaridad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>    
        
            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Idioma requerido -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Idioma requerido</label>
                    <input type="text" wire:model="perfil.idioma_requerido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Experiencia requerida -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Experiencia requerida</label>
                    <input type="text" wire:model="perfil.experiencia_requerida" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Disponibilidad -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Disponibilidad</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Nivel de riesgo físico -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Nivel de riesgo físico</label>
                    <input type="text" wire:model="perfil.nivel_riesgo_fisico" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        <div>
            <h1 class="text-lg font-semibold">Formación y Habilidades Humanas</h1>
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
                        <h1>Agregar Habilidades Humanas</h1>
                    </div>
    
                    <div class="grid gap-6 mb-6 lg:grid-cols-1">
                        <select wire:model="humanas.{{ $i }}.id">
                                <option value="">Selecciona habilidad humana</option>
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

        <div>
            <h1 class="text-lg font-semibold">Formación y Habilidades Tecnicas</h1>
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
                        <h1>Agregar Habilidades Tecnicas</h1>
                    </div>
    
                    <div class="grid gap-6 mb-6 lg:grid-cols-1">
                        <select wire:model="tecnicas.{{ $i }}.id">
                                <option value="">Selecciona habilidad tecnica</option>
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

        <div class="flex grid-cols-2 gap-4 mt-2">
            <!-- Disponibilidad -->
            <div class="flex-1">
                <label class="block text-sm font-medium">Elaboro Nombre</label>
                <input type="text" wire:model="perfil.elaboro_nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
    
            <!-- Nivel de riesgo físico -->
            <div class="flex-1">
                <label class="block text-sm font-medium">Elaboro Puesto</label>
                <input type="text" wire:model="perfil.elaboro_puesto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
            
        <div class="flex grid-cols-2 gap-4 mt-2">
            <div class="flex-1">
                <label class="block text-sm font-medium">Reviso Nombre</label>
                <input type="text" wire:model="perfil.elaboro_puesto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex-1">
                <label class="block text-sm font-medium">Reviso Puesto</label>
                <input type="text" wire:model="perfil.reviso_puesto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <div class="flex grid-cols-2 gap-4 mt-2">
            <div class="flex-1">
                <label class="block text-sm font-medium">Autorizo Nombre</label>
                <input type="text" wire:model="perfil.autorizo_nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex-1">
                <label class="block text-sm font-medium">Autorizo Puesto</label>
                <input type="text" wire:model="perfil.autorizo_puesto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <div class="flex-1">
            <label class="block text-sm font-medium">Estatus</label>
            <input type="text" wire:model="perfil.status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <!-- Botón de Guardar -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
        </div>
</div>
