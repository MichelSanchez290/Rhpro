<?php

namespace App\Livewire\PortalRh\Incapacidad;

use App\Models\PortalRh\Incapacidad;
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

final class IncapacidadTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'incapacidad-table-u97jjs-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'Incapacidades') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 30,
                    3 => 20,
                    4 => 20,
                    5 => 20,
                    6 => 40,
                    7 => 40,
                    8 => 40,
                ]), 
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Incapacidad::query()
            ->with(['users.incapacidades'])
            ->select([
                'incapacidades.*',
                'incapacidades.status as status',
                'users.name as nombre',
                //'users.tipo_user as tipo'
            ])
            ->join('user_incapacidad', 'incapacidades.id', '=', 'user_incapacidad.incapacidad_id')
            ->join('users', 'user_incapacidad.user_id', '=', 'users.id');

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
            // Trabajador PORTAL RH y Trabajador GLOBAL: verán únicamente su propio registro,
            $query->where('users.id', $user->id);
        }

        return $query;
    }

    public function relationSearch(): array
    {
        return [
            'users.incapacidades' => ['name'],
            //'users.incapacidades' => ['tipo_user'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('nombre')
            //->add('tipo')
            ->add('fecha_inicio_formatted', fn (Incapacidad $model) => Carbon::parse($model->fecha_inicio)->format('d/m/Y'))
            ->add('fecha_final_formatted', fn (Incapacidad $model) => Carbon::parse($model->fecha_final)->format('d/m/Y'))
            ->add('motivo')
            ->add('tipo')
            ->add('documento', function (Incapacidad $model) {
                return '<a href="' . asset('PortalRH/Incapacidades/' . basename($model->documento)) . '" target="_blank" class="text-blue-600 hover:underline">Ver Justificante</a>';
            })
            ->add('status')
            ->add('observaciones');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Usuario', 'nombre')
                ->sortable()
                ->searchable(),

            

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Fecha inicio', 'fecha_inicio_formatted', 'fecha_inicio')
                ->sortable(),

            Column::make('Fecha final', 'fecha_final_formatted', 'fecha_final')
                ->sortable(),

            Column::make('Motivo', 'motivo')
                ->sortable()
                ->searchable(),

            Column::make('Tipo', 'tipo')
                ->sortable()
                ->searchable(),

            Column::make('Documento', 'documento')
                ->visibleInExport(false)
                ->sortable(),

            Column::make('Observaciones', 'observaciones')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            //Filter::datepicker('fecha_inicio'),
            //Filter::datepicker('fecha_final'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Incapacidad $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Incapacidad')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarincapacidad', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Incapacidad')) {
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
