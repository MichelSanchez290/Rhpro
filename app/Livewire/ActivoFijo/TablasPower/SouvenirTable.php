<?php

namespace App\Livewire\ActivoFijo\TablasPower;

use App\Models\ActivoFijo\Activos\ActivoSouvenir;
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

final class SouvenirTable extends PowerGridComponent
{
    public string $tableName = 'souvenir-table-rce85t-table';
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
        return ActivoSouvenir::query()
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
        ->add('codigo')
        ->add('productos')
        ->add('descripcion')
        ->add('color')
        ->add('medida')
        ->add('marca')
        ->add('precio')
        ->add('estado')
        ->add('disponible')
        ->add('fecha_adquisicion_formatted', fn(ActivoSouvenir $model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
        ->add('tipo_activo_nombre', fn(ActivoSouvenir $model) => $model->tipoActivo->nombre_activo ?? 'N/A')
        ->add('anioEstimado', fn(ActivoSouvenir $model) => $model->anioEstimado->vida_util_año ?? 'No asignado')
        ->add('sucursal_nombre', fn (ActivoSouvenir $model) => optional(Sucursal::where('id', $model->sucursal_id)->first())->nombre_sucursal ?? 'No asignado');

    }


    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Codigo', 'codigo')
                ->sortable()
                ->searchable(),

            Column::make('Productos', 'productos')
                ->sortable()
                ->searchable(),

            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Color', 'color')
                ->sortable()
                ->searchable(),

            Column::make('Medida', 'medida')
                ->sortable()
                ->searchable(),

            Column::make('Marca', 'marca')
                ->sortable()
                ->searchable(),

            Column::make('Precio', 'precio')
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

                Column::make('Tipo Activo', 'tipo_activo_nombre')
                ->sortable()
                ->searchable(),
            Column::make('Año Estimado', 'anioEstimado')->sortable()->searchable(),
            Column::make('Color', 'color')
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

    public function actions(ActivoSouvenir $row): array
    {
        return [
            Button::add('edit')
                ->icon('default-edit')
                ->class('btn btn-primary')
                ->route('editarsou', ['id' => $row->id]),
            Button::add('delete')
                ->icon('default-trash')
                ->class('btn btn-danger')
                ->dispatch('openModal', [
                    'component' => 'borrar-activo',
                    'arguments' => [
                        'vista' => 'mostrarsou', // Nombre de la vista actual
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
