<?php

namespace App\Livewire\Dx035\Encuestas;

use App\Models\Dx035\EncuestaCuestionario;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use Illuminate\Database\Eloquent\Builder;

final class EncuestaTable extends PowerGridComponent
{
    public string $tableName = 'encuestas_table'; // Nombre único para la tabla
    public string $primaryKey = 'id';            // Especificar que la clave primaria es 'id'
    public string $keyType = 'int';              // Especificar que la clave primaria es de tipo int

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(), // Habilitar la barra de búsqueda

            PowerGrid::footer()
                ->showPerPage() // Mostrar selector de elementos por página
                ->showRecordCount(), // Mostrar contador de registros
        ];
    }

    public function datasource(): Builder
    {
        return EncuestaCuestionario::query()
            ->join('encuestas', 'encuesta_cuestionario.encuesta_clave', '=', 'encuestas.Clave')
            ->select('encuesta_cuestionario.*', 'encuestas.Empresa', 'encuestas.Formato', 'encuestas.FechaInicio', 'encuestas.FechaFinal', 'encuestas.Estado', 'encuestas.EncuestasContestadas')
            ->orderBy('encuesta_cuestionario.id', 'asc'); // Ordenar por el 'id' de la tabla pivote
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('Empresa')
            ->addColumn('Formato')
            ->addColumn('encuesta_clave')
            ->addColumn('FechaInicio')
            ->addColumn('FechaFinal')
            ->addColumn('Estado')
            ->addColumn('EncuestasContestadas');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(), // Permitir ordenamiento

            Column::make('Empresa', 'Empresa')
                ->searchable() // Permitir búsqueda
                ->sortable(), // Permitir ordenamiento

            Column::make('Cuestionarios', 'Formato')
                ->bodyAttribute('text-center'),

            Column::make('Compartir', 'encuesta_clave')
                ->bodyAttribute('text-center'),

            Column::make('Inicio', 'FechaInicio')
                ->sortable(), // Permitir ordenamiento

            Column::make('Cierre', 'FechaFinal')
                ->sortable(), // Permitir ordenamiento

            Column::make('Estado', 'Estado')
                ->bodyAttribute('text-center'),

            Column::make('Avance', 'EncuestasContestadas')
                ->bodyAttribute('text-center'),

            Column::action('Acciones'), // Columna de acciones
        ];
    }

    public function actions(EncuestaCuestionario $row): array
    {
        return [
            // Botón: Editar
            Button::add('edit')
                ->slot('Editar')
                ->class('btn btn-primary')
                ->route('encuestas.edit', ['Clave' => $row->encuesta_clave]),

            // Botón: Eliminar
            Button::add('delete')
                ->slot('Eliminar')
                ->class('btn btn-danger')
                ->dispatch('confirmDelete', ['clave' => $row->encuesta_clave]), // Emitir evento para eliminar
        ];
    }
}
