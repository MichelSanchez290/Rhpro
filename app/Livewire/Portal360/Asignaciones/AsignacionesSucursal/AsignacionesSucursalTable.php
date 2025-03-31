<?php

namespace App\Livewire\Portal360\Asignaciones\AsignacionesSucursal;

use App\Models\Encuestas360\Asignacion;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class AsignacionesSucursalTable extends PowerGridComponent
{
    public string $tableName = 'asignaciones-sucursal-table-i8obwh-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Asignacion::query()
            ->with(['calificador', 'users', 'calificado', 'relacion', 'encuesta'])
            ->whereHas('calificador', function (Builder $query) {
                $query->where('empresa_id', Auth::user()->empresa_id);
            })
            ->whereHas('calificado', function (Builder $query) {
                $query->where('sucursal_id', Auth::user()->sucursal_id);
            });
    }

    public function relationSearch(): array
    {
        return [];
    }

    // public function fields(): PowerGridFields
    // {
    //     return PowerGrid::fields()
    //         ->add('id')
    //         ->add('realizada')
    //         ->add('fecha_formatted', fn(Asignacion $model) => Carbon::parse($model->fecha)->format('d/m/Y'))
    //         ->add('calificador.nombre', fn($asignacion) => $asignacion->calificador->name ?? 'N/A')
    //         ->add('calificado.nombre', fn($asignacion) => $asignacion->calificado->name ?? 'N/A')
    //         ->add('relacion.nombre', fn($asignacion) => $asignacion->relacion->nombre ?? 'N/A')
    //         ->add('encuesta.nombre', fn($asignacion) => $asignacion->encuesta->nombre ?? 'N/A')
    //         ->add('estatus_personalizado', function (Asignacion $model) {
    //             $hoy = Carbon::today();
    //             $fechaAsignacion = Carbon::parse($model->fecha)->startOfDay();

    //             if ($model->realizada) {
    //                 return 'Completada';
    //             } elseif ($hoy->equalTo($fechaAsignacion)) {
    //                 return 'Disponible hoy';
    //             } elseif ($hoy->lessThan($fechaAsignacion)) {
    //                 return 'Futura';
    //             } else {
    //                 return 'Expirada';
    //             }
    //         });
    // }
    public function fields(): PowerGridFields
{
    return PowerGrid::fields()
        ->add('id')
        ->add('realizada_si_no', fn(Asignacion $model) => $model->realizada ? 'Sí' : 'No') // Modificación aquí  ->add('realizada_si_no', fn(Asignacion $model) => $model->realizada ? 'Sí' : 'No')
        ->add('fecha_formatted', fn(Asignacion $model) => Carbon::parse($model->fecha)->format('d/m/Y'))
        ->add('calificador.nombre', fn($asignacion) => $asignacion->calificador->name ?? 'N/A')
        ->add('calificado.nombre', fn($asignacion) => $asignacion->calificado->name ?? 'N/A')
        ->add('relacion.nombre', fn($asignacion) => $asignacion->relacion->nombre ?? 'N/A')
        ->add('encuesta.nombre', fn($asignacion) => $asignacion->encuesta->nombre ?? 'N/A')
        ->add('estatus_personalizado', function (Asignacion $model) {
            $hoy = Carbon::today();
            $fechaAsignacion = Carbon::parse($model->fecha)->startOfDay();

            if ($model->realizada) {
                return 'Completada';
            } elseif ($hoy->equalTo($fechaAsignacion)) {
                return 'Disponible hoy';
            } elseif ($hoy->lessThan($fechaAsignacion)) {
                return 'Futura';
            } else {
                return 'Expirada';
            }
        });
}

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Realizada', 'realizada_si_no')
                ->sortable()
                ->searchable(),
            Column::make('Fecha', 'fecha_formatted')
                ->sortable(),
            Column::make('Calificador', 'calificador.nombre')
                ->sortable()
                ->searchable(),
            Column::make('Calificado', 'calificado.nombre')
                ->sortable()
                ->searchable(),
            Column::make('Relación', 'relacion.nombre')
                ->sortable()
                ->searchable(),
            Column::make('Encuesta', 'encuesta.nombre')
                ->sortable()
                ->searchable(),
            Column::make('Estatus', 'estatus_personalizado')
                ->sortable(),
            Column::action('Action')
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Asignacion $row): array
    {
        return [

            Button::add('edit')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 0 1 0 2.828l-10 10A2 2 0 0 1 6 16H4a1 1 0 0 1-1-1v-2a2 2 0 0 1 .586-1.414l10-10a2 2 0 0 1 2.828 0zM5 13v2h2l10-10-2-2L5 13z"/>
                        </svg> Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-3 rounded-lg shadow-md transition-all duration-300 flex items-center')
                ->route('editarAsignacionesSocursal', ['id' => Crypt::encrypt($row->id)]),

            Button::add('delete')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v1h3a1 1 0 1 1 0 2h-1v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5H2a1 1 0 1 1 0-2h3V2zm2 1v1h4V3H8zM5 5v11h10V5H5zm3 3a1 1 0 0 1 2 0v5a1 1 0 0 1-2 0V8zm4 0a1 1 0 0 1 2 0v5a1 1 0 0 1-2 0V8z" clip-rule="evenodd"/>
                        </svg> Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-300 flex items-center')
                ->dispatch('confirmarEliminarAsignacionSucursal', ['id' => Crypt::encrypt($row->id)]),
        ];

    
    }

    // return $actions;
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
