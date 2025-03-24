<?php

namespace App\Livewire\PortalCapacitacion\RelacionesExternas\AdminGeneral;

use App\Models\PortalCapacitacion\RelacionExterna;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

use Illuminate\Support\Facades\Crypt;

use PowerComponents\LivewirePowerGrid\Traits\WithExport; 
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class RelacionExternaTable extends PowerGridComponent
{
    use WithExport;

    public string $tableName = 'relacion-externa-table-dxolrh-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'relacionesExternas-export-file') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV), 
        ];
    }

    public function datasource(): Builder
    {
        return RelacionExterna::query()
        ->join('empresas', 'empresas.id', 'relaciones_externas.empresa_id')
        ->join('sucursales', 'sucursales.id', 'relaciones_externas.sucursal_id')
        ->select(
            'relaciones_externas.id', 
            'relaciones_externas.nombre',
            'relaciones_externas.razon_motivo', 
            'relaciones_externas.frecuencia',
            'empresas.nombre as empresa_nombre',
            'sucursales.nombre_sucursal as sucursal_nombre');
            
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('nombre')
            ->add('razon_motivo')
            ->add('frecuencia')
            ->add('empresa_nombre')
            ->add('sucursal_nombre');
    }

    public function columns(): array
    {
        return [

            Column::make('Nombre', 'nombre')
            ->sortable()
            ->searchable(),

            Column::make('Razon motivo', 'razon_motivo')
                ->sortable()
                ->searchable(),

            Column::make('Frecuencia', 'frecuencia')
                ->sortable()
                ->searchable(),

            Column::make('Empresa', 'empresa_nombre')
                ->sortable(),

            Column::make('Sucursal', 'sucursal_nombre')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
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

    public function actions(RelacionExterna $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarRelacionesExternas', ['id' => Crypt::encrypt($row->id)]),

            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('confirmDelete', ['id' => $row->id]),
        ];
    }
}
