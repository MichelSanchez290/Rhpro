<body class="bg-gray-200">
    <div class="flex min-h-screen items-center justify-center py-3">
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="flex justify-center py-4">
                <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="30" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Agregar Trabajador</h1>
                </div>
            </div>

            <form class="mt-5 mx-7">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <!-- Usuario -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="user_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Usuario</label>
                        <select wire:model.defer="trabajador.user_id" id="user_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> Seleccione un usuario </option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Clave -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="clave_trabajador"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clave
                            Trabajador</label>
                        <input wire:model.defer="trabajador.clave_trabajador" type="text" id="clave_trabajador"
                            placeholder="Clave del trabajador"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>
                

                <!-- NNS y Fecha Nacimiento -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="numero_seguridad_social"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de 
                            Seguridad Social</label>
                        <input wire:model.defer="trabajador.numero_seguridad_social" type="text" id="numero_seguridad_social"
                            placeholder="Número de Seguridad Social (NSS)"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="fecha_nacimiento" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha Nacimiento
                        </label>
                        <input wire:model.defer="trabajador.fecha_nacimiento" type="date" id="fecha_nacimiento"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- Lugar Nacimiento y Estado -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">

                    <div class="grid grid-cols-1">
                        <label for="lugar_nacimiento"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Lugar Nacimiento</label>
                        <input wire:model.defer="trabajador.lugar_nacimiento" type="text" id="lugar_nacimiento"
                            placeholder="Lugar de nacimiento"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="estado"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Estado</label>
                        <input wire:model.defer="trabajador.estado" type="text" id="estado"
                             placeholder="Estado"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- Código Postal y Sexo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="codigo_postal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código Postal</label>
                        <input wire:model.defer="trabajador.codigo_postal" type="text" id="codigo_postal" placeholder="Código Postal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="sexo"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Sexo</label>
                        <select wire:model.defer="trabajador.sexo" id="sexo"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        </select>
                    </div>
                </div>

                <!-- CURP Y RFC -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="curp"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CURP</label>
                        <input wire:model.defer="trabajador.curp" type="text" id="curp" placeholder="CURP"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="rfc"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                        <input wire:model.defer="trabajador.rfc" type="text" id="rfc" placeholder="RFC"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="numero_celular"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número Celular </label>
                        <input wire:model.defer="trabajador.numero_celular" type="text" id="numero_celular" placeholder="Número de celular"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="fecha_ingreso" class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Fecha Ingreso
                        </label>
                        <input wire:model.defer="trabajador.fecha_ingreso" type="date" id="fecha_ingreso"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ********************************** -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="edad"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Edad</label>
                        <input wire:model.defer="trabajador.edad" type="text" id="edad" placeholder="Edad"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="estado_civil"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado Civil</label>
                        <select wire:model.defer="trabajador.estado_civil" id="estado_civil"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Viudo">Viudo</option>
                            <option value="Divorciado">Divorciado</option>
                        </select>
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="estudios"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nivel de Estudios</label>
                        <select wire:model.defer="trabajador.estudios" id="estudios"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Preescolar">Preescolar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Medio Superior">Medio Superior</option>
                            <option value="Superior Licenciatura">Superior Licenciatura</option>
                            <option value="Superior Ingenieria">Superior Ingenieria</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="ocupacion"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ocupación</label>
                        <input wire:model.defer="trabajador.ocupacion" type="text" id="ocupacion" placeholder="Ocupación actual"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="tipo_puest"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo puesto</label>
                        <input wire:model.defer="trabajador.tipo_puest" type="text" id="tipo_puest" placeholder="Tipo de puesto"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="contratacion"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contratación</label>
                        <input wire:model.defer="trabajador.contratacion" type="text" id="contratacion" placeholder="Contratación"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="tipo_personal"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo personal</label>
                        <input wire:model.defer="trabajador.tipo_personal" type="text" id="tipo_personal" placeholder="Tipo de personal"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="jornada_trabajo"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Jornada Trabajo</label>
                        <input wire:model.defer="trabajador.jornada_trabajo" type="text" id="jornada_trabajo" placeholder="Jornada de trabajo"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="rotacion"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Rotación</label>
                        <input wire:model.defer="trabajador.rotacion" type="text" id="rotacion" placeholder="Rotación de turno"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="experiencia"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Experiencia</label>
                        <input wire:model.defer="trabajador.experiencia" type="text" id="experiencia" placeholder="Experiencia laboral"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="tiempo_puesto"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiempo Puesto</label>
                        <input wire:model.defer="trabajador.tiempo_puesto" type="text" id="tiempo_puesto" placeholder="Tiempo ocupado en el puesto"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="calle"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle</label>
                        <input wire:model.defer="trabajador.calle" type="text" id="calle" placeholder="Calle"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <div class="grid grid-cols-1">
                        <label for="numero"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número</label>
                        <input wire:model.defer="trabajador.numero" type="text" id="numero" placeholder="Número de calle"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>

                    <div class="grid grid-cols-1">
                        <label for="colonia"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia</label>
                        <input wire:model.defer="trabajador.colonia" type="text" id="colonia" placeholder="Colonia"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    </div>
                </div>

                <!-- ***********************  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">

                    <div class="grid grid-cols-1 mt-5">
                        <label for="status"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                        <select wire:model.defer="trabajador.status" id="status"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <!-- Usuario -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="sucursal_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Sucursales</label>
                        <select wire:model.defer="trabajador.sucursal_id" id="sucursal_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> --- Seleccione una Sucursal --- </option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                    <!-- Usuario -->
                    <div class="grid grid-cols-1 mt-5">
                        <label for="departamento_id"
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Departamentos</label>
                        <select wire:model.defer="trabajador.departamento_id" id="departamento_id"
                            class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value=""> ---  Seleccione un departamento --- </option>
                            @foreach ($departamentos as $departament)
                                <option value="{{ $departament->id }}">{{ $departament->nombre_departamento }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- Botones -->
                <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                    <button type="button" wire:click="saveTrabajador"
                        class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Agregar
                    </button>

                    <button type="button" wire:click="redirigirTrabajador"
                        class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
