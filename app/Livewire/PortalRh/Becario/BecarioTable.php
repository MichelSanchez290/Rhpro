<?php

namespace App\Livewire\PortalRh\Becario;

use App\Models\PortalRh\Becario;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class BecarioTable extends PowerGridComponent
{
    public string $tableName = 'becario-table-oovfnx-table';

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
        return Becario::query();
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
            ->add('clave_becario')
            ->add('numero_seguridad_social')
            ->add('fecha_nacimiento_formatted', fn (Becario $model) => Carbon::parse($model->fecha_nacimiento)->format('d/m/Y'))
            ->add('lugar_nacimiento')
            ->add('estado')
            ->add('codigo_postal')
            ->add('ocupacion')
            ->add('sexo')
            ->add('curp')
            ->add('rfc')
            ->add('numero_celular')
            ->add('fecha_ingreso_formatted', fn (Becario $model) => Carbon::parse($model->fecha_ingreso)->format('d/m/Y'))
            ->add('status')
            ->add('calle')
            ->add('colonia')
            ->add('user_id')
            ->add('departamento_id')
            ->add('puesto_id')
            ->add('registro_patronal_id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Id', 'id'),
            Column::make('Clave becario', 'clave_becario')
                ->sortable()
                ->searchable(),

            Column::make('Numero seguridad social', 'numero_seguridad_social')
                ->sortable()
                ->searchable(),

            Column::make('Fecha nacimiento', 'fecha_nacimiento_formatted', 'fecha_nacimiento')
                ->sortable(),

            Column::make('Lugar nacimiento', 'lugar_nacimiento')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),

            Column::make('Codigo postal', 'codigo_postal')
                ->sortable()
                ->searchable(),

            Column::make('Ocupacion', 'ocupacion')
                ->sortable()
                ->searchable(),

            Column::make('Sexo', 'sexo')
                ->sortable()
                ->searchable(),

            Column::make('Curp', 'curp')
                ->sortable()
                ->searchable(),

            Column::make('Rfc', 'rfc')
                ->sortable()
                ->searchable(),

            Column::make('Numero celular', 'numero_celular')
                ->sortable()
                ->searchable(),

            Column::make('Fecha ingreso', 'fecha_ingreso_formatted', 'fecha_ingreso')
                ->sortable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Calle', 'calle')
                ->sortable()
                ->searchable(),

            Column::make('Colonia', 'colonia')
                ->sortable()
                ->searchable(),

            Column::make('User id', 'user_id'),
            Column::make('Departamento id', 'departamento_id'),
            Column::make('Puesto id', 'puesto_id'),
            Column::make('Registro patronal id', 'registro_patronal_id'),
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
            Filter::datepicker('fecha_nacimiento'),
            Filter::datepicker('fecha_ingreso'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Becario $row): array
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
