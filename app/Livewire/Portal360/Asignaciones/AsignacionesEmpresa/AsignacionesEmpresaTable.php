<?php

namespace App\Livewire\Portal360\Asignaciones\AsignacionesEmpresa;

use App\Models\Encuestas360\Asignacion;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class AsignacionesEmpresaTable extends PowerGridComponent
{
    public string $tableName = 'asignaciones-empresa-table-ydxwxa-table';

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
            ->with(['calificador', 'users', 'calificado', 'relacion', 'encuesta']);
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
            ->add('realizada')
            ->add('fecha_formatted')
            ->add('calificador.nombre', fn($asignacion) => $asignacion->calificador->name ?? 'N/A')
            ->add('calificado.nombre', fn($asignacion) => $asignacion->calificado->name ?? 'N/A')
            ->add('relacion.nombre', fn($asignacion) => $asignacion->relacion->nombre ?? 'N/A')
            ->add('encuesta.nombre', fn($asignacion) => $asignacion->encuesta->nombre ?? 'N/A')
            ->add('empresa_nombre', fn($asignacion) => $asignacion->calificador->empresa->nombre ?? 'N/A')
            ->add('sucursal_nombre', fn($asignacion) => $asignacion->calificado->sucursal->nombre_sucursal ?? 'N/A');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Realizada', 'realizada')
                ->sortable()
                ->searchable(),

            Column::make('Fecha',  'fecha')
                ->sortable(),

            Column::make('Nombre Empresa', 'empresa_nombre')
                ->sortable()
                ->searchable(),

            Column::make('Nombre Sucursal', 'sucursal_nombre')
                ->sortable()
                ->searchable(),


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

            Column::action('Action')
        ];
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::datepicker('fecha'),
    //     ];
    // }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Asignacion $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('portal360.asignaciones.asignaciones-empresa.editar-asignaciones-empresa', ['id' => Crypt::encrypt($row->id)]),


            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmarEliminarAsignacionEmpresa', ['id' => Crypt::encrypt($row->id)]),

            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
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
