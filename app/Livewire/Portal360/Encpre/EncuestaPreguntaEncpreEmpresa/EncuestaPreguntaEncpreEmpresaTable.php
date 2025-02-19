<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreEmpresa;

use App\Models\Encuestas360\Encpre;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EncuestaPreguntaEncpreEmpresaTable extends PowerGridComponent
{
    public string $tableName = 'encuesta-pregunta-encpre-empresa-table-nslktc-table';

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
        return Encpre::query()
            ->join('360_encuestas', '360_encuestas.id', '=', 'encpres.encuestas_id')
            ->join('preguntas', 'preguntas.id', '=', 'encpres.preguntas_id')
            ->select([
                'encpres.*',
                '360_encuestas.nombre as encuesta_nombre',
                'preguntas.texto as pregunta_texto'
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
            ->add('encuesta_nombre')
            ->add('pregunta_texto')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Encuesta', 'encuesta_nombre')
                ->sortable()
                ->searchable(),
            Column::make('Pregunta', 'pregunta_texto')
                ->sortable()
                ->searchable(),
            Column::make('Fecha Creación', 'created_at')
                ->sortable(),


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

    public function actions(Encpre $row): array
    {
        return [

            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),

                Button::add('edit')
                ->slot('Editar')  // Usando slot() en lugar de caption()
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarEncuestaEmpresa', ['id' => Crypt::encrypt($row->id)]),


                Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmarEliminarEncriptEmpresa', ['id' => Crypt::encrypt($row->id)]),
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
