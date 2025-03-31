<div class="flex min-h-screen items-center justify-center py-3">
    <div class="grid bg-white rounded-lg shadow-xl w-full">
        <div class="flex justify-center py-4">
            <div class="flex bg-blue-200 rounded-full md:p-4 p-2 border-2 border-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96l192 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32L96 352c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32zm0 32l0 64 192 0 0-64L96 256zM240 416l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Agregar Registro Patronal</h1>
            </div>
        </div>

        <div class="relative mb-4">
            <div class="flex items-center justify-between">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => {
                        show = false;
                        window.location.href = '{{ route('mostrarregpatronal') }}'
                    }, 5000)" x-show="show"
                        class="fixed top-4 left-4 max-w-xs w-full bg-green-500 text-white shadow-lg rounded-lg p-4 flex items-center space-x-3 transition-transform transform hover:scale-105 z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                        </svg>
                        <div class="flex-1">
                            <p class="font-bold">{{ session('message') }}</p>
                            @if (session('message') == 'Registro patronal agregado')
                                <p class="text-sm">Registro patronal agregado exitosamente</p>
                            @endif
                        </div>
                        <button @click="show = false" class="text-white hover:text-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif

            </div>
        </div>

        <form class="mt-5 mx-7">
            <!-- Nombre RFC -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="registro_patronal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Registro Patronal
                    </label>
                    <input wire:model.defer="registro.registro_patronal" type="text" id="registro_patronal"
                        placeholder="Registro Patronal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" 
                    />
    
                    <x-input-error for="registro.registro_patronal" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="rfc"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        RFC
                    </label>
                    <input wire:model.defer="registro.rfc" type="text" id="rfc" placeholder="RFC"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.rfc" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="nombre_o_razon_social"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Nombre o razon social
                    </label>
                    <input wire:model.defer="registro.nombre_o_razon_social" type="text" id="nombre_o_razon_social" 
                        placeholder="Nombre o razon social"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.nombre_o_razon_social" />
                </div>
                <div class="grid grid-cols-1 mt-5">
                    <label for="regimen_capital"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Regimen capital
                    </label>
                    <input wire:model.defer="registro.regimen_capital" type="text" id="regimen_capital"
                        placeholder="Regimen capital"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.regimen_capital" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="regimen_fiscal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Regimen fiscal
                    </label>
                    <input wire:model.defer="registro.regimen_fiscal" type="text" id="regimen_fiscal"
                        placeholder="Regimen fiscal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.regimen_fiscal" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="actividad_economica"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Actividad Economica
                    </label>
                    <input wire:model.defer="registro.actividad_economica" type="text" id="actividad_economica" 
                        placeholder="Actividad Economica"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.actividad_economica" />
                </div>
                
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="imss_calle_manzana"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Calle del IMMS
                    </label>
                    <input wire:model.defer="registro.imss_calle_manzana" type="text" id="imss_calle_manzana"
                        placeholder="Calle del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imss_calle_manzana" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_num_exterior"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Número exterior de calle del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_num_exterior" type="text" id="imms_num_exterior"
                        placeholder="Número exterior de calle del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_num_exterior" />
                </div>
                
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_num_int"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Número interior de calle del IMMS o NA (No Aplica)
                    </label>
                    <input wire:model.defer="registro.imms_num_int" type="text" id="imms_num_int"
                        placeholder="Número interior de calle del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_num_int" />
                </div>
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_colonia"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Colonia
                    </label>
                    <input wire:model.defer="registro.imms_colonia" type="text" id="imms_colonia"
                        placeholder="Colonia"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_colonia" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_codigo_postal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Código postal del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_codigo_postal" type="text" id="imms_codigo_postal"
                        placeholder="Código postal del IMMS (5 digitos)"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_codigo_postal" />
                </div>
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_estado"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Estado del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_estado" type="text" id="imms_estado"
                        placeholder="Estado de la república donde se encuentra el IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_estado" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_municipio"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Municipio del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_municipio" type="text" id="imms_municipio"
                        placeholder="Municipio donde se encuentra el IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_municipio" />
                </div>
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_telefono"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Telefono del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_telefono" type="text" id="imms_telefono"
                        placeholder="Número de telefono a 10 digitos"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_telefono" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_convenio_rembolso_subsidios"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Convenio o Reembolso de subsidios del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_convenio_rembolso_subsidios" type="text" id="imms_convenio_rembolso_subsidios"
                        placeholder="Convenio o Reembolso de subsidios del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_convenio_rembolso_subsidios" />
                </div>
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="imms_tipo_contribucion"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Tipo de contribución del IMMS
                    </label>
                    <input wire:model.defer="registro.imms_tipo_contribucion" type="text" id="imms_tipo_contribucion"
                        placeholder="Tipo de contribución del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.imms_tipo_contribucion" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="area_geografica"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Área Geografica del IMMS
                    </label>
                    <input wire:model.defer="registro.area_geografica" type="text" id="area_geografica"
                        placeholder="Área Geografica del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.area_geografica" />
                </div>
                
                <div class="grid grid-cols-1 mt-5">
                    <label for="delegacion_imms"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Delegación del IMMS
                    </label>
                    <input wire:model.defer="registro.delegacion_imms" type="text" id="delegacion_imms"
                        placeholder="Nombre de la delegación"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.delegacion_imms" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="subdelegacion_imms"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Subdelegación del IMMS
                    </label>
                    <input wire:model.defer="registro.subdelegacion_imms" type="text" id="subdelegacion_imms"
                        placeholder="Nombre de la subdelegación"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.subdelegacion_imms" />
                </div>

                <div class="grid grid-cols-1 mt-5">
                    <label for="prima_año"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Prima anual del IMMS
                    </label>
                    <input wire:model.defer="registro.prima_año" type="text" id="prima_año"
                        placeholder="Prima anual del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.prima_año" />
                </div> 
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="prima_mes"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Prima mensual del IMMS
                    </label>
                    <input wire:model.defer="registro.prima_mes" type="text" id="prima_mes"
                        placeholder="Prima mensual del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.prima_mes" />
                </div> 

                <div class="grid grid-cols-1 mt-5">
                    <label for="porcentaje_prima_rt"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Porcentaje de prima RT
                    </label>
                    <input wire:model.defer="registro.porcentaje_prima_rt" type="text" id="porcentaje_prima_rt"
                        placeholder="Porcentaje de prima RT del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.porcentaje_prima_rt" />
                </div> 
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="clase_riesgo_trabajo"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Clase de riesgo de trabajo 
                    </label>
                    <input wire:model.defer="registro.clase_riesgo_trabajo" type="text" id="clase_riesgo_trabajo"
                        placeholder="Clase de riesgo de trabajo del IMMS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.clase_riesgo_trabajo" />
                </div> 

                <div class="grid grid-cols-1 mt-5">
                    <label for="acreditacion_stps"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Acreditación STPS
                    </label>
                    <input wire:model.defer="registro.acreditacion_stps" type="text" id="acreditacion_stps"
                        placeholder="Acreditación STPS"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.acreditacion_stps" />
                </div> 
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5">
                <div class="grid grid-cols-1 mt-5">
                    <label for="representante_legal"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Representante legal
                    </label>
                    <input wire:model.defer="registro.representante_legal" type="text" id="representante_legal"
                        placeholder="Nombre del representante legal"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.representante_legal" />
                </div> 

                <div class="grid grid-cols-1 mt-5">
                    <label for="puesto_representante"
                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                        Puesto del Representante 
                    </label>
                    <input wire:model.defer="registro.puesto_representante" type="text" id="puesto_representante"
                        placeholder="Puesto del representante"
                        class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    />

                    <x-input-error for="registro.puesto_representante" />
                </div> 
            </div>

            <div class="grid grid-cols-1 mt-5">
                <label for="cuenta_contable"
                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                    Cuenta contable
                </label>
                <input wire:model.defer="registro.cuenta_contable" type="text" id="cuenta_contable"
                    placeholder="Cuenta contable"
                    class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                />

                <x-input-error for="registro.cuenta_contable" />
            </div>

            <!-- Botones -->
            <div class='flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5'>

                <button type="button" wire:click="saveRegistro"
                    class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Agregar
                </button>

                <button type="button" wire:click="redirigir"
                    class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

