<?php

namespace App\Livewire\Portal360\Preguntas\PreguntasEmpresa;

use App\Models\Encuestas360\Respuesta;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class PreguntasEmpresaTable extends PowerGridComponent
{
    public string $tableName = 'preguntas-empresa-table-nllzw2-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::exportable(fileName: 'preguntas')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Respuesta::query()
            ->join('preguntas', 'preguntas.id', '=', '360_respuestas.preguntas_id')
            ->join('sucursales', 'sucursales.id', '=', '360_respuestas.sucursal_id') // Cambiado de 'empresas' a 'sucursales'
            ->select([
                '360_respuestas.id',
                'preguntas.id as pregunta_id',
                'preguntas.texto',
                'preguntas.descripcion',
                '360_respuestas.texto as respuesta_texto',
                '360_respuestas.puntuacion',
                'sucursales.nombre_sucursal as sucursal_nombre' // Cambiado de 'empresas.nombre as empresa_nombre'
            ])
            ->where('360_respuestas.empresa_id', Auth::user()->empresa_id);
    
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('pregunta_id')
            ->add('texto')
            ->add('descripcion')
            ->add('respuesta_texto')
            ->add('puntuacion')
            ->add('sucursal_nombre'); // Cambiado de 'empresa_nombre'
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Pregunta', 'texto')
                ->sortable()
                ->searchable(),

            Column::make('Descripción', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Respuesta', 'respuesta_texto')
                ->sortable()
                ->searchable(),

            Column::make('Puntuación', 'puntuacion')
                ->sortable()
                ->searchable(),

            Column::make('Sucursal', 'sucursal_nombre') // Cambiado de 'Empresa', 'empresa_nombre'
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }


    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Respuesta $row): array
    {
        $preguntaId = $row->pregunta_id;

        return [



            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarPreguntaEmpre', ['id' => Crypt::encrypt($preguntaId)]),

            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmarEliminarPreguntaEmpresa', ['id' => Crypt::encrypt($preguntaId)]),

        ];
    }
}
