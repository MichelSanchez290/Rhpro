<div class="relative max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 border border-gray-200">
    <button class="absolute top-3 right-3 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-full" wire:click="cerrar()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>          
    </button>

    <h2 class="text-3xl font-bold text-center text-indigo-700">{{ $puestoSeleccionado->nombre_puesto }}</h2>
    <p class="text-gray-600 mt-2"><strong>Área:</strong> {{ $puestoSeleccionado->area }}</p>
    <p class="text-gray-600"><strong>Proceso:</strong> {{ $puestoSeleccionado->proceso }}</p>
    <p class="text-gray-600"><strong>Misión:</strong> {{ $puestoSeleccionado->mision }}</p>

    <div class="mt-4">
        <h3 class="text-lg font-semibold text-indigo-600">Funciones Especificas</h3>
        @if($puestoSeleccionado->funcionesEspecificas->isNotEmpty())
            <ul class="list-disc list-inside text-gray-600 ml-4">
                @foreach($puestoSeleccionado->funcionesEspecificas as $relacion)
                    <li><strong>Nombre:</strong> {{ $relacion->nombre }}</li>
                    <hr class="my-2 border-gray-300">
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No se han asignado funciones especificas a este puesto.</p>
        @endif
    </div>

    <p class="text-gray-600"><strong>Puesto Reporta:</strong> {{ $puestoSeleccionado->puesto_reporta }}</p>
    <p class="text-gray-600"><strong>Puestos que le reportan:</strong> {{ $puestoSeleccionado->puestos_que_le_reportan }}</p>
    <p class="text-gray-600"><strong>Suplencia:</strong> {{ $puestoSeleccionado->suplencia }}</p>

    <!-- Relaciones Internas -->
    <div class="mt-4">
        <h3 class="text-lg font-semibold text-indigo-600">Relaciones Internas</h3>
        @if($puestoSeleccionado->relacionesInternas->isNotEmpty())
            <ul class="list-disc list-inside text-gray-600 ml-4">
                @foreach($puestoSeleccionado->relacionesInternas as $relacion)
                    <li><strong>Puesto:</strong> {{ $relacion->puesto }}</li>
                    <li><strong>Razón o motivo:</strong> {{ $relacion->razon_motivo }}</li>
                    <li><strong>Frecuencia:</strong> {{ $relacion->frecuencia }}</li>
                    <hr class="my-2 border-gray-300">
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No se han asignado relaciones internas a este puesto.</p>
        @endif
    </div>

    <!-- Relaciones Externas -->
    <div class="mt-4">
        <h3 class="text-lg font-semibold text-indigo-600">Relaciones Externas</h3>
        @if($puestoSeleccionado->relacionesExternas->isNotEmpty())
            <ul class="list-disc list-inside text-gray-600 ml-4">
                @foreach($puestoSeleccionado->relacionesExternas as $relacion)
                    <li><strong>Nombre:</strong> {{ $relacion->nombre }}</li>
                    <li><strong>Razón o motivo:</strong> {{ $relacion->razon_motivo }}</li>
                    <li><strong>Frecuencia:</strong> {{ $relacion->frecuencia }}</li>
                    <hr class="my-2 border-gray-300">
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No se han asignado relaciones externas a este puesto.</p>
        @endif
    </div>

    <p class="text-gray-600"><strong>Rango toma de desiciones:</strong> {{ $puestoSeleccionado->rango_toma_desicones }}</p>
    <p class="text-gray-600"><strong>Decisiones directas:</strong> {{ $puestoSeleccionado->desiciones_directas }}</p>

     <!-- Responsabilidades Universales -->
    <div class="mt-4">
        <h3 class="text-lg font-semibold text-indigo-600">Responsabilidades Universales</h3>
        @if($puestoSeleccionado->responsabilidadesUniversales->isNotEmpty())
            <ul class="list-disc list-inside text-gray-600 ml-4">
                @foreach($puestoSeleccionado->responsabilidadesUniversales as $resp)
                    <li><strong>Sistema:</strong> {{ $resp->sistema }}</li>
                    <li><strong>Responsabilidad:</strong> {{ $resp->responsalidad }}</li>
                    <hr class="my-2 border-gray-300">
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No se han asignado responsabilidades universales a este puesto.</p>
        @endif
    </div>

    <p class="text-gray-600"><strong>Rango edad deseable:</strong> {{ $puestoSeleccionado->rango_edad_desable }}</p>
    <p class="text-gray-600"><strong>Sexo preferente:</strong> {{ $puestoSeleccionado->sexo_preferente }}</p>
    <p class="text-gray-600"><strong>Estado civil deseable:</strong> {{ $puestoSeleccionado->estado_civil_deseable }}</p>
    <p class="text-gray-600"><strong>Escolaridad:</strong> {{ $puestoSeleccionado->escolaridad }}</p>
    <p class="text-gray-600"><strong>Idioma requerido:</strong> {{ $puestoSeleccionado->idioma_requerido }}</p>
    <p class="text-gray-600"><strong>Experiencia Requerida:</strong> {{ $puestoSeleccionado->experiencia_requerida }}</p>
    <p class="text-gray-600"><strong>Nivel riesgo fisico:</strong> {{ $puestoSeleccionado->nivel_riesgo_fisico }}</p>
    
    <!-- Formación Habilidad Humana -->
    <div class="mt-4">
        <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
        @if($puestoSeleccionado->habilidadesHumanas->isNotEmpty())
            <ul class="list-disc list-inside text-gray-600 ml-4">
                @foreach($puestoSeleccionado->habilidadesHumanas as $habilidad)
                    <li><strong>Descripción:</strong> {{ $habilidad->descripcion }}</li>
                    <li><strong>Nivel:</strong> {{ $habilidad->nivel }}</li>
                    <hr class="my-2 border-gray-300">
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No se han asignado habilidades humanas a este puesto.</p>
        @endif
    </div>

    <!-- Formación Habilidad Técnica -->
    <div class="mt-4">
        <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Técnica</h3>
        @if($puestoSeleccionado->habilidadesTecnicas->isNotEmpty())
            <ul class="list-disc list-inside text-gray-600 ml-4">
                @foreach($puestoSeleccionado->habilidadesTecnicas as $habilidad)
                    <li><strong>Descripción:</strong> {{ $habilidad->descripcion }}</li>
                    <li><strong>Nivel:</strong> {{ $habilidad->nivel }}</li>
                    <hr class="my-2 border-gray-300">
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No se han asignado habilidades técnicas a este puesto.</p>
        @endif
    </div>

    <p class="text-gray-600">
        <strong>Estado:</strong> 
        <span class="px-2 py-1 rounded-md text-white 
            {{ $puestoSeleccionado->status == 'Aprobado' ? 'bg-green-500' : ($puestoSeleccionado->status == 'Corregir' ? 'bg-yellow-500' : ($puestoSeleccionado->status == 'Rechazado' ? 'bg-red-500' : 'bg-gray-500')) }}">
            {{ $puestoSeleccionado->status }}
        </span>
    </p>
    

</div>
