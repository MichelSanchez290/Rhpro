<?php

namespace App\Livewire\PortalRh\Trabajador;

use App\Models\PortalRh\Trabajador;
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


final class TrabajadorTable extends PowerGridComponent
{
    public string $tableName = 'trabajador-table-hq43f0-table';
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
            PowerGrid::exportable(fileName: 'trabajadores') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Trabajador::query()
            ->with([
                'user', 
                'user.empresa',    // Singular (como está definido en User)
                'user.sucursal',
                'user.departamento', 
                'user.puesto',  
                'registroPatronal'
            ])
            ->leftJoin('users', 'trabajadores.user_id', '=', 'users.id')
            ->leftJoin('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->leftJoin('sucursales', 'users.sucursal_id', '=', 'sucursales.id')
            ->leftJoin('departamentos', 'users.departamento_id', '=', 'departamentos.id')
            ->leftJoin('puestos', 'users.puesto_id', '=', 'puestos.id')
            ->leftJoin('registros_patronales', 'trabajadores.registro_patronal_id', '=', 'registros_patronales.id')
            ->select([
                'trabajadores.*',
                'users.name as nombre_usuario',
                \DB::raw('COALESCE(empresas.nombre, "Sin Empresa") as empresa'),
                \DB::raw('COALESCE(sucursales.nombre_sucursal, "Sin Sucursal") as sucursal'),
                \DB::raw('COALESCE(departamentos.nombre_departamento, "Sin departamento") as departamento'),
                \DB::raw('COALESCE(puestos.nombre_puesto, "Sin Puesto") as puesto'),
                'registros_patronales.registro_patronal as regpatronal'
            ]);

        // Aplicar filtros según el rol del usuario autenticado
        if ($user->hasRole('GoldenAdmin')) {  // GoldenAdmin no tiene filtro y ve todos los registros
            return $query;

        } elseif ($user->hasRole('EmpresaAdmin')) { // EmpresaAdmin se limita a los usuarios de su empresa
            $query->where('users.empresa_id', $user->empresa_id);

        } elseif ($user->hasRole('SucursalAdmin')) { // SucursalAdmin se limita a los usuarios de su sucursal
            $query->where('users.sucursal_id', $user->sucursal_id);

        } elseif ($user->hasRole(['Trabajador PORTAL RH', 'Trabajador GLOBAL'])) { // Trabajador  verán únicamente su propio registro
            $query->where('users.id', $user->id);
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
            ->add('clave_trabajador')
            ->add('numero_seguridad_social')
            ->add('fecha_nacimiento_formatted', fn (Trabajador $model) => Carbon::parse($model->fecha_nacimiento)->format('d/m/Y'))
            ->add('lugar_nacimiento')
            ->add('estado')
            ->add('codigo_postal')
            ->add('sexo')
            ->add('curp')
            ->add('rfc')
            ->add('numero_celular')
            ->add('sueldo')
            ->add('fecha_ingreso_formatted', fn (Trabajador $model) => Carbon::parse($model->fecha_ingreso)->format('d/m/Y'))
            ->add('edad')
            ->add('estado_civil')
            ->add('estudios')
            ->add('ocupacion')
            ->add('tipo_puest')
            ->add('contratacion')
            ->add('tipo_personal')
            ->add('jornada_trabajo')
            ->add('rotacion')
            ->add('experiencia')
            ->add('tiempo_puesto')
            ->add('calle')
            ->add('colonia')
            ->add('numero')
            ->add('status')
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

            Column::make('Clave trabajador', 'clave_trabajador')
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

            Column::make('NSS', 'numero_seguridad_social')
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

            Column::make('Edad', 'edad')
                ->sortable()
                ->searchable(),

            Column::make('Estado civil', 'estado_civil')
                ->sortable()
                ->searchable(),

            Column::make('Estudios', 'estudios')
                ->sortable()
                ->searchable(),

            Column::make('Ocupacion', 'ocupacion')
                ->sortable()
                ->searchable(),

            Column::make('Tipo puest', 'tipo_puest')
                ->sortable()
                ->searchable(),

            Column::make('Contratacion', 'contratacion')
                ->sortable()
                ->searchable(),

            Column::make('Tipo personal', 'tipo_personal')
                ->sortable()
                ->searchable(),

            Column::make('Jornada trabajo', 'jornada_trabajo')
                ->sortable()
                ->searchable(),

            Column::make('Rotacion', 'rotacion')
                ->sortable()
                ->searchable(),

            Column::make('Experiencia', 'experiencia')
                ->sortable()
                ->searchable(),

            Column::make('Tiempo puesto', 'tiempo_puesto')
                ->sortable()
                ->searchable(),

            Column::make('Calle', 'calle')
                ->sortable()
                ->searchable(),

            Column::make('Colonia', 'colonia')
                ->sortable()
                ->searchable(),

            Column::make('Numero', 'numero')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Sueldo', 'sueldo')
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
            //Filter::datepicker('fecha_nacimiento'),
            //Filter::datepicker('fecha_ingreso'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Trabajador $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Trabajador')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editartrabajador', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Trabajador')) {
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