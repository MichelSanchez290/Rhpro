<?php

namespace App\Livewire;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MobiliarioTable extends PowerGridComponent
{
    public string $tableName = 'mobiliario-table-xzlxmd-table';

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
        return ActivoMobiliario::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('num_serie')
            ->add('num_activo')
            ->add('ubicacion_fisica')
            ->add('fecha_adquisicion_formatted', fn (ActivoMobiliario $model) => Carbon::parse($model->fecha_adquisicion)->format('d/m/Y'))
            ->add('fecha_baja_formatted', fn (ActivoMobiliario $model) => Carbon::parse($model->fecha_baja)->format('d/m/Y'))
            ->add('tipo_activo_id')
            ->add('precio_adquisicion')
            ->add('aniosestimado_id')
            ->add('foto1')
            ->add('foto2')
            ->add('foto3')
            ->add('foto4')
            ->add('empresa_id')
            ->add('sucursal_id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
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

            Column::make('Tipo activo id', 'tipo_activo_id'),
            Column::make('Precio adquisicion', 'precio_adquisicion')
                ->sortable()
                ->searchable(),

            Column::make('Aniosestimado id', 'aniosestimado_id'),
            Column::make('Foto1', 'foto1')
                ->sortable()
                ->searchable(),

            Column::make('Foto2', 'foto2')
                ->sortable()
                ->searchable(),

            Column::make('Foto3', 'foto3')
                ->sortable()
                ->searchable(),

            Column::make('Foto4', 'foto4')
                ->sortable()
                ->searchable(),

            Column::make('Empresa id', 'empresa_id')
                ->sortable()
                ->searchable(),

            Column::make('Sucursal id', 'sucursal_id')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

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
        $this->js('alert('.$rowId.')');
    }

    public function actions(ActivoMobiliario $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
