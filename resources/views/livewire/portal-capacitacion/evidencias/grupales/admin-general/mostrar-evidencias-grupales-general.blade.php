<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">📂 Evidencias del Grupo</h2>

    <div class="flex justify-between items-center">
        <!-- Botón de Subir Evidencia (izquierda) -->
        <button onclick="window.location.href='{{ route('agregarEvidenciasGru', Crypt::encrypt($caps_grupales_id)) }}'"
            class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 hover:shadow-lg 
                flex items-center gap-2 transition-all duration-300 transform hover:scale-105 focus:outline-none 
                focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <i class="fas fa-plus text-lg"></i>
            <span class="text-sm font-semibold">Subir evidencia</span>
        </button>

        @if ($tieneEvidenciasAprobadas)
            <!-- Contenedor para el Select y el Botón de Descargar (derecha) -->
            <div class="flex items-center gap-4">
                <!-- Selector de Participante -->
                <div class="flex flex-col gap-1">
                    <select id="participante"
                        class="border border-gray-300 rounded-lg p-2 w-49 shadow-sm focus:outline-none 
                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:shadow-md hover:scale-105 cursor-pointer bg-white">


                        <option value=""> Selecciona un participante</option>
                        @foreach ($participantes as $participante)
                            <option value="{{ Crypt::encrypt($participante->user_id) }}">{{ $participante->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón de Descargar Reconocimiento -->
                <a id="descargarBtn" href="#" onclick="return validarSeleccion()"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all transform hover:scale-105 
                    flex items-center gap-2 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                    focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                    </svg>
                    <span class="text-sm font-semibold">Descargar Reconocimiento</span>
                </a>
            </div>

            <!-- Modal -->
            <div id="modal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
                    <h2 class="text-lg font-semibold text-red-600 mb-4">⚠️ Advertencia</h2>
                    <p class="text-gray-700 mb-4">Por favor, selecciona un participante antes de descargar el
                        reconocimiento.</p>
                    <button onclick="cerrarModal()"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 
                        transition-all transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 
                        focus:ring-offset-2">
                        Cerrar
                    </button>
                </div>
            </div>

            <!-- Botón para abrir el modal -->
            <button onclick="openModal()"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all transform hover:scale-105">
                Descargar DC3 Grupo
            </button>

            <!-- Modal para capturar datos -->
            <div id="dc3Modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-6 rounded-md shadow-lg w-96">
                    <h2 class="text-lg font-bold mb-4">Datos adicionales para DC3</h2>

                    <label class="block mb-2">Nombre del Instructor:</label>
                    <input type="text" id="instructor" class="w-full border p-2 rounded-md">

                    <label class="block mt-2 mb-2">Patrón o Representante Legal:</label>
                    <input type="text" id="patron" class="w-full border p-2 rounded-md">

                    <label class="block mt-2 mb-2">Representante de los Trabajadores:</label>
                    <input type="text" id="representante" class="w-full border p-2 rounded-md">

                    <div class="mt-4 flex justify-end">
                        <button onclick="closeModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Cancelar</button>
                        <button onclick="descargarDC3Grupo()"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md">Descargar</button>
                    </div>
                </div>
            </div>

            <script>
                function openModal() {
                    document.getElementById('dc3Modal').classList.remove('hidden');
                }

                function closeModal() {
                    document.getElementById('dc3Modal').classList.add('hidden');
                }

                function descargarDC3Grupo() {
                    let instructor = document.getElementById('instructor').value;
                    let patron = document.getElementById('patron').value;
                    let representante = document.getElementById('representante').value;

                    if (!instructor || !patron || !representante) {
                        alert("Todos los campos son obligatorios.");
                        return;
                    }

                    let url = `{{ route('descargar.dc3.grupo', Crypt::encrypt($caps_grupales_id)) }}`;
                    url +=
                        `?instructor=${encodeURIComponent(instructor)}&patron=${encodeURIComponent(patron)}&representante=${encodeURIComponent(representante)}`;

                    window.location.href = url;
                    closeModal();
                }

                function actualizarEnlace() {
                    let participanteId = document.getElementById("participante").value;
                    let descargarBtn = document.getElementById("descargarBtn");

                    if (participanteId) {
                        let baseUrl =
                            "{{ route('descargar.reconocimiento.admin', ['caps_grupales_id' => Crypt::encrypt($caps_grupales_id), 'participante_id' => 'PARTICIPANTE_ID']) }}";
                        descargarBtn.href = baseUrl.replace('PARTICIPANTE_ID', participanteId);
                    } else {
                        descargarBtn.href = "#";
                    }
                }

                function validarSeleccion() {
                    let participanteId = document.getElementById("participante").value;
                    if (!participanteId) {
                        mostrarModal();
                        return false;
                    }
                    return true;
                }

                function mostrarModal() {
                    document.getElementById("modal").classList.remove("hidden");
                }

                function cerrarModal() {
                    document.getElementById("modal").classList.add("hidden");
                }
            </script>
        @endif
    </div>

    <div class="space-y-8 mt-5">
        <!-- 📌 Evidencias Aprobadas Agrupadas -->
        @if ($evidencias_aprobadas->count() > 0)
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-green-500">
                <h3 class="text-xl font-semibold text-green-600">✅ Evidencias Aprobadas</h3>
                @foreach ($evidencias_aprobadas->groupBy('comentarios') as $comentario => $grupoEvidencias)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                        <p class="text-gray-600 text-gr">📅 <span class="font-semibold">Fecha:</span>
                            {{ $grupoEvidencias->first()->fecha }}</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            @foreach ($grupoEvidencias as $evidencia)
                                <img src="{{ asset('storage/' . $evidencia->evidencias) }}"
                                    class="w-full h-40 object-cover rounded-lg shadow">
                            @endforeach
                        </div>
                        @php
                            $documentosAsociados = $documentos->whereIn('evidencia_id', $grupoEvidencias->pluck('id'));
                        @endphp
                        @if ($documentosAsociados->count() > 0)
                            <h4 class="text-md font-semibold mt-3">📄 Documentos PDF</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                                @foreach ($documentosAsociados as $doc)
                                    <iframe src="{{ asset('storage/' . $doc->urlEsca) }}"
                                        class="w-full h-48 border rounded-lg"></iframe>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <!-- 📌 Evidencias Rechazadas Agrupadas -->
        @if ($evidencias_rechazadas->count() > 0)
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-red-500">
                <h3 class="text-xl font-semibold text-red-600">❌ Evidencias Rechazadas</h3>
                @foreach ($evidencias_rechazadas->groupBy('comentarios') as $comentario => $grupoEvidencias)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                        <p class="text-gray-700 font-medium">📝 <span class="font-semibold">Comentario:</span>
                            {{ $comentario }}</p>
                        <p class="text-gray-600 text-gr">📅 <span class="font-semibold">Fecha:</span>
                            {{ $grupoEvidencias->first()->fecha }}</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            @foreach ($grupoEvidencias as $evidencia)
                                <img src="{{ asset('storage/' . $evidencia->evidencias) }}"
                                    class="w-full h-40 object-cover rounded-lg shadow">
                            @endforeach
                        </div>
                        @php
                            $documentosAsociados = $documentos->whereIn('evidencia_id', $grupoEvidencias->pluck('id'));
                        @endphp
                        @if ($documentosAsociados->count() > 0)
                            <h4 class="text-md font-semibold mt-3">📄 Documentos PDF</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                                @foreach ($documentosAsociados as $doc)
                                    <iframe src="{{ asset('storage/' . $doc->urlEsca) }}"
                                        class="w-full h-48 border rounded-lg"></iframe>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <!-- 📌 Evidencias Pendientes -->
        @if ($evidencias_pendientes->count() > 0)
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-yellow-400">
                <h3 class="text-xl font-semibold text-yellow-600">⚠️ Evidencias Pendientes</h3>
                <div class="flex space-x-4 mb-6 mt-3">
                    <button wire:click="aprobarEvidencias"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">✅
                        Aprobar</button>
                    <button onclick="document.getElementById('comentarioModal').classList.remove('hidden')"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">❌
                        Rechazar</button>
                </div>

                <!-- Modal de Comentario -->
                <div id="comentarioModal"
                    class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <h3 class="text-lg font-bold mb-2">Motivo del rechazo</h3>
                        <textarea id="comentarioInput" class="w-full p-2 border rounded-lg" placeholder="Escribe el motivo..."></textarea>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button onclick="document.getElementById('comentarioModal').classList.add('hidden')"
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg">Cancelar</button>
                            <button wire:click="rechazarEvidencias(document.getElementById('comentarioInput').value)"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg">Enviar</button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($evidencias_pendientes as $evidencia)
                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <img src="{{ asset('storage/' . $evidencia->evidencias) }}"
                                class="w-full h-40 object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
                @php
                    $documentosAsociados = $documentos->whereIn('evidencia_id', $grupoEvidencias->pluck('id'));
                @endphp
                @if ($documentosAsociados->count() > 0)
                    <h4 class="text-md font-semibold mt-3">📄 Documentos PDF</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                        @foreach ($documentosAsociados as $doc)
                            <iframe src="{{ asset('storage/' . $doc->urlEsca) }}"
                                class="w-full h-48 border rounded-lg"></iframe>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
