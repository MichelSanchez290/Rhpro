<?php

namespace App\Livewire\PortalRh\InfonavitCreditos;

use App\Models\User;
use App\Models\PortalRh\InfonavitCredito;
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

final class InfonavitCreditoTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'infonavit-credito-table-cgaugf-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'Creditos infonavit')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder 
    {
        $user = Auth::user();

        $query = InfonavitCredito::query()
            ->with(['user.infonavit']) 
            ->join('users', 'infonavit_creditos.user_id', '=', 'users.id')
            ->select([
                'infonavit_creditos.*',
                'users.name as nombre_usuario'
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
    //->with(['user.infonavitCreditos'])

    public function relationSearch(): array
    {
        return [
            'user.infonavit' => ['name']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('tipo_movimiento')
            ->add('numero_credito')
            ->add('fecha_movimiento_formatted', fn (InfonavitCredito $model) => Carbon::parse($model->fecha_movimiento)->format('d/m/Y'))
            ->add('tipo_descuento')
            ->add('valor_descuento')
            ->add('nombre_usuario')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Usuario', 'nombre_usuario')
                ->sortable()
                ->searchable(),

            Column::make('Tipo movimiento', 'tipo_movimiento')
                ->sortable()
                ->searchable(),

            Column::make('Numero credito', 'numero_credito')
                ->sortable()
                ->searchable(),

            Column::make('Fecha movimiento', 'fecha_movimiento_formatted', 'fecha_movimiento')
                ->sortable(),

            Column::make('Tipo descuento', 'tipo_descuento')
                ->sortable()
                ->searchable(),

            Column::make('Valor descuento', 'valor_descuento')
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
            //Filter::datepicker('fecha_movimiento'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(InfonavitCredito $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Infonavit Credito')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarinfonavit', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Infonavit Credito')) {
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
