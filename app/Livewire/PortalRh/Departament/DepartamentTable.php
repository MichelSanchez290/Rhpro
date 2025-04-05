<?php

namespace App\Livewire\PortalRh\Departament;

use App\Models\PortalRh\Departamento;
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

final class DepartamentTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'departament-table-bjzvgk-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'departamentos') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 50,
                    3 => 50,
                    4 => 50,
                    5 => 30,
                ]), 
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Departamento::query()
            ->with(['sucursales.empresas'])
            ->leftJoin('departamento_sucursal', 'departamentos.id', '=', 'departamento_sucursal.departamento_id')
            ->leftJoin('sucursales', 'departamento_sucursal.sucursal_id', '=', 'sucursales.id')
            ->leftJoin('empresa_sucursal', 'sucursales.id', '=', 'empresa_sucursal.sucursal_id')
            ->leftJoin('empresas', 'empresa_sucursal.empresa_id', '=', 'empresas.id')
            ->select([
                'departamentos.*',
                \DB::raw('COALESCE(empresas.nombre, "Sin Empresa") as empresa'),
                \DB::raw('COALESCE(sucursales.nombre_sucursal, "Sin Sucursal") as sucursal')
            ]);

        if ($user->hasRole('GoldenAdmin')) {
            // GoldenAdmin: obtiene todos los departamentos sin filtro.
            return $query;
        } elseif ($user->hasRole('EmpresaAdmin')) {
            // EmpresaAdmin: obtener departamentos asociados a las sucursales de su empresa.
            $query->where('empresa_sucursal.empresa_id', $user->empresa_id);

        } elseif ($user->hasRole('SucursalAdmin')) {
            // SucursalAdmin: obtener departamentos asociados a su sucursal.
            $query->where('sucursales.id', $user->sucursal_id);
            
        } elseif ($user->hasRole(['Trabajador PORTAL RH', 'Trabajador GLOBAL'])) {
            // Trabajador PORTAL RH y Trabajador GLOBAL: obtener únicamente el departamento asociado a su usuario.
            $query->where('departamentos.id', $user->departamento_id);
        }

        return $query;
    }

    public function relationSearch(): array
    {
        return [
            'sucursales' => ['nombre_sucursal'], 
            'sucursales.empresas' => ['nombre'], 
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('nombre_departamento')
            ->add('empresa')
            ->add('sucursal')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Empresa asociada', 'empresa')
                ->sortable()
                ->searchable(), 

            Column::make('Sucursal asociada', 'sucursal')
                ->sortable()
                ->searchable(), 

            Column::make('Nombre departamento', 'nombre_departamento')
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
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Departamento $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Departamento')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editardepa', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Departamento')) {
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
