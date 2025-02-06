<?php

namespace App\Livewire\PortalRh\Instructor;

use App\Models\PortalRh\Instruct;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Traits\WithExport; 
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class InstructTable extends PowerGridComponent
{
    public string $tableName = 'instruct-table-2n0ziv-table';
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'instructores-export-file') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        return Instruct::query()
        ->leftJoin('users', 'instructores.user_id', '=', 'users.id')
        ->leftJoin('sucursales', 'instructores.sucursal_id', '=', 'sucursales.id')
        ->leftJoin('departamentos', 'instructores.departamento_id', '=', 'departamentos.id')
        ->select([
            'instructores.*',
            'users.name as nombre_usuario',
            'sucursales.nombre_sucursal as sucursal',
            'departamentos.nombre_departamento as departamento'
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
            ->add('telefono1')
            ->add('telefono2')
            ->add('registroStps')
            ->add('rfc')
            ->add('regimen')
            ->add('estado')
            ->add('municipio')
            ->add('codigopostal')
            ->add('colonia')
            ->add('calle')
            ->add('numero')
            ->add('honorarios')
            ->add('status')
            ->add('dc5')
            ->add('cuentabancaria')
            ->add('ine')
            ->add('curp')
            ->add('sat')
            ->add('domicilio')
            ->add('tipoinstructor')
            ->add('nombre_empresa')
            ->add('rfc_empre')
            ->add('calle_empre')
            ->add('numero_empre')
            ->add('colonia_empre')
            ->add('municipio_empre')
            ->add('estado_empre')
            ->add('postal_empre')
            ->add('regimen_empre')
            ->add('user_id')
            ->add('nombre_usuario')
            ->add('sucursal_id')
            ->add('sucursal')
            ->add('departamento_id')
            ->add('departamento')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Telefono1', 'telefono1')
                ->sortable()
                ->searchable(),

            Column::make('Telefono2', 'telefono2')
                ->sortable()
                ->searchable(),

            Column::make('Registro STPS', 'registroStps')
                ->sortable()
                ->searchable(),

            Column::make('Rfc', 'rfc')
                ->sortable()
                ->searchable(),

            Column::make('Regimen', 'regimen')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),

            Column::make('Municipio', 'municipio')
                ->sortable()
                ->searchable(),

            Column::make('Codigopostal', 'codigopostal')
                ->sortable()
                ->searchable(),

            Column::make('Colonia', 'colonia')
                ->sortable()
                ->searchable(),

            Column::make('Calle', 'calle')
                ->sortable()
                ->searchable(),

            Column::make('Numero', 'numero')
                ->sortable()
                ->searchable(),

            Column::make('Honorarios', 'honorarios')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Dc5', 'dc5')
                ->sortable()
                ->searchable(),

            Column::make('Cuentabancaria', 'cuentabancaria')
                ->sortable()
                ->searchable(),

            Column::make('Ine', 'ine')
                ->sortable()
                ->searchable(),

            Column::make('Curp', 'curp')
                ->sortable()
                ->searchable(),

            Column::make('Sat', 'sat')
                ->sortable()
                ->searchable(),

            Column::make('Domicilio', 'domicilio')
                ->sortable()
                ->searchable(),

            Column::make('Tipoinstructor', 'tipoinstructor')
                ->sortable()
                ->searchable(),

            Column::make('Nombre empresa', 'nombre_empresa')
                ->sortable()
                ->searchable(),

            Column::make('Rfc empre', 'rfc_empre')
                ->sortable()
                ->searchable(),

            Column::make('Calle empre', 'calle_empre')
                ->sortable()
                ->searchable(),

            Column::make('Numero empre', 'numero_empre')
                ->sortable()
                ->searchable(),

            Column::make('Colonia empre', 'colonia_empre')
                ->sortable()
                ->searchable(),

            Column::make('Municipio empre', 'municipio_empre')
                ->sortable()
                ->searchable(),

            Column::make('Estado empre', 'estado_empre')
                ->sortable()
                ->searchable(),

            Column::make('Postal empre', 'postal_empre')
                ->sortable()
                ->searchable(),

            Column::make('Regimen empre', 'regimen_empre')
                ->sortable()
                ->searchable(),

            Column::make('User id', 'nombre_usuario'),

            Column::make('Sucursal id', 'sucursal'),

            Column::make('Departamento id', 'departamento'),

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

    public function actions(Instruct $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarinstructor', ['id' => Crypt::encrypt($row->id)]),

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
