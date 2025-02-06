<?php

namespace App\Livewire;

use App\Models\ActivoFijo\Activos\ActivoUniforme;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ActivouniTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'activouni-table-9d6avy-table';
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
        return ActivoUniforme::query()
            ->with(['tipoActivo']);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('descripcion')
            ->add('talla')
            ->add('cantidad')
            ->add('estado')
            ->add('disponible')
            ->add('fecha_adquisicion_formatted', fn(ActivoUniforme $model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
            ->add('observaciones')
            ->add('tipo_activo_nombre', fn(ActivoUniforme $model) => $model->tipoActivo->nombre_activo ?? 'N/A')
            ->add('color');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Talla', 'talla')
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

            Column::make('Observaciones', 'observaciones')
                ->sortable()
                ->searchable(),

            Column::make('Tipo Activo', 'tipo_activo_nombre')
                ->sortable()
                ->searchable(),
            Column::make('Color', 'color')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_adquisicion'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(ActivoUniforme $row): array
    {
        return [
            Button::add('edit')
                ->icon('default-copy')
                ->class('btn btn-primary')
                ->route('editaractuni', ['id' => $row->id]),
            Button::add('delete')
                ->icon('default-trash')
                ->class('btn btn-primary')
                ->dispatch('openModal', [
                    'component' => 'borrar-activo',
                    'arguments' => ['activo_id' => $row->id] // Aquí cambiamos el nombre del parámetro
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
