<?php

namespace App\Livewire\ActivoFijo\TablasPower;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class MobiliarioTable extends PowerGridComponent
{
    public string $tableName = 'mobiliario-table-xzlxmd-table';
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
        return ActivoMobiliario::query()
            ->with(['tipoActivo', 'anioEstimado']);
        if (isset($this->filters['sucursal_id'])) {
            $query->where('sucursal_id', $this->filters['sucursal_id']);
        }
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
        ->add('fecha_adquisicion_formatted', fn(ActivoMobiliario $model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
        ->add('fecha_baja_formatted', fn(ActivoMobiliario $model) => Carbon::parse($model->fecha_baja)->format('d/m/Y'))
        ->add('tipo_activo_nombre', fn(ActivoMobiliario $model) => $model->tipoActivo->nombre_activo ?? 'N/A')
        ->add('precio_adquisicion')
        ->add('anioEstimado', fn(ActivoMobiliario $model) => $model->anioEstimado->vida_util_año ?? 'No asignado')
        ->add('sucursal_nombre', fn (ActivoMobiliario $model) => optional(Sucursal::where('id', $model->sucursal_id)->first())->nombre_sucursal ?? 'No asignado');
        
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

            //Column::make('Tipo activo id', 'tipo_activo_id'),
            Column::make('Tipo Activo', 'tipo_activo_nombre')
                ->sortable()
                ->searchable(),

            Column::make('Precio adquisicion', 'precio_adquisicion')
                ->sortable()
                ->searchable(),

            Column::make('Año Estimado', 'anioEstimado')->sortable()->searchable(),

            Column::make('Sucursal', 'sucursal_nombre')
                ->sortable()
                ->searchable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        $sucursales = Sucursal::whereHas('empresas', function ($query) {
            $query->where('empresa_id', Auth::user()->empresa_id);
        })->get();
        return [
            Filter::datepicker('fecha_adquisicion'),
            Filter::datepicker('fecha_baja'),
            Filter::select('sucursal_id', 'sucursal_id') // Filtro de selección
                ->dataSource($sucursales)
                ->optionValue('id') // Columna que se usará como valor
                ->optionLabel('nombre'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(ActivoMobiliario $row): array
    {
        return [
            Button::add('edit')
                ->icon('default-edit')
                ->class('btn btn-primary')
                ->route('editarmob', ['id' => $row->id]),
            Button::add('delete')
                ->icon('default-trash')
                ->class('btn btn-danger')
                ->dispatch('openModal', [
                    'component' => 'borrar-activo',
                    'arguments' => [
                        'vista' => 'mostrarmob', // Nombre de la vista actual
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
