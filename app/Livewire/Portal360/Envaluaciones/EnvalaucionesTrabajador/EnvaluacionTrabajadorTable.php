<?php

namespace App\Livewire\Portal360\Envaluaciones\EnvalaucionesTrabajador;

use App\Models\Encuestas360\Asignacion;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EnvaluacionTrabajadorTable extends PowerGridComponent
{
    public string $tableName = 'envaluacion-trabajador-table-vx6fpq-table';

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
        ->leftJoin('users as calificador', 'asignaciones.calificador_id', '=', 'calificador.id')
        ->leftJoin('users as calificado', 'asignaciones.calificado_id', '=', 'calificado.id')
        ->leftJoin('relaciones', 'asignaciones.relaciones_id', '=', 'relaciones.id')
        ->leftJoin('360_encuestas', 'asignaciones.360_encuestas_id', '=', '360_encuestas.id')
        ->select([
            'asignaciones.*',
            'calificador.name as calificador_name',
            'calificado.name as calificado_name',
            'relaciones.nombre as relacion_nombre',
            '360_encuestas.nombre as encuesta_nombre',
        ])
        ->where('asignaciones.calificador_id', auth()->id())
        ->where('asignaciones.realizada', 0);
}

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('calificador_name')
            ->add('calificado_name')
            ->add('relacion_nombre')
            ->add('encuesta_nombre')
            ->add('realizada_formatted', fn (Asignacion $model) => $model->realizada ? 'Completada' : 'Pendiente')
            ->add('fecha_formatted', fn (Asignacion $model) => Carbon::parse($model->fecha)->format('d/m/Y'));
    }
    
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Encuesta', 'encuesta_nombre')
                ->sortable()
                ->searchable(),
            Column::make('A evaluar', 'calificado_name')
                ->sortable()
                ->searchable(),
            Column::make('Rol del Evaluador', 'calificador_name')
                ->sortable()
                ->searchable(),
            Column::make('Relación', 'relacion_nombre')
                ->sortable()
                ->searchable(),
            Column::make('Fecha', 'fecha_formatted', 'fecha')
                ->sortable(),
            Column::make('Estatus', 'realizada_formatted') // Usar el campo preformateado
                ->sortable(),
            Column::action('Acción'),
        ];
    }

   

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Asignacion $row): array
    {
        return [
            Button::add('comenzar')
            ->slot('Comenzar')
            ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
            // ->route('portal360.envaluaciones.responder-encuesta', ['asignacion' => $row->id]),
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
