<div>
    <div>
        <div>
            <div>
                <div class="p-6">
                    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestión de Encuestas</h1>

                    <!-- Barra de búsqueda -->
                    <div class="mb-6">
                        <input
                            type="text"
                            wire:model.live="search"
                            placeholder="Buscar encuestas..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>

                    <!-- Tabla de encuestas -->
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Empresa
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Cuestionario
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Compartir
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha Inicio
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha Final
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Avance
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($encuestas as $encuesta)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $encuesta->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $encuesta->Empresa }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                @foreach($encuesta->cuestionarios as $cuestionario)
                                                    <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                                        {{ $cuestionario->id }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <!-- Botón Copiar Clave -->
                                                <button onclick="copiarClave('{{ $encuesta->Clave }}')" class="text-green-600 hover:text-green-900 ml-4">
                                                    <i class="fas fa-copy"></i> Copiar Clave
                                                </button>

                                                <br>
                                                
                                                <!-- Botón Compartir Enlace -->
                                                <a href="{{ route('encuesta.invitar', ['clave' => $encuesta->Clave]) }}" class="text-purple-600 hover:text-purple-900 ml-4">
                                                    <i class="fas fa-share"></i> Compartir
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $encuesta->FechaInicio ? \Carbon\Carbon::parse($encuesta->FechaInicio)->format('d/m/Y') : 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $encuesta->FechaFinal ? \Carbon\Carbon::parse($encuesta->FechaFinal)->format('d/m/Y') : 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 text-sm font-semibold rounded-full 
                                                    {{ $encuesta->Estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $encuesta->Estado ? 'Activa' : 'Inactiva' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex items-center">
                                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                        @php
                                                            // Calcular el porcentaje de avance
                                                            $avance = ($encuesta->EncuestasContestadas / $encuesta->NumeroEncuestas) * 100;
                                                        @endphp
                                                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $avance }}%"></div>
                                                    </div>
                                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ number_format($avance, 2) }}%</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <!-- Botón Editar -->
                                                <a href="{{ route('encuestas.edit', $encuesta->id) }}" class="text-blue-600 hover:text-blue-900">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                                <!-- Botón Eliminar -->
                                                <button wire:click="confirmDelete({{ $encuesta->id }})" class="text-red-600 hover:text-red-900 ml-4">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                                                No se encontraron encuestas.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="px-6 py-4 border-t border-gray-200">
                            {{ $encuestas->links() }}
                        </div>
                    </div>

                    <!-- Modal de confirmación para eliminar -->
                    @if ($showModal)
                        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg shadow-lg">
                                <h2 class="text-lg font-semibold mb-4">¿Estás seguro de que deseas eliminar esta encuesta?</h2>
                                <div class="flex justify-end">
                                    <button wire:click="deleteEncuesta" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2">Eliminar</button>
                                    <button wire:click="$set('showModal', false)" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- Incluir FontAwesome para los íconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Incluir clipboard.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
        <script>
            // Función para copiar la clave al portapapeles
            function copiarClave(clave) {
                if (navigator.clipboard) {
                    // Usar navigator.clipboard si está disponible
                    navigator.clipboard.writeText(clave)
                        .then(() => alert("Clave copiada al portapapeles: " + clave))
                        .catch(() => fallbackCopyText(clave));
                } else {
                    // Método alternativo si navigator.clipboard no está disponible
                    fallbackCopyText(clave);
                }
            }

            // Función para compartir el enlace
            function compartirEnlace(enlace) {
                if (navigator.clipboard) {
                    // Usar navigator.clipboard si está disponible
                    navigator.clipboard.writeText(enlace)
                        .then(() => alert("Enlace copiado al portapapeles: " + enlace))
                        .catch(() => fallbackCopyText(enlace));
                } else {
                    // Método alternativo si navigator.clipboard no está disponible
                    fallbackCopyText(enlace);
                }
            }

            // Método alternativo para copiar texto al portapapeles
            function fallbackCopyText(text) {
                const textarea = document.createElement('textarea');
                textarea.value = text;
                textarea.style.position = 'fixed'; // Evitar que se desplace la página
                document.body.appendChild(textarea);
                textarea.select();

                try {
                    const successful = document.execCommand('copy');
                    const msg = successful ? 'Texto copiado al portapapeles: ' : 'Error al copiar el texto';
                    alert(msg + text);
                } catch (err) {
                    alert('Error al copiar el texto: ' + err);
                }

                document.body.removeChild(textarea);
            }
        </script>
    </div>
</div>