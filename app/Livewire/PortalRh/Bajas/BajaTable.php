<?php

namespace App\Livewire\PortalRh\Bajas;

use App\Models\User;
use App\Models\PortalRh\Baja;
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

final class BajaTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'baja-table-nvgkac-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'Bajas')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 30,
                    3 => 20,
                    4 => 40,
                    5 => 40,
                    6 => 30,
                ]), 
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Baja::query()
            ->with(['user.bajas'])
            ->join('users', 'bajas.user_id', '=', 'users.id')
            ->select([
                'bajas.*',
                'users.name as nombre_usuario',
            ]);

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
            'user.bajas' => ['name']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('nombre_usuario')
            ->add('fecha_baja_formatted', fn (Baja $model) => Carbon::parse($model->fecha_baja)->format('d/m/Y'))
            ->add('motivo_baja')
            ->add('tipo_baja')
            ->add('observaciones')
            ->add('created_at')
            ->add('updated_at')
            ->add('documento', function (Baja $model) {
                return '<a href="' . asset('PortalRH/Bajas/' . basename($model->documento)) . '" target="_blank" class="text-blue-600 hover:underline">Ver PDF</a>';
            })
            ;
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Usuario', 'nombre_usuario')
                ->sortable()
                ->searchable(),

            Column::make('Fecha baja', 'fecha_baja_formatted', 'fecha_baja')
                ->sortable(),

            Column::make('Motivo baja', 'motivo_baja')
                ->sortable()
                ->searchable(),

            Column::make('Tipo baja', 'tipo_baja')
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
            //Filter::datepicker('fecha_baja'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Baja $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Baja')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarbaja', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Baja')) {
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
