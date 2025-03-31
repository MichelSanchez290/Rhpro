<?php

namespace App\Livewire\PortalRh\Puest;

use App\Models\PortalRh\Puesto;
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


final class PuestTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'puest-table-ajm43f-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'puestos') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV), 
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Puesto::query()
        ->with(['departamentos.sucursales.empresas']) 
            ->leftJoin('departamento_puesto', 'puestos.id', '=', 'departamento_puesto.puesto_id')
            ->leftJoin('departamentos', 'departamento_puesto.departamento_id', '=', 'departamentos.id')
            ->leftJoin('departamento_sucursal', 'departamentos.id', '=', 'departamento_sucursal.departamento_id')
            ->leftJoin('sucursales', 'departamento_sucursal.sucursal_id', '=', 'sucursales.id')
            ->leftJoin('empresa_sucursal', 'sucursales.id', '=', 'empresa_sucursal.sucursal_id')
            ->leftJoin('empresas', 'empresa_sucursal.empresa_id', '=', 'empresas.id')
            ->select([
                'puestos.*',
                \DB::raw('COALESCE(empresas.nombre, "Sin Empresa") as empresa'),
                \DB::raw('COALESCE(sucursales.nombre_sucursal, "Sin Sucursal") as sucursal'),
                \DB::raw('COALESCE(departamentos.nombre_departamento, "Sin Departamento") as departamento')
            ]);

        if ($user->hasRole('GoldenAdmin')) {
            return Puesto::query();
        }

        // Si el usuario es trabajador o practicante, devolver solo su departamento
        return Puesto::where('id', $user->puesto_id);
    }

    public function relationSearch(): array
    {
        return [
            'departamentos' => ['nombre_departamento'],
            'departamentos.sucursales' => ['nombre_sucursal'],
            'departamentos.sucursales.empresas' => ['nombre'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('nombre_puesto')
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

            Column::make('Departamento asociado', 'departamento')
            ->sortable()
                ->searchable(), 

            Column::make('Nombre puesto', 'nombre_puesto')
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

    public function actions(Puesto $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Puesto')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarpuesto', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Puesto')) {
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
