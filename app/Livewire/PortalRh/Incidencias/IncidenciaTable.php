<?php

namespace App\Livewire\PortalRh\Incidencias;

use App\Models\PortalRh\Incidencia;
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
use Illuminate\Support\Facades\DB;

final class IncidenciaTable extends PowerGridComponent
{
    public string $tableName = 'incidencia-table-truwzm-table';
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
            PowerGrid::exportable(fileName: 'Incidencias') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 50,
                    3 => 50,
                    4 => 20,
                    5 => 20,
                ]), 
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Incidencia::query()
            ->with(['users.incidencias'])
            ->select([
                'incidencias.*',
                'users.name as nombre_usuario',
                //'users.tipo_user as tipo'
            ])
            ->join('user_incidencia', 'incidencias.id', '=', 'user_incidencia.incidencia_id')
            ->join('users', 'user_incidencia.user_id', '=', 'users.id');

        if ($user->hasRole('GoldenAdmin')) {
            // GoldenAdmin: sin filtro, ve todos los registros.
            return $query;
        } elseif ($user->hasRole('EmpresaAdmin')) {
            // EmpresaAdmin: se limita a los registros asociados a la misma empresa.
            $query->where('users.empresa_id', $user->empresa_id);
        } elseif ($user->hasRole('SucursalAdmin')) {
            // SucursalAdmin: se limita a los registros vinculados a la misma sucursal.
            $query->where('users.sucursal_id', $user->sucursal_id);
        } elseif ($user->hasRole(['Trabajador PORTAL RH', 'Trabajador GLOBAL'])) {
            // Trabajador PORTAL RH y Trabajador GLOBAL: verán únicamente su propio registro.
            $query->where('users.id', $user->id);
        }

        return $query;
    }

    public function relationSearch(): array
    {
        return [
            'users.incidencias' => ['name'],
            //'users.incidencias' => ['tipo_user'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('nombre_usuario')
            //->add('tipo')
            ->add('tipo_incidencia')
            ->add('status')
            ->add('fecha_inicio_formatted', fn (Incidencia $model) => Carbon::parse($model->fecha_inicio)->format('d/m/Y'))
            ->add('fecha_final_formatted', fn (Incidencia $model) => Carbon::parse($model->fecha_final)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Usuario', 'nombre_usuario')
                ->sortable()
                ->searchable(),
            
            Column::make('Incidencia', 'tipo_incidencia')
                ->sortable()
                ->searchable(),

            Column::make('Fecha inicio',  'fecha_inicio')
                ->sortable(),

            Column::make('Fecha final', 'fecha_final')
                ->sortable(),

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

    public function actions(Incidencia $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Incidencia')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarincidencia', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Incidencia')) {
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
