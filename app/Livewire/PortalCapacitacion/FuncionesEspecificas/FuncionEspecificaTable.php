<?php

namespace App\Livewire\PortalCapacitacion\FuncionesEspecificas;

use App\Models\PortalCapacitacion\FuncionEspecifica;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use Illuminate\Support\Facades\Crypt;

final class FuncionEspecificaTable extends PowerGridComponent
{
    public string $tableName = 'funcion-especifica-table';

    /**
     * Configuración inicial de la tabla
     */
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

    /**
     * Origen de datos de la tabla
     */
    public function datasource(): Builder
    {
        return FuncionEspecifica::query();
    }

    /**
     * Relación de búsqueda para las columnas (si aplica)
     */
    public function relationSearch(): array
    {
        return [];
    }

    /**
     * Definición de las columnas de datos
     */
    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('nombre');
    }

    /**
     * Definición de columnas y sus estilos
     */
    public function columns(): array
    {
        return [
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    /**
     * Configuración de botones de acción (Editar y Eliminar)
     */
    public function actions(FuncionEspecifica $row): array
    {
        return [
            Button::add('edit')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'),
                
            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmDelete', ['id' => $row->id]),
        ];
    }
}
