<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">📁 Evidencias de la Capacitación Individual</h2>

    <div class="flex space-x-4">
        <div class="flex space-x-4">
            <a href="{{ route('agregarEvidenciasIndTrabajador', Crypt::encrypt($caps_individuales_id)) }}"
                class="bg-green-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700 hover:shadow-lg 
                flex items-center gap-2 transition-all duration-300 transform hover:scale-105 focus:outline-none">
                <i class="fas fa-plus text-lg"></i>
                <span class="text-sm font-semibold">Subir evidencia</span>
            </a>
        </div>

        @if ($tieneEvidenciasAprobadas)
            <!-- Botón de Descargar Reconocimiento -->
            <a href="{{ route('descargar.reconocimiento.ind', Crypt::encrypt($caps_individuales_id)) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all transform hover:scale-105 
                flex items-center gap-2 shadow-md hover:shadow-lg focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="text-sm font-semibold">Descargar Reconocimiento</span>
            </a>

            <!-- Botón para abrir el modal -->
            <button onclick="openModal()"
                class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-all transform hover:scale-105 
                flex items-center gap-2 shadow-md hover:shadow-lg focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M9 21V3m6 18V3" />
                </svg>
                <span class="text-sm font-semibold">Descargar DC3</span>
            </button>

            <!-- Modal -->
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
                        <button onclick="descargarDC3()"
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

                function descargarDC3() {
                    let instructor = document.getElementById('instructor').value;
                    let patron = document.getElementById('patron').value;
                    let representante = document.getElementById('representante').value;

                    if (!instructor || !patron || !representante) {
                        alert("Todos los campos son obligatorios.");
                        return;
                    }

                    let url = `{{ route('descargar.dc3', ['id' => Crypt::encrypt($caps_individuales_id)]) }}`;
                    url +=
                        `?instructor=${encodeURIComponent(instructor)}&patron=${encodeURIComponent(patron)}&representante=${encodeURIComponent(representante)}`;

                    window.location.href = url;
                    closeModal();
                }
            </script>
        @endif

    </div>

    <div class="space-y-8 mt-5">
        <!-- 📌 Evidencias Aprobadas Agrupadas -->
        @if ($evidenciasAprobadas->count() > 0)
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-green-500">
                <h3 class="text-xl font-semibold text-green-600">✅ Evidencias Aprobadas</h3>
                @foreach ($evidenciasAprobadas->groupBy('comentarios') as $comentario => $grupoEvidencias)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                        <p class="text-gray-600 text-gr">📅 <span class="font-semibold">Fecha:</span>
                            {{ $grupoEvidencias->first()->fecha }}</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            @foreach ($grupoEvidencias as $evidencia)
                                <img src="{{ asset('storage/' . $evidencia->evidencias) }}"
                                    class="w-full h-40 object-cover rounded-lg shadow cursor-pointer hover:scale-105 transition-all duration-300"
                                    onclick="mostrarImagen('{{ asset('storage/' . $evidencia->evidencias) }}')">
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
        @if ($evidenciasRechazadas->count() > 0)
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-red-500">
                <h3 class="text-xl font-semibold text-red-600">❌ Evidencias Rechazadas</h3>
                @foreach ($evidenciasRechazadas->groupBy('comentarios') as $comentario => $grupoEvidencias)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                        <p class="text-gray-700 font-medium">📝 <span class="font-semibold">Comentario:</span>
                            {{ $comentario }}</p>
                        <p class="text-gray-600 text-gr">📅 <span class="font-semibold">Fecha:</span>
                            {{ $grupoEvidencias->first()->fecha }}</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
                            @foreach ($grupoEvidencias as $evidencia)
                                <img src="{{ asset('storage/' . $evidencia->evidencias) }}"
                                    class="w-full h-40 object-cover rounded-lg shadow cursor-pointer hover:scale-105 transition-all duration-300"
                                    onclick="mostrarImagen('{{ asset('storage/' . $evidencia->evidencias) }}')">
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
        @if ($evidenciasPendientes->count() > 0)
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
                    @foreach ($evidenciasPendientes as $evidencia)
                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <img src="{{ asset('storage/' . $evidencia->evidencias) }}"
                                class="w-full h-40 object-cover rounded-lg shadow cursor-pointer hover:scale-105 transition-all duration-300"
                                onclick="mostrarImagen('{{ asset('storage/' . $evidencia->evidencias) }}')">
                        </div>
                    @endforeach
                </div>
                @php
                    $documentosAsociados = $documentos->whereIn('evidencia_id', $evidencias_pendientes->pluck('id'));
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

        <!-- Lightbox Modal -->
        <div id="lightbox"
            class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50">
            <div class="relative max-w-3xl w-full">
                <img id="lightbox-img" src=""
                    class="w-full max-h-[80vh] object-contain rounded-lg shadow-lg">
                <button onclick="cerrarLightbox()"
                    class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full hover:bg-red-700">
                    ✖
                </button>
            </div>
        </div>

        <script>
            function mostrarImagen(src) {
                document.getElementById('lightbox-img').src = src;
                document.getElementById('lightbox').classList.remove('hidden');
            }

            function cerrarLightbox() {
                document.getElementById('lightbox').classList.add('hidden');
            }

            document.addEventListener('keydown', function(event) {
                if (event.key === "Escape") {
                    cerrarLightbox();
                }
            });

            document.getElementById('lightbox').addEventListener('click', function(event) {
                if (event.target === this) {
                    cerrarLightbox();
                }
            });
        </script>
    </div>
</div>
