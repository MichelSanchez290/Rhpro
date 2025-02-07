<?php

namespace App\Livewire;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ActivotecTable extends PowerGridComponent
{
    public string $tableName = 'activotec-table-cjbv9q-table';

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

    public function datasource(): Builder
    {
        return ActivoTecnologia::query()
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
            //->add('tipo_activo_id')
            ->add('tipo_activo_nombre', fn (ActivoTecnologia $model) => $model->tipoActivo->nombre_activo ?? 'N/A')

            ->add('precio_adquisicion')
            ->add('vida_util_anio', fn (ActivoTecnologia $model) => $model->anioEstimado->vida_util_anio ?? 'N/A');
            //->add('aniosestimado_id')
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

            Column::make('Vida Útil (años)', 'vida_util_anio')
                ->sortable()
                ->searchable(),

            //Column::make('Aniosestimado id', 'aniosestimado_id'),

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
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
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
