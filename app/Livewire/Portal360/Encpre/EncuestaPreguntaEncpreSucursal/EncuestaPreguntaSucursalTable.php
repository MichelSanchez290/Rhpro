<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreSucursal;

use App\Models\Encuestas360\Encpre;
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

final class EncuestaPreguntaSucursalTable extends PowerGridComponent
{
    public string $tableName = 'encuesta-pregunta-sucursal-table-tclwh1-table';

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
            ])
            ->where('360_encuestas.empresa_id', Auth::user()->empresa_id);
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
                ->slot('Editar')  // Usando slot() en lugar de caption()
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarEncuestaSucursal', ['id' => Crypt::encrypt($row->id)]),


            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmarEliminarEncriptSucursal', ['id' => Crypt::encrypt($row->id)]),
        ];


        // $actions = [];

        // if (auth()->check()) {
        //     if (auth()->user()->hasPermissionTo('Editar Encpre ADMIN SUCURSAL')) {
        //         $actions[] = Button::add('edit')
        //         ->slot('Editar')  // Usando slot() en lugar de caption()
        //         ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
        //         ->route('editarEncuestaSucursal', ['id' => Crypt::encrypt($row->id)]);
        //     }

        //     if (auth()->user()->hasPermissionTo('Eliminar Encpre ADMIN SUCURSAL')) {
        //         $actions[] = Button::add('delete')
        //         ->slot('Eliminar')
        //         ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
        //         ->dispatch('confirmarEliminarEncriptSucursal', ['id' => Crypt::encrypt($row->id)]);
        //     }
        // }

        // return $actions;
    }

}
