<!-- resources/views/livewire/job-description-form.blade.php -->
<div class="p-6 bg-gray-100">
        <!-- Definición del Puesto -->
        <div>
            <h2 class="text-lg font-semibold">Definición del Puesto</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Nombre del Puesto</label>
                    <input type="text" wire:model="jobTitle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Área al que pertenece</label>
                    <input type="text" wire:model="department" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Proceso al que pertenece</label>
                    <input type="text" wire:model="process" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- Misión del Puesto -->
            <div>
                <label class="block text-sm font-medium">Misión del Puesto</label>
                <textarea wire:model="mission" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Funciones Específicas -->
            <div class="mt-4">
                <label class="block text-sm font-medium">Funciones específicas del puesto</label>
                <textarea wire:model="specificFunctions" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

        </div>

        <!-- Ubicación Organizacional -->
        <div>
            <h2 class="text-lg font-semibold">Ubicación Organizacional</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium">Puesto al que reporta</label>
                    <input type="text" wire:model="reportsTo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Puestos que le reportan</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium">Suplencia</label>
                    <input type="text" wire:model="substitution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        <!-- Relaciones Internas -->
        <div>
            <h2 class="text-lg font-semibold">Relaciones Internas</h2>
            <div class="flex space-x-4 mt-4 gap-2">
                <!-- Puesto -->
                <div class="flex-[2]">
                    <label class="block text-sm font-medium">Puesto</label>
                    <input type="text" wire:model="externalPosition" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Razón o motivo (más grande) -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Razón o motivo</label>
                    <input type="text" wire:model="externalReason" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Frecuencia (select) -->
                <div class="flex-[2]">
                    <label class="block text-sm font-medium">Frecuencia</label>
                    <select wire:model="externalFrequency" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Relaciones Externas -->
        <div>
            <h2 class="text-lg font-semibold">Relaciones Externas</h2>
            <div class="flex space-x-4 mt-4 gap-2">
                <!-- Puesto -->
                <div class="flex-[2]">
                    <label class="block text-sm font-medium">Puesto</label>
                    <input type="text" wire:model="externalPosition" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Razón o motivo (más grande) -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Razón o motivo</label>
                    <input type="text" wire:model="externalReason" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Frecuencia (select) -->
                <div class="flex-[2]">
                    <label class="block text-sm font-medium">Frecuencia</label>
                    <select wire:model="externalFrequency" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
            </div>
        </div>
        
         <!-- Nivel de Autoridad -->
         <div>
            <h2 class="text-lg font-semibold">Nivel de Autoridad</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <div class="flex-[2]">
                    <label class="block text-sm font-medium">Rango de toma de decisiones respecto a la calidad del producto y cumplimiento al SGC: </label>
                    <select wire:model="externalFrequency" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Decisiones Directas</label>
                    <input type="text" wire:model="substitution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        
        <!-- Responsabilidades Universales  -->
        <div>
            <h2 class="text-lg font-semibold">Responsabilidades Universales </h2>
            <div class="flex space-x-4 mt-4 gap-2">
                <div class="flex-1">
                    <label class="block text-sm font-medium">Sistema</label>
                    <input type="text" wire:model="reportsTo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium">Responsabilidad</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

                
        <!-- Perfil del puesto  -->
        <div>
            <h2 class="text-lg font-semibold">Perfil del Puesto</h2>
            <!-- Contenedor principal con diseño de grid -->
            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Rango de edad -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Rango de edad deseable</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Sexo preferente -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Sexo preferente</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>    
        
            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Estado civil deseable -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Estado civil deseable</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Escolaridad -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Escolaridad</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>    
        
            <div class="flex grid-cols-2 gap-4 mt-2">
                <!-- Idioma requerido -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Idioma requerido</label>
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
        
                <!-- Experiencia requerida -->
                <div class="flex-1">
                    <label class="block text-sm font-medium">Experiencia requerida</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
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
                    <input type="text" wire:model="subordinates" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>
        
        <!-- Botón de Guardar -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
        </div>
</div>
