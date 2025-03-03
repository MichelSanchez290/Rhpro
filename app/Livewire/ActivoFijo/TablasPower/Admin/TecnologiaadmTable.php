<?php

namespace App\Livewire\ActivoFijo\TablasPower\Admin;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class TecnologiaadmTable extends PowerGridComponent
{
    public string $tableName = 'tecnologiaadm-table-tcmwfe-table';
    protected $listeners = ['refreshPowerGrid' => '$refresh'];

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::exportable('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return ActivoTecnologia::query()
            ->join('empresas', 'activos_tecnologias.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'activos_tecnologias.sucursal_id', '=', 'sucursales.id')
            ->select(
                'activos_tecnologias.*', // Selecciona todas las columnas de activos_mobiliarios
                'empresas.nombre as empresa_nombre', // Selecciona el nombre de la empresa
                'sucursales.nombre_sucursal as sucursal_nombre' // Selecciona el nombre de la sucursal
            )
            ->with(['tipoActivo', 'anioEstimado']);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()

            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('num_serie')
            ->add('num_activo')
            ->add('ubicacion_fisica')
            ->add('fecha_adquisicion_formatted', fn(ActivoTecnologia $model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
            ->add('fecha_baja_formatted', fn(ActivoTecnologia $model) => Carbon::parse($model->fecha_baja)->format('d/m/Y'))
            ->add('tipo_activo_nombre', fn(ActivoTecnologia $model) => $model->tipoActivo->nombre_activo ?? 'N/A')
            ->add('precio_adquisicion')
            ->add('anioEstimado', fn(ActivoTecnologia $model) => $model->anioEstimado->vida_util_año ?? 'No asignado')
            ->add('empresa_nombre') // Usa el campo obtenido con el join
            ->add('sucursal_nombre')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [

            Column::make('Id', 'id'),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Num serie', 'num_serie')
                ->sortable()
                ->searchable(),

            Column::make('Num activo', 'num_activo')
                ->sortable()
                ->searchable(),

            Column::make('Ubicacion fisica', 'ubicacion_fisica')
                ->sortable()
                ->searchable(),

            Column::make('Fecha adquisicion', 'fecha_adquisicion_formatted', 'fecha_adquisicion')
                ->sortable(),

            Column::make('Fecha baja', 'fecha_baja_formatted', 'fecha_baja')
                ->sortable(),

            Column::make('Tipo Activo', 'tipo_activo_nombre')
                ->sortable()
                ->searchable(),
            Column::make('Precio adquisicion', 'precio_adquisicion')
                ->sortable()
                ->searchable(),

            Column::make('Año Estimado', 'anioEstimado')->sortable()->searchable(),

            Column::make('Empresa', 'empresa_nombre') // Columna para el nombre de la empresa
                ->sortable()
                ->searchable(),

            Column::make('Sucursal', 'sucursal_nombre') // Columna para el nombre de la sucursal
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_adquisicion'),
            Filter::datepicker('fecha_baja'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(ActivoTecnologia $row): array
    {
        return [
            Button::add('edit')
                ->icon('default-edit')
                ->class('btn btn-primary')
                ->route('editartecad', ['id' => $row->id]),
            Button::add('delete')
                ->icon('default-trash')
                ->class('btn btn-danger')
                ->dispatch('openModal', [
                    'component' => 'borrar-activo',
                    'arguments' => [
                        'vista' => 'mostrartecad', // Nombre de la vista actual
                        'activo_id' => $row->id
                    ]
                ]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
