<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Cursos\AdminGeneral;

use App\Models\PortalCapacitacion\Curso;
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

final class CursoTable extends PowerGridComponent
{
    public string $tableName = 'curso-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'tematicas-export-file') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV), 
        ];
    }

    public function datasource(): Builder
    {
        return Curso::query()
            ->join('empresas', 'empresas.id', 'cursos.empresa_id')
            ->join('sucursales', 'sucursales.id', 'cursos.sucursal_id')
            ->select([
                'cursos.id',
                'cursos.nombre',
                'cursos.horas',
                'cursos.precio',
                'cursos.tipoestatus',
                'cursos.tematicas_id',
                'cursos.modalidad',
                'empresas.nombre as empresa_nombre',
                'sucursales.nombre_sucursal as sucursal_nombre']);
            
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('empresa_nombre')
            ->add('sucursal_nombre')
            ->add('nombre')
            ->add('horas')
            ->add('precio')
            ->add('tipoestatus')
            ->add('tematicas_id')
            ->add('modalidad');
    }

    public function columns(): array
    {
        return [
            Column::make('Empresa id', 'empresa_nombre'),
            Column::make('Sucursal id', 'sucursal_nombre'),
            Column::make('Modalidad', 'modalidad')
                ->sortable()
                ->searchable(),
            Column::make('Nombre', 'nombre')
            ->sortable()
            ->searchable(),
            Column::make('Horas', 'horas')
            ->sortable()
            ->searchable(),
            Column::make('Precio', 'precio')
            ->sortable()
            ->searchable(),
            Column::make('Tipo Estatus', 'tipoestatus')
            ->sortable()
            ->searchable(),
            Column::make('Temáticas id', 'tematicas_id')
            ->sortable()
            ->searchable(),
            Column::make('Modalidad', 'modalidad')
            ->sortable(),
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

    public function actions(Curso $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
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
