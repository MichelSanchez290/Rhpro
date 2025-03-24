<div>
<div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <!-- Contenedor de la tabla con scroll horizontal -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto" style="max-width: 75vw; overflow-x: scroll;">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Empresa
                            </th>
                            @if(Auth::user()->hasRole('SucursalAdmin'))
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sucursal
                                </th>
                            @endif
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
                                Informe
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
                                @if(Auth::user()->hasRole('SucursalAdmin'))
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ Auth::user()->sucursal->nombre_sucursal ?? 'N/A' }}
                                    </td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @foreach($encuesta->cuestionarios as $cuestionario)
                                        <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                            {{ $cuestionario->id }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <button onclick="copiarClave('{{ $encuesta->Clave }}')" class="text-green-600 hover:text-green-900">
                                        <i class="fas fa-copy"></i> Copiar
                                    </button>
                                    <br>
                                    <a href="{{ route('encuesta.invitar', ['clave' => $encuesta->Clave]) }}" class="text-purple-600 hover:text-purple-900">
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
                                    <span class="px-2 py-1 text-sm font-semibold rounded-full {{ $encuesta->Estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $encuesta->Estado ? 'Activa' : 'Inactiva' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            @php
                                                $avance = $this->avances[$encuesta->id] ?? 0;
                                            @endphp
                                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $avance }}%"></div>
                                        </div>
                                        <span class="ml-2 text-sm font-medium text-gray-700">{{ number_format($avance, 2) }}%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <select wire:model="tipoReporte" class="border border-gray-300 rounded-md px-2 py-1 text-sm">
                                        <option value="oliwis">ola</option>
                                        <option value="general">Reporte Completo (Estadistico)</option>
                                        <option value="promedio">Reporte Completo (Promedio)</option>
                                        <option value="estadistico">Reporte Datos Generales (Estadistico)ola</option>
                                        <option value="promedio2">Reporte Datos Generales (Promedio)</option>
                                        <option value="nose">Encuestas</option>
                                    </select>
                                    <button wire:click="generarReporte2({{ $encuesta->id }})"
                                            wire:loading.attr="disabled"
                                            wire:loading.class="opacity-50 cursor-not-allowed"
                                            class="text-red-600 hover:text-red-900 ml-2">
                                        <i class="fas fa-file-pdf"></i>
                                        <span wire:loading.remove>Generar</span>
                                        <span wire:loading>Generando...</span>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if(Auth::user()->hasRole('GoldenAdmin') || Auth::user()->hasRole('EmpresaAdmin') || Auth::user()->hasRole('AdminEmpresa'))
                                        <a href="{{ route('encuesta.estadisticas', $encuesta->id) }}" class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-chart-bar"></i>
                                        </a>
                                        <a href="{{ route('encuestas.edit', $encuesta->id) }}" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button wire:click="confirmDelete({{ $encuesta->id }})" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ Auth::user()->hasRole('SucursalAdmin') ? 11 : 10 }}" class="px-6 py-4 text-center text-sm text-gray-500">
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

        <!-- Modal de confirmación -->
        <div id="modalConfirm"
            class="{{ $showModal ? '' : 'hidden' }} fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button wire:click="$set('showModal', false)" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 pt-0 text-center">
                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">¿Estás seguro de que deseas eliminar esta Encuesta?</h3>
                    <button wire:click="deleteEncuesta({{ $encuestaToDelete }})"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                        Sí, estoy seguro
                    </button>
                    <button wire:click="$set('showModal', false)"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                        data-modal-toggle="delete-user-modal">
                        No, cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts para manejar las alertas y eventos -->
    <script>
        // Variable para mantener referencia al loading de SweetAlert
        let loadingSwal = null;

        // Función para copiar la clave al portapapeles
        function copiarClave(clave) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(clave)
                    .then(() => Swal.fire({
                        icon: 'success',
                        title: 'Clave copiada',
                        text: 'La clave se ha copiado al portapapeles',
                        timer: 2000,
                        showConfirmButton: false
                    }))
                    .catch(() => fallbackCopyText(clave));
            } else {
                fallbackCopyText(clave);
            }
        }

        // Función de respaldo para copiar texto
        function fallbackCopyText(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            document.body.appendChild(textarea);
            textarea.select();

            try {
                const successful = document.execCommand('copy');
                const msg = successful ? 'Texto copiado al portapapeles: ' : 'Error al copiar el texto';
                Swal.fire(msg + text);
            } catch (err) {
                Swal.fire('Error', 'Error al copiar el texto: ' + err, 'error');
            }

            document.body.removeChild(textarea);
        }

        // Función para confirmar la eliminación con SweetAlert
        function confirmarEliminacion(encuestaId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                backdrop: `
                    rgba(0,0,0,0.7)
                    url("/images/trash-icon.png")
                    center top
                    no-repeat
                `
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mostrar loading durante la eliminación
                    loadingSwal = Swal.fire({
                        title: 'Eliminando encuesta',
                        html: 'Por favor espere...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Hacer una solicitud HTTP para eliminar la encuesta
                    fetch(`/encuestas/${encuestaId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error en la solicitud');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (loadingSwal) loadingSwal.close();

                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Eliminada!',
                                text: data.success,
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    })
                    .catch(error => {
                        if (loadingSwal) loadingSwal.close();
                        Swal.fire('Error', 'No se pudo eliminar la encuesta.', 'error');
                        console.error('Error:', error);
                    });
                }
            });
        }

        // Escuchar eventos de Livewire para la generación de PDFs
        document.addEventListener('livewire:init', function() {
            // Mostrar loading al generar PDF
            Livewire.on('show-loading', () => {
                loadingSwal = Swal.fire({
                    title: 'Generando reporte PDF',
                    html: 'Estamos preparando tu documento, por favor espera...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    willClose: () => {
                        clearTimeout(timer);
                    }
                });

                // Timer como respaldo por si algo falla
                let timer = setTimeout(() => {
                    if (loadingSwal) {
                        loadingSwal.close();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tiempo prolongado',
                            text: 'La generación está tomando más tiempo de lo normal',
                            confirmButtonText: 'Entendido'
                        });
                    }
                }, 15000);
            });

            // Ocultar loading
            Livewire.on('hide-loading', () => {
                if (loadingSwal) loadingSwal.close();
            });

            // Mostrar éxito al generar PDF
            Livewire.on('report-completed', () => {
                if (loadingSwal) loadingSwal.close();

                Swal.fire({
                    icon: 'success',
                    title: '¡PDF listo!',
                    text: 'El reporte se ha generado correctamente y se descargará automáticamente',
                    timer: 10000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    willClose: () => {
                        // Puedes agregar acciones adicionales aquí si es necesario
                    }
                });
            });

            // Mostrar error al generar PDF
            Livewire.on('report-error', (event) => {
                if (loadingSwal) loadingSwal.close();

                Swal.fire({
                    icon: 'error',
                    title: 'Error al generar',
                    html: `<div style="text-align:left">
                            <p>${event.message || 'Ocurrió un error al generar el reporte'}</p>
                            <small>Intenta nuevamente o contacta al soporte técnico</small>
                        </div>`,
                    confirmButtonText: 'Entendido',
                    footer: '<a href="#">¿Necesitas ayuda?</a>'
                });
            });
        });

        // Exportar funciones al ámbito global
        window.copiarClave = copiarClave;
        window.confirmarEliminacion = confirmarEliminacion;
    </script>
</div>
    </div>
