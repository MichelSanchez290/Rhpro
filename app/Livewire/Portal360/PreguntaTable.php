<?php

namespace App\Livewire\portal360;

use App\Models\Encuestas360\Pregunta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;


final class PreguntaTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'pregunta-table-ft5cob-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGRid::exportable(fileName: 'preguntas')
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
        return Pregunta::query()->with('respuestas');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('texto')
            ->add('descripcion')
            ->add('respuestas_texto', fn(Pregunta $model) => $model->respuestas->map(function ($respuesta) {
                return $respuesta->texto;
            })->join('<br>'))
            ->add('respuestas_puntuacion', fn(Pregunta $model) => $model->respuestas->map(function ($respuesta) {
                return $respuesta->puntuacion;
            })->join('<br>'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Texto', 'texto')
                ->sortable()
                ->searchable(),

            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),

                Column::make('Respuestas', 'respuestas_texto')
                ->sortable()
                ->searchable()
                ->bodyAttribute('raw-html'),
    
            Column::make('Puntuación', 'respuestas_puntuacion')
                ->sortable()
                ->searchable()
                ->bodyAttribute('raw-html'),

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

    public function actions(Pregunta $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editpregunta', ['id' => Crypt::encrypt($row->id)]),


            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('eliminarPregunta', ['id' => Crypt::encrypt($row->id)]),
        ];
    }
}
