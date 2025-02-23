<?php

namespace App\Livewire\Portal360\Encuesta\EncuestaEmpresa;

use App\Models\Encuestas360\Encuesta360;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EncuestaEmpresaTable extends PowerGridComponent
{
    public string $tableName = 'encuesta-empresa-table-1ffata-table';

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
        return Encuesta360::query()
            ->join('empresas', 'empresas.id', '=', '360_encuestas.empresa_id')
            ->select('360_encuestas.*', 'empresas.nombre as empresa_nombre');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('indicaciones')
            ->add('empresa_nombre')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Id', 'id'),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),

            Column::make('Indicaciones', 'indicaciones')
                ->sortable()
                ->searchable(),

            Column::make('Empresa', 'empresa_nombre')
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

    public function actions(Encuesta360 $row): array
    {
        return [

            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarEncuestadevEmpresa', ['id' => Crypt::encrypt($row->id)]),



            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmarEliminarEncuestaEmpresa', ['id' => Crypt::encrypt($row->id)]),

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
