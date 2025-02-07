<?php

namespace App\Livewire;

use App\Models\Crm\DatosFiscale;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class DatosFiscalesTable extends PowerGridComponent
{
    public string $tableName = 'datos-fiscales-table-wlnx6o-table';

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
        return DatosFiscale::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('razonSocial')
            ->add('rfc')
            ->add('calle')
            ->add('colonia')
            ->add('municipio')
            ->add('localidad')
            ->add('estado')
            ->add('pais')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Razon Social', 'razonSocial'),
            Column::make('Rfc', 'rfc')
                ->sortable()
                ->searchable(),

            Column::make('Calle', 'calle')
                ->sortable()
                ->searchable(),

            Column::make('Numero Exterior', 'numeroExterior')
                ->sortable()
                ->searchable(),

            Column::make('Numero Interior', 'numeroInterior')
                ->sortable()
                ->searchable(),

            Column::make('Colonia', 'colonia')
                ->sortable()
                ->searchable(),

            Column::make('Municipio', 'municipio')
                ->sortable()
                ->searchable(),

            Column::make('Localidad', 'localidad')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),

            Column::make('Pais', 'pais')
                ->sortable()
                ->searchable(),

            Column::make('Codigo Postal', 'codigoPostal')
                ->sortable()
                ->searchable(),

            Column::make('Empresa', 'crmEmpresas_id')
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
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(DatosFiscale $row): array
    {
        return [
            Button::make('edit', 'Editar')
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->route('editDato', ['id' => $row->id]),
            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmDelete', ['id' => $row->id]),
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