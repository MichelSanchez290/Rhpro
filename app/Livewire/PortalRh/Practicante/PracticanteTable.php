<?php

namespace App\Livewire\PortalRh\Practicante;

use App\Models\PortalRh\Practicante;
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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

final class PracticanteTable extends PowerGridComponent
{
    public string $tableName = 'practicante-table-zowier-table';
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
            PowerGrid::exportable(fileName: 'practicantes') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Practicante::query()
        ->with([
            'user', 
            'user.empresa',    // Singular (como está definido en User)
            'user.sucursal',
            'user.departamento', 
            'user.puesto',  
            'registroPatronal'
        ])
            ->leftJoin('users', 'practicantes.user_id', '=', 'users.id')
            ->leftJoin('departamentos', 'users.departamento_id', '=', 'departamentos.id')
            ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
            ->leftJoin('registros_patronales', 'practicantes.registro_patronal_id', '=', 'registros_patronales.id')
            ->select([
                'practicantes.*',
                'users.name as nombre_usuario',
                'departamentos.nombre_departamento as departamento',
                'puestos.nombre_puesto as puesto',
                'registros_patronales.registro_patronal as regpatronal'
            ]);

        // Filtrar por departamento si el usuario es Trabajador o Practicante
        if ($user->hasRole(['Trabajador PORTAL RH', 'Trabajador GLOBAL', 'Practicante'])) {
            $query->where('practicantes.departamento_id', $user->departamento_id);
        }

        return $query;
    }

    public function relationSearch(): array
    {
        return [
            'user' => ['name'],
            'registroPatronal' => ['registro_patronal'],
            
            // Para los campos que están en relaciones a través de user
            'user.empresa' => ['nombre'], 
            'user.sucursal' => ['nombre_sucursal'],
            'user.departamento' => ['nombre_departamento'],
            'user.puesto' => ['nombre_puesto'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('clave_practicante')
            ->add('numero_seguridad_social')
            ->add('fecha_nacimiento_formatted', fn (Practicante $model) => Carbon::parse($model->fecha_nacimiento)->format('d/m/Y'))
            ->add('lugar_nacimiento')
            ->add('estado')
            ->add('codigo_postal')
            ->add('ocupacion')
            ->add('sexo')
            ->add('curp')
            ->add('rfc')
            ->add('numero_celular')
            ->add('user_id')
            ->add('nombre_usuario')
            ->add('registro_patronal_id')
            ->add('regpatronal')
            ->add('empresa')
            ->add('sucursal')
            ->add('departamento')
            ->add('puesto')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Clave practicante', 'clave_practicante')
                ->sortable()
                ->searchable(),

            Column::make('Usuario', 'nombre_usuario')
                ->sortable()
                ->searchable(),

            Column::make('Empresa', 'empresa')
                ->sortable()
                ->searchable(),

            Column::make('Sucursal', 'sucursal')
                ->sortable()
                ->searchable(),

            Column::make('Departamento', 'departamento')
                ->sortable()
                ->searchable(),

            Column::make('Puesto', 'puesto')
                ->sortable()
                ->searchable(),

            Column::make('Reg patronal', 'regpatronal')
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
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Practicante $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Practicante')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarpracticante', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Practicante')) {
            $actions[] = Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmDelete', ['id' => $row->id]); 
        }

        return $actions;
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
