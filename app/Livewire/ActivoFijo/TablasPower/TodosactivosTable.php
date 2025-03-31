<?php

namespace App\Livewire\ActivoFijo\TablasPower;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use App\Models\ActivoFijo\Activos\ActivoOficina;
use App\Models\ActivoFijo\Activos\ActivoPapeleria;
use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Activos\ActivoUniforme;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class TodosactivosTable extends PowerGridComponent
{
    public string $tableName = 'todosactivos-table-qrhrva-table';

    public function datasource(): Collection
    {
        // Combinar datos de todas las tablas de activos en una colección
        $tecnologia = ActivoTecnologia::query()
            ->selectRaw("
                activos_tecnologias.id,
                activos_tecnologias.nombre,
                activos_tecnologias.descripcion,
                activos_tecnologias.num_serie,
                activos_tecnologias.num_activo,
                activos_tecnologias.ubicacion_fisica,
                activos_tecnologias.fecha_adquisicion,
                activos_tecnologias.fecha_baja,
                activos_tecnologias.precio_adquisicion,
                aniosestimados.vida_util_año as aniosestimados,
                NULL as codigo_producto,
                NULL as marca,
                NULL as tipo,
                NULL as cantidad,
                NULL as estado,
                NULL as disponible,
                NULL as codigo,
                NULL as productos,
                NULL as color,
                NULL as medida,
                NULL as precio,
                NULL as talla,
                NULL as observaciones,
                tipo_activos.nombre_activo as tipo_activo,
                empresas.nombre as empresa_nombre,
                sucursales.nombre_sucursal as sucursal_nombre,
                activos_tecnologias.status,
                'tecnologia' as tipo_tabla,
                users.name as asignado_nombre
            ")
            ->join('tipo_activos', 'activos_tecnologias.tipo_activo_id', '=', 'tipo_activos.id')
            ->join('empresas', 'activos_tecnologias.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_tecnologias.sucursal_id', '=', 'sucursales.id')
            ->join('aniosestimados', 'activos_tecnologias.aniosestimado_id', '=', 'aniosestimados.id')
            ->leftJoin('activos_tecnologia_user', 'activos_tecnologias.id', '=', 'activos_tecnologia_user.activos_tecnologias_id')
            ->leftJoin('users', 'activos_tecnologia_user.user_id', '=', 'users.id')
            ->whereNull('activos_tecnologia_user.fecha_devolucion')
            ->get();

        $mobiliario = ActivoMobiliario::query()
            ->selectRaw("
                activos_mobiliarios.id,
                activos_mobiliarios.nombre,
                activos_mobiliarios.descripcion,
                activos_mobiliarios.num_serie,
                activos_mobiliarios.num_activo,
                activos_mobiliarios.ubicacion_fisica,
                activos_mobiliarios.fecha_adquisicion,
                activos_mobiliarios.fecha_baja,
                activos_mobiliarios.precio_adquisicion,
                aniosestimados.vida_util_año as aniosestimados,
                NULL as codigo_producto,
                NULL as marca,
                NULL as tipo,
                NULL as cantidad,
                NULL as estado,
                NULL as disponible,
                NULL as codigo,
                NULL as productos,
                NULL as color,
                NULL as medida,
                NULL as precio,
                NULL as talla,
                NULL as observaciones,
                tipo_activos.nombre_activo as tipo_activo,
                empresas.nombre as empresa_nombre,
                sucursales.nombre_sucursal as sucursal_nombre,
                activos_mobiliarios.status,
                'mobiliario' as tipo_tabla,
                users.name as asignado_nombre
            ")
            ->join('tipo_activos', 'activos_mobiliarios.tipo_activo_id', '=', 'tipo_activos.id')
            ->join('empresas', 'activos_mobiliarios.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_mobiliarios.sucursal_id', '=', 'sucursales.id')
            ->join('aniosestimados', 'activos_mobiliarios.aniosestimado_id', '=', 'aniosestimados.id')
            ->leftJoin('activos_mobiliario_user', 'activos_mobiliarios.id', '=', 'activos_mobiliario_user.activos_mobiliarios_id')
            ->leftJoin('users', 'activos_mobiliario_user.user_id', '=', 'users.id')
            ->whereNull('activos_mobiliario_user.fecha_devolucion')
            ->get();

        $oficina = ActivoOficina::query()
            ->selectRaw("
                activos_oficinas.id,
                activos_oficinas.nombre,
                activos_oficinas.descripcion,
                NULL as num_serie,
                activos_oficinas.numero_activo as num_activo,
                activos_oficinas.ubicacion_fisica,
                activos_oficinas.fecha_adquisicion,
                activos_oficinas.fecha_baja,
                activos_oficinas.precio_adquisicion,
                aniosestimados.vida_util_año as aniosestimados,
                NULL as codigo_producto,
                NULL as marca,
                NULL as tipo,
                NULL as cantidad,
                NULL as estado,
                NULL as disponible,
                NULL as codigo,
                NULL as productos,
                NULL as color,
                NULL as medida,
                NULL as precio,
                NULL as talla,
                NULL as observaciones,
                tipo_activos.nombre_activo as tipo_activo,
                empresas.nombre as empresa_nombre,
                sucursales.nombre_sucursal as sucursal_nombre,
                activos_oficinas.status,
                'oficina' as tipo_tabla,
                users.name as asignado_nombre
            ")
            ->join('tipo_activos', 'activos_oficinas.tipo_activo_id', '=', 'tipo_activos.id')
            ->join('empresas', 'activos_oficinas.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_oficinas.sucursal_id', '=', 'sucursales.id')
            ->join('aniosestimados', 'activos_oficinas.aniosestimado_id', '=', 'aniosestimados.id')
            ->leftJoin('activos_oficina_user', 'activos_oficinas.id', '=', 'activos_oficina_user.activos_oficinas_id')
            ->leftJoin('users', 'activos_oficina_user.user_id', '=', 'users.id')
            ->whereNull('activos_oficina_user.fecha_devolucion')
            ->get();

        $papeleria = ActivoPapeleria::query()
            ->selectRaw("
                activos_papelerias.id,
                activos_papelerias.nombre,
                NULL as descripcion,
                NULL as num_serie,
                NULL as num_activo,
                NULL as ubicacion_fisica,
                activos_papelerias.fecha_adquisicion,
                activos_papelerias.fecha_baja,
                NULL as precio_adquisicion,
                aniosestimados.vida_util_año as aniosestimados,
                activos_papelerias.codigo_producto,
                activos_papelerias.marca,
                activos_papelerias.tipo,
                activos_papelerias.cantidad,
                activos_papelerias.estado,
                activos_papelerias.disponible,
                NULL as codigo,
                NULL as productos,
                NULL as color,
                NULL as medida,
                NULL as precio,
                NULL as talla,
                NULL as observaciones,
                tipo_activos.nombre_activo as tipo_activo,
                empresas.nombre as empresa_nombre,
                sucursales.nombre_sucursal as sucursal_nombre,
                activos_papelerias.status,
                'papeleria' as tipo_tabla,
                users.name as asignado_nombre
            ")
            ->join('tipo_activos', 'activos_papelerias.tipo_activo_id', '=', 'tipo_activos.id')
            ->join('empresas', 'activos_papelerias.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_papelerias.sucursal_id', '=', 'sucursales.id')
            ->join('aniosestimados', 'activos_papelerias.aniosestimado_id', '=', 'aniosestimados.id')
            ->leftJoin('activos_papeleria_user', 'activos_papelerias.id', '=', 'activos_papeleria_user.activos_papelerias_id')
            ->leftJoin('users', 'activos_papeleria_user.user_id', '=', 'users.id')
            ->whereNull('activos_papeleria_user.fecha_devolucion')
            ->get();

        $souvenir = ActivoSouvenir::query()
            ->selectRaw("
                activos_souvenirs.id,
                NULL as nombre,
                activos_souvenirs.descripcion,
                NULL as num_serie,
                NULL as num_activo,
                NULL as ubicacion_fisica,
                activos_souvenirs.fecha_adquisicion,
                NULL as fecha_baja,
                NULL as precio_adquisicion,
                aniosestimados.vida_util_año as aniosestimados,
                NULL as codigo_producto,
                activos_souvenirs.marca,
                NULL as tipo,
                NULL as cantidad,
                activos_souvenirs.estado,
                activos_souvenirs.disponible,
                activos_souvenirs.codigo,
                activos_souvenirs.productos,
                activos_souvenirs.color,
                activos_souvenirs.medida,
                activos_souvenirs.precio,
                NULL as talla,
                NULL as observaciones,
                tipo_activos.nombre_activo as tipo_activo,
                empresas.nombre as empresa_nombre,
                sucursales.nombre_sucursal as sucursal_nombre,
                activos_souvenirs.status,
                'souvenir' as tipo_tabla,
                users.name as asignado_nombre
            ")
            ->join('tipo_activos', 'activos_souvenirs.tipo_activo_id', '=', 'tipo_activos.id')
            ->join('empresas', 'activos_souvenirs.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_souvenirs.sucursal_id', '=', 'sucursales.id')
            ->join('aniosestimados', 'activos_souvenirs.aniosestimado_id', '=', 'aniosestimados.id')
            ->leftJoin('activos_souvenir_user', 'activos_souvenirs.id', '=', 'activos_souvenir_user.activos_souvenirs_id')
            ->leftJoin('users', 'activos_souvenir_user.user_id', '=', 'users.id')
            ->whereNull('activos_souvenir_user.fecha_devolucion')
            ->get();

        $uniforme = ActivoUniforme::query()
            ->selectRaw("
                activos_uniformes.id,
                NULL as nombre,
                activos_uniformes.descripcion,
                NULL as num_serie,
                NULL as num_activo,
                NULL as ubicacion_fisica,
                activos_uniformes.fecha_adquisicion,
                NULL as fecha_baja,
                NULL as precio_adquisicion,
                NULL as codigo_producto,
                NULL as marca,
                NULL as tipo,
                activos_uniformes.cantidad,
                activos_uniformes.estado,
                activos_uniformes.disponible,
                NULL as codigo,
                NULL as productos,
                NULL as color,
                NULL as medida,
                NULL as precio,
                activos_uniformes.talla,
                activos_uniformes.observaciones,
                tipo_activos.nombre_activo as tipo_activo,
                empresas.nombre as empresa_nombre,
                sucursales.nombre_sucursal as sucursal_nombre,
                activos_uniformes.status,
                'uniforme' as tipo_tabla,
                users.name as asignado_nombre
            ")
            ->join('tipo_activos', 'activos_uniformes.tipo_activo_id', '=', 'tipo_activos.id')
            ->join('empresas', 'activos_uniformes.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_uniformes.sucursal_id', '=', 'sucursales.id')
            ->leftJoin('activos_uniforme_user', 'activos_uniformes.id', '=', 'activos_uniforme_user.activos_uniformes_id')
            ->leftJoin('users', 'activos_uniforme_user.user_id', '=', 'users.id')
            ->whereNull('activos_uniforme_user.fecha_devolucion')
            ->get();

        // Combinar todas las colecciones
        return collect([])
            ->merge($tecnologia)
            ->merge($mobiliario)
            ->merge($oficina)
            ->merge($papeleria)
            ->merge($souvenir)
            ->merge($uniforme);
    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('nombre')
            ->add('descripcion')
            ->add('num_serie')
            ->add('num_activo')
            ->add('ubicacion_fisica')
            ->add('fecha_adquisicion_formatted', fn($model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
            ->add('fecha_baja_formatted', fn($model) => $model->fecha_baja ? Carbon::parse($model->fecha_baja)->format('d/m/Y') : 'No definida')
            ->add('precio_adquisicion')
            ->add('aniosestimados')
            ->add('codigo_producto')
            ->add('marca')
            ->add('tipo')
            ->add('cantidad')
            ->add('estado')
            ->add('disponible')
            ->add('codigo')
            ->add('productos')
            ->add('color')
            ->add('medida')
            ->add('precio')
            ->add('talla')
            ->add('observaciones')
            ->add('tipo_activo')
            ->add('empresa_nombre')
            ->add('sucursal_nombre')
            ->add('status_formatted', fn($model) => match ($model->status) {
                'Activo' => '<span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"><span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>Activo</span>',
                'Asignado' => '<span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"><span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>Asignado</span>',
                'Baja' => '<span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600"><span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>Baja</span>',
                default => '<span class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-xs font-semibold text-gray-600"><span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>' . $model->status . '</span>'
            })
            ->add('asignado_nombre', fn($model) => $model->asignado_nombre ?: 'No asignado')
            // Columnas calculadas
            ->add('anio_depreciacion', function ($model) {
                if (!$model->fecha_adquisicion) {
                    return 'N/A';
                }
                $fechaAdquisicion = Carbon::parse($model->fecha_adquisicion);
                $fechaActual = Carbon::create(2025, 3, 28); // Fecha actual: 28 de marzo de 2025
                $dias = $fechaActual->diffInDays($fechaAdquisicion);
                return round($dias / 365, 2); // Años de depreciación
            })
            ->add('valor_depreciacion_fija', function ($model) {
                // Calcular anio_depreciacion directamente
                if (!$model->fecha_adquisicion) {
                    return 'N/A';
                }
                $fechaAdquisicion = Carbon::parse($model->fecha_adquisicion);
                $fechaActual = Carbon::create(2025, 3, 28); // Fecha actual: 28 de marzo de 2025
                $dias = $fechaActual->diffInDays($fechaAdquisicion);
                $anioDepreciacion = round($dias / 365, 2); // Años de depreciación

                $aniosEstimados = $model->aniosestimados ?? 0; // Usar aniosestimados de la tabla
                if ($anioDepreciacion == 0 || $aniosEstimados == 0) {
                    return 'N/A';
                }
                // Usar precio_adquisicion o precio (para souvenirs), o 0 si no existe
                $precio = $model->precio_adquisicion ?? $model->precio ?? 0;
                if ($precio == 0) {
                    return 'N/A';
                }
                $depreciacionAnual = $precio / ($aniosEstimados * $anioDepreciacion);
                return round($depreciacionAnual, 2);
            })
            ->add('valor_residual_estimado', function ($model) {
                // Calcular anio_depreciacion directamente
                if (!$model->fecha_adquisicion) {
                    return 'N/A';
                }
                $fechaAdquisicion = Carbon::parse($model->fecha_adquisicion);
                $fechaActual = Carbon::create(2025, 3, 28); // Fecha actual: 28 de marzo de 2025
                $dias = $fechaActual->diffInDays($fechaAdquisicion);
                $anioDepreciacion = round($dias / 365, 2); // Años de depreciación

                $aniosEstimados = $model->aniosestimados ?? 0; // Usar aniosestimados de la tabla
                if ($anioDepreciacion == 0 || $aniosEstimados == 0) {
                    return 'N/A';
                }
                // Usar precio_adquisicion o precio (para souvenirs), o 0 si no existe
                $precio = $model->precio_adquisicion ?? $model->precio ?? 0;
                if ($precio == 0) {
                    return 'N/A';
                }
                // Calcular la depreciación anual (repetimos la lógica de valor_depreciacion_fija)
                $depreciacionAnual = $precio / ($aniosEstimados * $anioDepreciacion);
                $valorDepreciacion = round($depreciacionAnual, 2);

                // Valor residual = Precio de adquisición - (Depreciación anual * Años de depreciación)
                $valorResidual = $precio - ($valorDepreciacion * $anioDepreciacion);
                return round($valorResidual, 2);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Nombre', 'nombre')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Descripción', 'descripcion')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Num. Serie', 'num_serie')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Num. Activo', 'num_activo')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Ubicación Física', 'ubicacion_fisica')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Fecha Adquisición', 'fecha_adquisicion_formatted', 'fecha_adquisicion')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Fecha Baja', 'fecha_baja_formatted', 'fecha_baja')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Precio Adquisición', 'precio_adquisicion')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Años Estimados', 'aniosestimados')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Código Producto', 'codigo_producto')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Marca', 'marca')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Tipo', 'tipo')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Cantidad', 'cantidad')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Estado (Papelería/Souvenir/Uniforme)', 'estado')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Disponible', 'disponible')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Código (Souvenir)', 'codigo')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Productos', 'productos')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Color', 'color')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Medida', 'medida')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Precio (Souvenir)', 'precio')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Talla', 'talla')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Observaciones', 'observaciones')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Tipo Activo', 'tipo_activo')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Empresa', 'empresa_nombre')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Sucursal', 'sucursal_nombre')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Estado', 'status_formatted')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Asignado a', 'asignado_nombre')
                ->searchable()
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            // Columnas calculadas
            Column::make('Año de Depreciación', 'anio_depreciacion')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Valor Depreciación Fija', 'valor_depreciacion_fija')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::make('Valor Residual Estimado', 'valor_residual_estimado')
                ->sortable()
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),

            Column::action('Acciones')
                ->headerAttribute('align-middle text-center text-xs font-bold text-gray-500 uppercase tracking-wider')
                ->bodyAttribute('align-middle text-center text-sm text-gray-800'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_adquisicion'),
            Filter::datepicker('fecha_baja'),
        ];
    }

    // public function actions($row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->icon('default-edit')
    //             ->class('btn btn-primary'),
    //             //->route('editar-activo', ['tipo' => $row->tipo_tabla, 'id' => $row->id]),
    //         Button::add('delete')
    //             ->icon('default-trash')
    //             ->class('btn btn-danger')
    //             ->dispatch('openModal', [
    //                 'component' => 'borrar-activo',
    //                 'arguments' => [
    //                     'vista' => 'todos-activos',
    //                     'activo_id' => $row->id,
    //                     'tipo_tabla' => $row->tipo_tabla,
    //                 ]
    //             ]),
    //     ];
    // }
}