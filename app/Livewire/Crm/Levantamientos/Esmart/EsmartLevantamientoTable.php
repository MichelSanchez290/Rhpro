<?php

namespace App\Livewire\Crm\Levantamientos\Esmart;

use App\Models\Crm\EsmartLevantamiento;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EsmartLevantamientoTable extends PowerGridComponent
{
    public string $tableName = 'esmart-levantamiento-table-rtd39f-table';

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
        return EsmartLevantamiento::query();
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
            ->add('fecha_formatted', fn (EsmartLevantamiento $model) => Carbon::parse($model->fecha)->format('d/m/Y'))
            ->add('hora')
            ->add('numero_pedido')
            ->add('users_id')
            ->add('leads_clientes_id')
            ->add('sucursales_id')
            ->add('empresa_id')
            ->add('numero_lead')
            ->add('nombre_cliente')
            ->add('medios_cesrh')
            ->add('puesto')
            ->add('correo')
            ->add('correo_2')
            ->add('telefono')
            ->add('telefono_2')
            ->add('nombre_contacto_2')
            ->add('puesto_contacto_2')
            ->add('tipo');
            // ->add('created_at');
    }

    public function columns(): array
    {
        return [
            // Column::make('Id', 'id'),
            Column::make('Id', 'id'),
            Column::make('Fecha', 'fecha_formatted', 'fecha')
                ->sortable(),

            Column::make('Hora', 'hora')
                ->sortable()
                ->searchable(),

            Column::make('Numero pedido', 'numero_pedido')
                ->sortable()
                ->searchable(),

            Column::make('Users id', 'users_id'),
            Column::make('Leads clientes id', 'leads_clientes_id'),
            Column::make('Sucursales id', 'sucursales_id'),
            Column::make('Empresa id', 'empresa_id'),
            Column::make('Numero lead', 'numero_lead')
                ->sortable()
                ->searchable(),

            Column::make('Nombre cliente', 'nombre_cliente')
                ->sortable()
                ->searchable(),

            Column::make('Medios cesrh', 'medios_cesrh')
                ->sortable()
                ->searchable(),

            Column::make('Puesto', 'puesto')
                ->sortable()
                ->searchable(),

            Column::make('Correo', 'correo')
                ->sortable()
                ->searchable(),

            Column::make('Correo 2', 'correo_2')
                ->sortable()
                ->searchable(),

            Column::make('Telefono', 'telefono')
                ->sortable()
                ->searchable(),

            Column::make('Telefono 2', 'telefono_2')
                ->sortable()
                ->searchable(),

            Column::make('Nombre contacto 2', 'nombre_contacto_2')
                ->sortable()
                ->searchable(),

            Column::make('Puesto contacto 2', 'puesto_contacto_2')
                ->sortable()
                ->searchable(),

            Column::make('Tipo', 'tipo')
                ->sortable()
                ->searchable(),

            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(EsmartLevantamiento $row): array
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
