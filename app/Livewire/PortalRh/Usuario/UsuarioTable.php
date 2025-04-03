<?php

namespace App\Livewire\PortalRh\Usuario;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

//use PowerComponents\LivewirePowerGrid\Components\Exports\Exportable;
//use PowerComponents\LivewirePowerGrid\Components\Exportable;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

final class UsuarioTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'usuario-table-gb4tbl-table';

    public function setUp(): array
    {
        $this->showCheckBox();
        
        return [
            PowerGrid::exportable(fileName: 'usuarios') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 40,
                    3 => 40,
                    4 => 20,
                    5 => 30,
                    6 => 80,
                    7 => 80,
                    8 => 80,
                    9 => 70,
                    10 => 30,
                ]),
                
            PowerGrid::header()
                ->showSearchInput(),

            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = User::query()
            ->leftJoin('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->leftJoin('sucursales', 'users.sucursal_id', '=', 'sucursales.id')
            ->leftJoin('departamentos', 'users.departamento_id', '=', 'departamentos.id')
            ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select([
                'users.*',
                \DB::raw('COALESCE(empresas.nombre, "Sin Empresa") as empresa'),
                \DB::raw('COALESCE(sucursales.nombre_sucursal, "Sin Sucursal") as sucursal'),
                \DB::raw('COALESCE(departamentos.nombre_departamento, "Sin departamento") as departamento'),
                \DB::raw('COALESCE(puestos.nombre_puesto, "Sin Puesto") as puesto'),
                \DB::raw('COALESCE(users.tipo_user, "Sin tipo") as tipo_user'),
                \DB::raw('COALESCE(roles.name, "Sin Rol") as rol'),
            ]);

        // Aplicar filtros según el rol del usuario autenticado
        if ($user->hasRole('GoldenAdmin')) { // GoldenAdmin ve todos los registros (sin filtro)
            return $query;

        } elseif ($user->hasRole('EmpresaAdmin')) { // EmpresaAdmin ve solo los usuarios de su empresa
            return $query->where('users.empresa_id', $user->empresa_id);

        } elseif ($user->hasRole('SucursalAdmin')) { // SucursalAdmin ve solo los usuarios de su sucursal
            return $query->where('users.sucursal_id', $user->sucursal_id);

        } elseif ($user->hasRole(['Trabajador PORTAL RH', 'Trabajador GLOBAL'])) { // Trabajador solo ve sus propios registros
            return $query->where('users.id', $user->id);
        }

        // Si no se reconoce el rol, se retorna una consulta vacía
        return $query->whereRaw('1 = 0');
    }

    public function relationSearch(): array
    {
        return [
            'roles' => ['name'], // Esto permite buscar en el nombre del rol
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('empresa_id')
            ->add('sucursal_id')
            ->add('empresa')
            ->add('sucursal')
            ->add('departamento')
            ->add('puesto')
            ->add('tipo_user')
            ->add('rol', function(User $model) {
                return $model->rol; // Esto hace referencia al alias que definiste en tu consulta SQL
            })
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Nombre', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Correo', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Tipo Usuario', 'tipo_user')
                ->sortable()
                ->searchable(),

            Column::make('Rol', 'rol')
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

            Column::make('Creado el', 'created_at')
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

    public function actions(User $row): array
    {
        $actions = [];

        if (Gate::allows('Asignar Rol a Usuario')) {
            $actions[] = Button::add('edit')
                ->slot('Asignar rol')
                ->class('bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded')
                ->route('agregarroluser', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Editar Usuario')) {
            $actions[] = Button::add('edit')
                ->slot('Editar Usuario')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editaruser', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Usuario')) {
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
