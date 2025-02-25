<?php

namespace App\Livewire\Portal360\Preguntas\PreguntasAdministrador;

use App\Models\Encuestas360\Pregunta;
use App\Models\Encuestas360\Respuesta;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MostrarPreguntasAdministradorTable extends PowerGridComponent
{
    public string $tableName = 'mostrar-preguntas-administrador-table-oilhoo-table';

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
            ->join('empresas', 'empresas.id', '=', '360_respuestas.empresa_id')
            ->join('sucursales', 'sucursales.id', '=', '360_respuestas.sucursal_id')
            ->select([
                '360_respuestas.id',
                'preguntas.id as pregunta_id',
                'preguntas.texto',
                'preguntas.descripcion',
                '360_respuestas.texto as respuesta_texto',
                '360_respuestas.puntuacion',
                'empresas.nombre as empresa_nombre',
                'sucursales.nombre_sucursal as sucursal_nombre'
            ]);
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
            ->add('empresa_nombre')
            ->add('sucursal_nombre');
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

            Column::make('Empresa', 'empresa_nombre')
                ->sortable()
                ->searchable(),

            Column::make('Sucursal', 'sucursal_nombre')
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

    public function actions($row): array
    {
        // Obtener el ID de la pregunta relacionada con esta respuesta
        $preguntaId = $row->pregunta_id;

        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarPreguntaAdmin', ['id' => Crypt::encrypt($preguntaId)]),

            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmarEliminarPregunta', ['id' => Crypt::encrypt($preguntaId)])
        ];
    }
}
