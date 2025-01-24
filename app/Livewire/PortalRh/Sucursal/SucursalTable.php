<?php

namespace App\Livewire\PortalRh\Sucursal;

use App\Models\PortalRh\Sucursal;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class SucursalTable extends PowerGridComponent
{
    public string $tableName = 'sucursal-table-qre6er-table';

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
        return Sucursal::query();
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
            ->add('clave_sucursal')
            ->add('nombre_sucursal')
            ->add('zona_economica')
            ->add('estado')
            ->add('cuenta_contable')
            ->add('rfc')
            ->add('correo')
            ->add('telefono')
            ->add('status')
            ->add('registro_patronal_id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Clave sucursal', 'clave_sucursal')
                ->sortable()
                ->searchable(),

            Column::make('Nombre sucursal', 'nombre_sucursal')
                ->sortable()
                ->searchable(),

            Column::make('Zona economica', 'zona_economica')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),

            Column::make('Cuenta contable', 'cuenta_contable')
                ->sortable()
                ->searchable(),

            Column::make('Rfc', 'rfc')
                ->sortable()
                ->searchable(),

            Column::make('Correo', 'correo')
                ->sortable()
                ->searchable(),

            Column::make('Telefono', 'telefono')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Registro patronal id', 'registro_patronal_id'),
            
            Column::make('Created at', 'created_at')
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
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Sucursal $row): array
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
