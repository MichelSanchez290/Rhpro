<?php

namespace App\Livewire;

use App\Models\PortalRH\EmpresaSucursal;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EmpresaTable extends PowerGridComponent
{
    public string $tableName = 'empresa-table-i3bqdo-table';

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
        return EmpresaSucursal::query()
            ->join('empresas', function ($empresa){
                $empresa->on('empresas.id' , '=','empresa_id');
            })
            ->join('sucursales', function ($sucursal){
                $sucursal->on('sucursales.id' , '=','sucursal_id');
            })
            ->select([
                'empresas.id',
                'empresas.nombre',
                'sucursales.clave_sucursal'
            ]);
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
            ->add('empresas.nombre')
            ->add('sucursales.clave_sucursal');
            
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Id', 'id'),
            Column::make('Clave sucursal', 'empresas.nombre')
                ->sortable()
                ->searchable(),

            Column::make('Nombre sucursal', 'sucursales.clave_sucursal')
                ->sortable()
                ->searchable(),

            // Column::make('Zona economica', 'zona_economica')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Estado', 'estado')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Cuenta contable', 'cuenta_contable')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Rfc', 'rfc')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Correo', 'correo')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Telefono', 'telefono')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Status', 'status')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Registro patronal id', 'registro_patronal_id'),
            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),

            //Column::make('Created at', 'created_at')
               // ->sortable()
               // ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(EmpresaSucursal $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

}
