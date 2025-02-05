<div class="bg-gradient-to-br from-[#F9F5F3] via-[#F9F5F3] to-[#EAE7E5] p-6">

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-blue-900 sm:text-4xl">Comparar Perfiles de Puestos</h2>
    </div>

    <div class="mb-6">
        <label for="puesto" class="block text-lg font-semibold text-gray-700 mb-2">Selecciona un puesto:</label>
        <select wire:model="perfil"
            class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 bg-white shadow-md">
            <option value="">Elige un puesto...</option>
            @foreach ($puestos as $puesto)
                <option value="{{ $puesto->id }}">{{ $puesto->nombre_puesto }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-col md:flex-row min-h-screen">

        <div class="w-full md:w-1/2 p-4 flex flex-col">
            <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                <h2 class="text-3xl font-bold text-center text-indigo-700">{{ $detallePuesto->nombre_puesto ?? '---' }}
                </h2>
                <p class="text-gray-600 mt-2">Área: {{ $detallePuesto->area ?? '---' }}</p>
                <p class="text-gray-600">Proceso: {{ $detallePuesto->proceso ?? '---' }}</p>
                <p class="text-gray-600">Misión: {{ $detallePuesto->mision ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Funciones Específicas</h3>
                    <p class="text-gray-600">{{ $detallePuesto->funciones ?? '---' }}</p>
                </div>

                <p class="text-gray-600">Puesto Reporta: {{ $detallePuesto->puesto_reporta ?? '---' }}</p>
                <p class="text-gray-600">Puestos que le reportan:
                    {{ $detallePuesto->puestos_que_le_reportan ?? '---' }}</p>
                <p class="text-gray-600">Suplencia: {{ $detallePuesto->suplencia ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Relaciones Internas</h3>
                    <p class="text-gray-600">{{ $detallePuesto->relaciones_internas ?? '---' }}</p>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Relaciones Externas</h3>
                    <p class="text-gray-600">{{ $detallePuesto->relaciones_externas ?? '---' }}</p>
                </div>

                <p class="text-gray-600">Rango toma de decisiones: {{ $detallePuesto->rango_toma_desicones ?? '---' }}
                </p>
                <p class="text-gray-600">Decisiones directas: {{ $detallePuesto->decisiones_directas ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Responsabilidades Universales</h3>
                    <p class="text-gray-600">{{ $detallePuesto->responsabilidades ?? '---' }}</p>
                </div>

                <p class="text-gray-600">Rango edad deseable: {{ $detallePuesto->rango_edad ?? '---' }}</p>
                <p class="text-gray-600">Sexo preferente: {{ $detallePuesto->sexo ?? '---' }}</p>
                <p class="text-gray-600">Estado civil deseable: {{ $detallePuesto->estado_civil ?? '---' }}</p>
                <p class="text-gray-600">Escolaridad: {{ $detallePuesto->escolaridad ?? '---' }}</p>
                <p class="text-gray-600">Idioma requerido: {{ $detallePuesto->idioma ?? '---' }}</p>
                <p class="text-gray-600">Experiencia Requerida: {{ $detallePuesto->experiencia ?? '---' }}</p>
                <p class="text-gray-600">Nivel riesgo físico: {{ $detallePuesto->riesgo_fisico ?? '---' }}</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
                    <p class="text-gray-600">{{ $detallePuesto->habilidades_humanas ?? '---' }}</p>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Técnica</h3>
                    <p class="text-gray-600">{{ $detallePuesto->habilidades_tecnicas ?? '---' }}</p>
                </div>

                <p class="text-gray-600 mt-4">Estado: {{ $detallePuesto->estado ?? '---' }}</p>
            </div>
        </div>


        <div class="w-full md:w-1/2 p-4 flex flex-col">

            <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                <h2 class="text-3xl font-bold text-center text-indigo-700">Nombre del puesto: </h2>
                <p class="text-gray-600 mt-2">Área:</p>
                <p class="text-gray-600">Proceso:</p>
                <p class="text-gray-600">Misión:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Funciones Específicas</h3>
                </div>

                <p class="text-gray-600">Puesto Reporta:</p>
                <p class="text-gray-600">Puestos que le reportan:</p>
                <p class="text-gray-600">Suplencia:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Relaciones Internas</h3>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Relaciones Externas</h3>
                </div>

                <p class="text-gray-600">Rango toma de decisiones:</p>
                <p class="text-gray-600">Decisiones directas:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Responsabilidades Universales</h3>
                </div>

                <p class="text-gray-600">Rango edad deseable:</p>
                <p class="text-gray-600">Sexo preferente:</p>
                <p class="text-gray-600">Estado civil deseable:</p>
                <p class="text-gray-600">Escolaridad:</p>
                <p class="text-gray-600">Idioma requerido:</p>
                <p class="text-gray-600">Experiencia Requerida:</p>
                <p class="text-gray-600">Nivel riesgo físico:</p>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Técnica</h3>
                </div>

                <p class="text-gray-600 mt-4">Estado:</p>
            </div>
        </div>
    </div>

    <div class="mt-10 bg-blue-100 text-center py-8 px-6 rounded-lg shadow-lg w-full max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900">Conclusión Generada</h2>
        <p class="text-gray-700 mt-4 text-lg">
            {{ $conclusion ?? 'Aún no hay una conclusión generada por el sistema.' }}
        </p>

        <button class="mt-6 px-5 py-2 bg-blue-900 text-white text-sm rounded-lg hover:bg-blue-700 transition">
            Regenerar Conclusión
        </button>
    </div>

    <div class="flex justify-center gap-4 mt-6">
        <button class="px-6 py-2 text-white bg-red-600 rounded-lg shadow-md hover:bg-red-700 transition">
            Salir
        </button>

        <button class="px-6 py-2 text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700 transition">
            Asignar Capacitación
        </button>
    </div>

</div>