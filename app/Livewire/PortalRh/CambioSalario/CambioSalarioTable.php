<?php

namespace App\Livewire\PortalRh\CambioSalario;

use App\Models\PortalRh\CambioSalario;
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

final class CambioSalarioTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'cambio-salario-table-nmuslw-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),

            PowerGrid::exportable(fileName: 'Cambios de salario')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 30,
                    3 => 20,
                    4 => 20,
                    5 => 20,
                    6 => 30,
                    7 => 30,
                ]), 
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = CambioSalario::query()
            ->with(['users.cambioSalario'])
            ->select([
                'cambio_salarios.*',
                'users.name as nombre_usuario',
            ])
            ->join('user_cambio_salario', 'cambio_salarios.id', '=', 'user_cambio_salario.cambio_salario_id')
            ->join('users', 'user_cambio_salario.user_id', '=', 'users.id');

        if ($user->hasRole('GoldenAdmin')) {
            // GoldenAdmin: Sin filtro, ve todos los registros.
            return $query;

        } elseif ($user->hasRole('EmpresaAdmin')) {
            // EmpresaAdmin: Se limita a los registros asociados a la misma empresa.
            $query->where('users.empresa_id', $user->empresa_id);

        } elseif ($user->hasRole('SucursalAdmin')) {
            // SucursalAdmin: Se limita a los registros vinculados a la misma sucursal.
            $query->where('users.sucursal_id', $user->sucursal_id);

        } elseif ($user->hasRole(['Trabajador PORTAL RH', 'Trabajador GLOBAL'])) {
            // Trabajador PORTAL RH y Trabajador GLOBAL: Verán únicamente su propio registro.
            $query->where('users.id', $user->id);
        }

        return $query;
    }

    public function relationSearch(): array
    {
        return [
            'users.cambioSalario' => ['name'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nombre_usuario')
            ->add('fecha_cambio_formatted', fn (CambioSalario $model) => Carbon::parse($model->fecha_cambio)->format('d/m/Y'))
            ->add('salario_anterior')
            ->add('salario_nuevo')
            ->add('motivo')
            ->add('documento', function (CambioSalario $model) {
                return '<a href="' . asset('PortalRH/CambioSalario/' . basename($model->documento)) . '" target="_blank" class="text-blue-600 hover:underline">Ver PDF</a>';
            })
            ->add('observaciones')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Usuario', 'nombre_usuario'),
            Column::make('Fecha cambio', 'fecha_cambio_formatted', 'fecha_cambio')
                ->sortable(),

            Column::make('Salario anterior', 'salario_anterior')
                ->sortable()
                ->searchable(),

            Column::make('Salario nuevo', 'salario_nuevo')
                ->sortable()
                ->searchable(),

            Column::make('Motivo', 'motivo')
                ->sortable()
                ->searchable(),

            Column::make('Documento', 'documento')
                ->sortable()
                ->visibleInExport(false)
                ->searchable(),

            Column::make('Observaciones', 'observaciones')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            //Filter::datepicker('fecha_cambio'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(CambioSalario $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Cambio Salario')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarcambiosal', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Cambio Salario')) {
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
