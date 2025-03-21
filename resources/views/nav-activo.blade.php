<div>
    <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle mr-8">
            <i class="ri-menu-line"></i>
        </button>

        <a href="{{ route('dashboard') }}" class="text-lg text-gray-900 font-semibold sidebar-toggle">
            <i class="ri-arrow-left-line"></i>
        </a>

        <ul class="ml-auto flex items-center">
            <li class="mr-1 dropdown">
                {{-- <button type="button"
                    class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                        style="fill: gray;transform: ;msFilter:;">
                        <path
                            d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                        </path>
                    </svg>
                </button> --}}
                <div
                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                    <form action="" class="p-4 border-b border-b-gray-100">
                        <div class="relative w-full">
                            <input type="text"
                                class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500"
                                placeholder="Search...">
                            <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"></i>
                        </div>
                    </form>
                </div>
            </li>
            {{-- @can('Activo tecnologia Trabajador')
                @php
                    // Consulta para cada tipo de activo asignado al usuario autenticado
                    $activosTecnologia = DB::table('activos_tecnologia_user')
                        ->join(
                            'activos_tecnologias',
                            'activos_tecnologia_user.activos_tecnologias_id',
                            '=',
                            'activos_tecnologias.id',
                        )
                        ->where('activos_tecnologia_user.user_id', Auth::id())
                        ->where('activos_tecnologia_user.status', 1)
                        ->select(DB::raw("'Tecnología' as tipo"), 'activos_tecnologias.nombre as activo');

                    $activosMobiliarios = DB::table('activos_mobiliario_user')
                        ->join(
                            'activos_mobiliarios',
                            'activos_mobiliario_user.activos_mobiliarios_id',
                            '=',
                            'activos_mobiliarios.id',
                        )
                        ->where('activos_mobiliario_user.user_id', Auth::id())
                        ->where('activos_mobiliario_user.status', 1)
                        ->select(DB::raw("'Mobiliario' as tipo"), 'activos_mobiliarios.nombre as activo');

                    $activosOficinas = DB::table('activos_oficina_user')
                        ->join(
                            'activos_oficinas',
                            'activos_oficina_user.activos_oficinas_id',
                            '=',
                            'activos_oficinas.id',
                        )
                        ->where('activos_oficina_user.user_id', Auth::id())
                        ->where('activos_oficina_user.status', 1)
                        ->select(DB::raw("'Oficina' as tipo"), 'activos_oficinas.nombre as activo');

                    $activosUniformes = DB::table('activos_uniforme_user')
                        ->join(
                            'activos_uniformes',
                            'activos_uniforme_user.activos_uniformes_id',
                            '=',
                            'activos_uniformes.id',
                        )
                        ->where('activos_uniforme_user.user_id', Auth::id())
                        ->where('activos_uniforme_user.status', 1)
                        ->select(DB::raw("'Uniforme' as tipo"), 'activos_uniformes.descripcion as activo');

                    $activosSouvenirs = DB::table('activos_souvenir_user')
                        ->join(
                            'activos_souvenirs',
                            'activos_souvenir_user.activos_souvenirs_id',
                            '=',
                            'activos_souvenirs.id',
                        )
                        ->where('activos_souvenir_user.user_id', Auth::id())
                        ->where('activos_souvenir_user.status', 1)
                        ->select(DB::raw("'Souvenir' as tipo"), 'activos_souvenirs.productos as activo');

                    $activosPapelerias = DB::table('activos_papeleria_user')
                        ->join(
                            'activos_papelerias',
                            'activos_papeleria_user.activos_papelerias_id',
                            '=',
                            'activos_papelerias.id',
                        )
                        ->where('activos_papeleria_user.user_id', Auth::id())
                        ->where('activos_papeleria_user.status', 1)
                        ->select(DB::raw("'Papelería' as tipo"), 'activos_papelerias.nombre as activo');

                    // Combinar todas las consultas con union
                    $todosActivosAsignados = $activosTecnologia
                        ->union($activosMobiliarios)
                        ->union($activosOficinas)
                        ->union($activosUniformes)
                        ->union($activosSouvenirs)
                        ->union($activosPapelerias)
                        ->get();

                    $totalActivos = $todosActivosAsignados->count();
                @endphp

                <li class="dropdown">
                    <div class="relative">
                        <button type="button"
                            class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: rgb(37, 37, 37);">
                                <path
                                    d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                                </path>
                            </svg>
                            @if ($totalActivos > 0)
                                <span
                                    class="absolute -top-2 right-0 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                    {{ $totalActivos }}
                                </span>
                            @endif
                        </button>
                    </div>

                    <div
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                            <button type="button" data-tab="notification" data-tab-page="notifications"
                                class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notificaciones</button>
                        </div>
                        <div class="my-2">
                            <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                                @if ($totalActivos > 0)
                                    @foreach ($todosActivosAsignados as $activo)
                                        <li>
                                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                                <img src="/ModuloActivo/recursos/notiasign.png" alt=""
                                                    class="w-8 h-8 rounded block object-cover align-middle">
                                                <div class="ml-2">
                                                    <div
                                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                        Nuevo Activo de {{ $activo->tipo }} Asignado</div>
                                                    <div class="text-[11px] text-gray-400">{{ $activo->activo }}</div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="py-2 px-4 text-gray-500 text-[13px]">No hay activos asignados.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>
            @endcan --}}
            @can('Activo tecnologia Trabajador')
                @php
                    // Consulta para cada tipo de activo asignado al usuario autenticado
                    $activosTecnologia = DB::table('activos_tecnologia_user')
                        ->join(
                            'activos_tecnologias',
                            'activos_tecnologia_user.activos_tecnologias_id',
                            '=',
                            'activos_tecnologias.id',
                        )
                        ->where('activos_tecnologia_user.user_id', Auth::id())
                        ->where('activos_tecnologia_user.status', 1)
                        ->select(
                            DB::raw("'Tecnología' as tipo"),
                            'activos_tecnologias.nombre as activo',
                            'activos_tecnologia_user.id',
                        );

                    $activosMobiliarios = DB::table('activos_mobiliario_user')
                        ->join(
                            'activos_mobiliarios',
                            'activos_mobiliario_user.activos_mobiliarios_id',
                            '=',
                            'activos_mobiliarios.id',
                        )
                        ->where('activos_mobiliario_user.user_id', Auth::id())
                        ->where('activos_mobiliario_user.status', 1)
                        ->select(
                            DB::raw("'Mobiliario' as tipo"),
                            'activos_mobiliarios.nombre as activo',
                            'activos_mobiliario_user.id',
                        );

                    $activosOficinas = DB::table('activos_oficina_user')
                        ->join(
                            'activos_oficinas',
                            'activos_oficina_user.activos_oficinas_id',
                            '=',
                            'activos_oficinas.id',
                        )
                        ->where('activos_oficina_user.user_id', Auth::id())
                        ->where('activos_oficina_user.status', 1)
                        ->select(
                            DB::raw("'Oficina' as tipo"),
                            'activos_oficinas.nombre as activo',
                            'activos_oficina_user.id',
                        );

                    $activosUniformes = DB::table('activos_uniforme_user')
                        ->join(
                            'activos_uniformes',
                            'activos_uniforme_user.activos_uniformes_id',
                            '=',
                            'activos_uniformes.id',
                        )
                        ->where('activos_uniforme_user.user_id', Auth::id())
                        ->where('activos_uniforme_user.status', 1)
                        ->select(
                            DB::raw("'Uniforme' as tipo"),
                            'activos_uniformes.descripcion as activo',
                            'activos_uniforme_user.id',
                        );

                    $activosSouvenirs = DB::table('activos_souvenir_user')
                        ->join(
                            'activos_souvenirs',
                            'activos_souvenir_user.activos_souvenirs_id',
                            '=',
                            'activos_souvenirs.id',
                        )
                        ->where('activos_souvenir_user.user_id', Auth::id())
                        ->where('activos_souvenir_user.status', 1)
                        ->select(
                            DB::raw("'Souvenir' as tipo"),
                            'activos_souvenirs.productos as activo',
                            'activos_souvenir_user.id',
                        );

                    $activosPapelerias = DB::table('activos_papeleria_user')
                        ->join(
                            'activos_papelerias',
                            'activos_papeleria_user.activos_papelerias_id',
                            '=',
                            'activos_papelerias.id',
                        )
                        ->where('activos_papeleria_user.user_id', Auth::id())
                        ->where('activos_papeleria_user.status', 1)
                        ->select(
                            DB::raw("'Papelería' as tipo"),
                            'activos_papelerias.nombre as activo',
                            'activos_papeleria_user.id',
                        );

                    $todosActivosAsignados = $activosTecnologia
                        ->union($activosMobiliarios)
                        ->union($activosOficinas)
                        ->union($activosUniformes)
                        ->union($activosSouvenirs)
                        ->union($activosPapelerias)
                        ->get();

                    // Obtener las notificaciones vistas desde la sesión
                    $notificacionesVistas = Session::get('notificaciones_vistas', []);

                    // Filtrar las notificaciones no vistas
                    $notificacionesPendientes = $todosActivosAsignados->filter(function ($activo) use (
                        $notificacionesVistas,
                    ) {
                        return !in_array($activo->id . '-' . $activo->tipo, $notificacionesVistas);
                    });

                    $totalActivos = $notificacionesPendientes->count();
                @endphp

                <li class="dropdown">
                    <div class="relative">
                        <button type="button"
                            class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: rgb(37, 37, 37);">
                                <path
                                    d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                                </path>
                            </svg>
                            @if ($totalActivos > 0)
                                <span
                                    class="absolute -top-2 right-0 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center"
                                    id="notificacion-count">
                                    {{ $totalActivos }}
                                </span>
                            @endif
                        </button>
                    </div>

                    <div
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                            <button type="button" data-tab="notification" data-tab-page="notifications"
                                class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notificaciones</button>
                        </div>
                        <div class="my-2">
                            <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications"
                                id="notificacion-list">
                                @if ($totalActivos > 0)
                                    @foreach ($notificacionesPendientes as $activo)
                                        <li data-id="{{ $activo->id }}" data-tipo="{{ $activo->tipo }}">
                                            <a href="#"
                                                class="py-2 px-4 flex items-center hover:bg-gray-50 group notificacion-link">
                                                <img src="/ModuloActivo/recursos/notiasign.png" alt=""
                                                    class="w-8 h-8 rounded block object-cover align-middle">
                                                <div class="ml-2">
                                                    <div
                                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                        Nuevo Activo de {{ $activo->tipo }} Asignado</div>
                                                    <div class="text-[11px] text-gray-400">{{ $activo->activo }}</div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="py-2 px-4 text-gray-500 text-[13px]">No hay activos asignados.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const notificacionLinks = document.querySelectorAll('.notificacion-link');
                        notificacionLinks.forEach(link => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();
                                const li = this.closest('li');
                                const id = li.getAttribute('data-id');
                                const tipo = li.getAttribute('data-tipo');
                                const url = getRedirectUrl(tipo);

                                // Marcar como visto mediante AJAX
                                fetch('{{ route('notificaciones.marcarVista') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            id: id,
                                            tipo: tipo
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Eliminar la notificación del dropdown
                                            li.remove();

                                            // Actualizar el contador
                                            const countElement = document.getElementById(
                                                'notificacion-count');
                                            let count = parseInt(countElement.textContent);
                                            count--;
                                            if (count > 0) {
                                                countElement.textContent = count;
                                            } else {
                                                countElement.remove();
                                            }

                                            // Redirigir a la vista correspondiente
                                            window.location.href = url;
                                        }
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        });
                    });

                    function getRedirectUrl(tipo) {
                        switch (tipo) {
                            case 'Tecnología':
                                return '{{ route('mostrarasigntecusu') }}';
                            case 'Mobiliario':
                                return '{{ route('mostrarasignmobusu') }}';
                            case 'Oficina':
                                return '{{ route('mostrarasignofiusu') }}';
                            case 'Uniforme':
                                return '{{ route('mostrarasignuniusu') }}';
                            case 'Souvenir':
                                return '{{ route('mostrarasignsouusu') }}';
                            case 'Papelería':
                                return '{{ route('mostrarasignpapeusu') }}';
                            default:
                                return '/';
                        }
                    }
                </script>
            @endcan
            <button id="fullscreen-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                    style="fill: rgb(37, 37, 37);transform: ;msFilter:;">
                    <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
                </svg>
            </button>
            <script>
                const fullscreenButton = document.getElementById('fullscreen-button');

                fullscreenButton.addEventListener('click', toggleFullscreen);

                function toggleFullscreen() {
                    if (document.fullscreenElement) {
                        // If already in fullscreen, exit fullscreen
                        document.exitFullscreen();
                    } else {
                        // If not in fullscreen, request fullscreen
                        document.documentElement.requestFullscreen();
                    }
                }
            </script>

            <li class="dropdown ml-3">
                <button type="button" class="dropdown-toggle flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 relative">
                        <div class="p-1 bg-[#1EA4D9] rounded-full focus:outline-none focus:ring">
                            <img class="w-8 h-8 rounded-full"
                                src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg"
                                alt="" />
                            {{-- <div
                                class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping">
                            </div>
                            <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full">
                            </div> --}}
                        </div>
                    </div>
                    <div class="p-2 md:block text-left">
                        <h2 class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                        <p class="text-xs text-gray-500">{{ Auth::user()->getRoleNames()->first() }}</p>
                    </div>
                </button>
                <ul
                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Perfil</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Configuracion</a>
                    </li>
                    {{-- <li>
                        <form method="POST" action="">
                            <a role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </li> --}}
                </ul>
            </li>
        </ul>
    </div>
</div>
