<?php

namespace App\Livewire\Portal360\Empresa\EmpresaAdministrador;

use App\Models\PortalRH\EmpresaSucursal;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class MostrarEmpresaAdministradorTable extends PowerGridComponent
{

    use WithExport;

    public string $tableName = 'mostrar-empresa-administrador-table-nakte4-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable('empresas_sucursales') // Nombre del archivo como primer parámetro
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV) // Tipos de ex
        ];
    }

    public function datasource(): Builder
    {
        return EmpresaSucursal::query()
            ->join('empresas', 'empresa_sucursal.empresa_id', '=', 'empresas.id')
            ->join('sucursales', 'empresa_sucursal.sucursal_id', '=', 'sucursales.id')
            ->select('empresa_sucursal.*', 'empresas.nombre as empresa_nombre', 'sucursales.nombre_sucursal');
    }

    public function relationSearch(): array
    {
        return [
            'empresa' => [
                'nombre',
            ],
            'sucursal' => [
                'nombre_sucursal', // Cambiado de 'clave_sucursal' a 'nombre_sucursal'
            ],
        ];
    }


    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('empresa_nombre', fn(EmpresaSucursal $model) => $model->empresa->nombre)
            ->add('sucursal_nombre', fn(EmpresaSucursal $model) => $model->sucursal->nombre_sucursal);
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Nombre Empresa', 'empresa_nombre')
                ->sortable(),

            Column::make('Nombre Sucursal', 'sucursal_nombre')
                ->sortable(),
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
}
