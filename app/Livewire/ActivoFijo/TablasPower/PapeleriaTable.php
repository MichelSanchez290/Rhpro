<?php

namespace App\Livewire\ActivoFijo\TablasPower;

use App\Models\ActivoFijo\Activos\ActivoPapeleria;
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

final class PapeleriaTable extends PowerGridComponent
{
    public string $tableName = 'papeleria-table-mwgids-table';
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
        return ActivoPapeleria::query()
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
        ->add('codigo_producto')
        ->add('nombre')
        ->add('marca')
        ->add('tipo')
        ->add('cantidad')
        ->add('estado')
        ->add('disponible')
        ->add('fecha_adquisicion_formatted', fn(ActivoPapeleria $model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
        ->add('fecha_baja_formatted', fn(ActivoPapeleria $model) => Carbon::parse($model->fecha_baja)->format('d/m/Y'))
        ->add('tipo_activo_nombre', fn(ActivoPapeleria $model) => $model->tipoActivo->nombre_activo ?? 'N/A')
        ->add('anioEstimado', fn(ActivoPapeleria $model) => $model->anioEstimado->vida_util_año ?? 'No asignado')
        ->add('color')
        ->add('precio_unitario')
        ->add('sucursal_nombre', fn (ActivoPapeleria $model) => optional(Sucursal::where('id', $model->sucursal_id)->first())->nombre_sucursal ?? 'No asignado');

    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Codigo producto', 'codigo_producto')
                ->sortable()
                ->searchable(),

            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Marca', 'marca')
                ->sortable()
                ->searchable(),

            Column::make('Tipo', 'tipo')
                ->sortable()
                ->searchable(),

            Column::make('Cantidad', 'cantidad')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),

            Column::make('Disponible', 'disponible')
                ->sortable()
                ->searchable(),

            Column::make('Fecha adquisicion', 'fecha_adquisicion_formatted', 'fecha_adquisicion')
                ->sortable(),

            Column::make('Fecha baja', 'fecha_baja_formatted', 'fecha_baja')
                ->sortable(),

            Column::make('Tipo Activo', 'tipo_activo_nombre')
                ->sortable()
                ->searchable(),
            Column::make('Año Estimado', 'anioEstimado')->sortable()->searchable(),
            Column::make('Color', 'color')
                ->sortable()
                ->searchable(),

            Column::make('Precio unitario', 'precio_unitario')
                ->sortable()
                ->searchable(),
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
        $this->js('alert('.$rowId.')');
    }

    public function actions(ActivoPapeleria $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('btn btn-primary')
                ->route('editarpape', ['id' => $row->id]),
                Button::add('delete')
                ->icon('default-trash')
                ->class('btn btn-danger')
                ->dispatch('openModal', [
                    'component' => 'borrar-activo',
                    'arguments' => [
                        'vista' => 'mostrarpape', // Nombre de la vista actual
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
