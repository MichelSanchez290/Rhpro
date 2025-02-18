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

use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class BecarioTable extends PowerGridComponent
{
    use WithExport;
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
            PowerGrid::exportable(fileName: 'becarios') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        return Becario::query()
        ->leftJoin('users', 'becarios.user_id', '=', 'users.id')
        ->leftJoin('departamentos', 'becarios.departamento_id', '=', 'departamentos.id')
        ->leftJoin('puestos', 'becarios.puesto_id', '=', 'puestos.id')
        ->leftJoin('registros_patronales', 'becarios.registro_patronal_id', '=', 'registros_patronales.id')
        ->select([
            'becarios.*',
            'users.name as nombre_usuario',
            'departamentos.nombre_departamento as departamento',
            'puestos.nombre_puesto as puesto',
            'registros_patronales.registro_patronal as regpatronal'
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
            ->add('nombre_usuario')
            ->add('departamento_id')
            ->add('departamento')
            ->add('puesto_id')
            ->add('puesto')
            ->add('registro_patronal_id')
            ->add('regpatronal')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Clave becario', 'clave_becario')
                ->sortable()
                ->searchable(),
            
            Column::make('User id', 'nombre_usuario'),

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

            Column::make('Departamento id', 'departamento'),

            Column::make('Puesto id', 'puesto'),

            Column::make('Registro patronal id', 'regpatronal'),

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
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarbecario', ['id' => Crypt::encrypt($row->id)]),
            
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
