<?php

namespace App\Livewire\PortalRh\RegistPatronal;

use App\Models\PortalRh\RegistroPatronal;
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

final class RegPatronalTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'reg-patronal-table-tofk9o-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'Registros-Patronales')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->striped('CCEBFF')
                ->columnWidth([
                    2 => 40,
                    3 => 20,
                    4 => 50,
                    5 => 50,
                    6 => 50,
                    7 => 50,
                    8 => 30,
                    9 => 20,
                    10 => 20,
                    11 => 30,
                    12 => 20,
                    13 => 30,
                    14 => 20,
                    15 => 30,
                    16 => 20,
                    17 => 20,
                    18 => 20,
                    20 => 20,
                    21 => 20,
                    22 => 30,
                    23 => 20,
                    24 => 20,
                    25 => 30,
                    26 => 30,
                    27 => 50,
                    28 => 50,
                    29 => 30,
                ]),
        ];
    }

    public function datasource(): Builder
    {
        $user = auth()->user();

        // Si es GoldenAdmin, obtiene todos los registros patronales
        if ($user->hasRole('GoldenAdmin')) {
            return RegistroPatronal::query();
        }

        // Si es EmpresaAdmin, SucursalAdmin, Trabajador PORTAL RH o Trabajador GLOBAL, obtener solo su Registro Patronal
        if (
            $user->hasRole('EmpresaAdmin') ||
            $user->hasRole('SucursalAdmin') ||
            $user->hasRole('Trabajador PORTAL RH') ||
            $user->hasRole('Trabajador GLOBAL')
        ) {
            return RegistroPatronal::whereHas('trabajadores', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orWhereHas('becarios', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orWhereHas('practicantes', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orWhereHas('instructores', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
        }

        // Si no tiene permisos, no devolverá ningún dato
        return RegistroPatronal::whereRaw('1=0');

    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('registro_patronal')
            ->add('rfc')
            ->add('nombre_o_razon_social')
            ->add('regimen_capital')
            ->add('regimen_fiscal')
            ->add('actividad_economica')
            ->add('imss_calle_manzana')
            ->add('imms_num_exterior')
            ->add('imms_num_int')
            ->add('imms_colonia')
            ->add('imms_codigo_postal')
            ->add('imms_estado')
            ->add('imms_municipio')
            ->add('imms_telefono')
            ->add('imms_convenio_rembolso_subsidios')
            ->add('imms_tipo_contribucion')
            ->add('area_geografica')
            ->add('delegacion_imms')
            ->add('subdelegacion_imms')
            ->add('prima_año')
            ->add('prima_mes')
            ->add('porcentaje_prima_rt')
            ->add('clase_riesgo_trabajo')
            ->add('acreditacion_stps')
            ->add('representante_legal')
            ->add('puesto_representante')
            ->add('cuenta_contable')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Registro patronal', 'registro_patronal')
                ->sortable()
                ->searchable(),

            Column::make('Rfc', 'rfc')
                ->sortable()
                ->searchable(),

            Column::make('Nombre o razon social', 'nombre_o_razon_social')
                ->sortable()
                ->searchable(),

            Column::make('Regimen capital', 'regimen_capital')
                ->sortable()
                ->searchable(),

            Column::make('Regimen fiscal', 'regimen_fiscal')
                ->sortable()
                ->searchable(),

            Column::make('Actividad economica', 'actividad_economica')
                ->sortable()
                ->searchable(),

            Column::make('Imss calle manzana', 'imss_calle_manzana')
                ->sortable()
                ->searchable(),

            Column::make('Imms num exterior', 'imms_num_exterior')
                ->sortable()
                ->searchable(),

            Column::make('Imms num int', 'imms_num_int')
                ->sortable()
                ->searchable(),

            Column::make('Imms colonia', 'imms_colonia')
                ->sortable()
                ->searchable(),

            Column::make('Imms codigo postal', 'imms_codigo_postal')
                ->sortable()
                ->searchable(),

            Column::make('Imms estado', 'imms_estado')
                ->sortable()
                ->searchable(),

            Column::make('Imms municipio', 'imms_municipio')
                ->sortable()
                ->searchable(),

            Column::make('Imms telefono', 'imms_telefono')
                ->sortable()
                ->searchable(),

            Column::make('Imms convenio rembolso subsidios', 'imms_convenio_rembolso_subsidios')
                ->sortable()
                ->searchable(),

            Column::make('Imms tipo contribucion', 'imms_tipo_contribucion')
                ->sortable()
                ->searchable(),

            Column::make('Area geografica', 'area_geografica')
                ->sortable()
                ->searchable(),

            Column::make('Delegacion imms', 'delegacion_imms')
                ->sortable()
                ->searchable(),

            Column::make('Subdelegacion imms', 'subdelegacion_imms')
                ->sortable()
                ->searchable(),

            Column::make('Prima año', 'prima_año')
                ->sortable()
                ->searchable(),

            Column::make('Prima mes', 'prima_mes')
                ->sortable()
                ->searchable(),

            Column::make('Porcentaje prima rt', 'porcentaje_prima_rt')
                ->sortable()
                ->searchable(),

            Column::make('Clase riesgo trabajo', 'clase_riesgo_trabajo')
                ->sortable()
                ->searchable(),

            Column::make('Acreditacion stps', 'acreditacion_stps')
                ->sortable()
                ->searchable(),

            Column::make('Representante legal', 'representante_legal')
                ->sortable()
                ->searchable(),

            Column::make('Puesto representante', 'puesto_representante')
                ->sortable()
                ->searchable(),

            Column::make('Cuenta contable', 'cuenta_contable')
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

    public function actions(RegistroPatronal $row): array
    {
        $actions = [];

        if (Gate::allows('Editar Reg Patronal')) {
            $actions[] = Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarregpatronal', ['id' => Crypt::encrypt($row->id)]);
        }

        if (Gate::allows('Eliminar Reg Patronal')) {
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
