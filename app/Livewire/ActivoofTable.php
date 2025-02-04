<?php

namespace App\Livewire;

use App\Models\ActivoFijo\Activos\ActivoOficina;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ActivoofTable extends PowerGridComponent
{
    public string $tableName = 'activoof-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()->showSearchInput(),
            PowerGrid::footer()->showPerPage()->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return ActivoOficina::query()
            ->with(['tipoActivo', 'anioEstimado']);
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
            ->add('numero_activo')
            ->add('ubicacion_fisica')
            ->add('tipo_activo_nombre', fn (ActivoOficina $model) => $model->tipoActivo->nombre_activo ?? 'N/A')
            ->add('fecha_adquisicion_formatted', fn (ActivoOficina $model) => $model->fecha_adquisicion ? Carbon::parse($model->fecha_adquisicion)->format('d/m/Y') : null)
            ->add('fecha_baja', fn (ActivoOficina $model) => $model->fecha_baja ? Carbon::parse($model->fecha_baja)->format('d/m/Y') : 'No disponible')
            ->add('precio_adquisicion')
            ->add('anioEstimado', fn (ActivoOficina $model) => $model->anioEstimado->vida_util_año ?? 'No asignado')
            ->add('created_at_formatted', fn (ActivoOficina $model) => $model->created_at->format('d/m/Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Nombre', 'nombre')->sortable()->searchable(),
            Column::make('Descripción', 'descripcion')->sortable()->searchable(),
            Column::make('Número Activo', 'numero_activo')->sortable()->searchable(),
            Column::make('Ubicación Física', 'ubicacion_fisica')->sortable()->searchable(),
            Column::make('Tipo Activo', 'tipo_activo_nombre')
            ->sortable()
            ->searchable(),
            Column::make('Fecha Adquisición', 'fecha_adquisicion_formatted', 'fecha_adquisicion')->sortable(),
            Column::make('Fecha Baja', 'fecha_baja')->sortable(),
            Column::make('Precio Adquisición', 'precio_adquisicion')->sortable()->searchable(),
            Column::make('Año Estimado', 'anioEstimado')->sortable()->searchable(),
            Column::make('Creado el', 'created_at_formatted', 'created_at')->sortable(),
            Column::action('Acciones'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_adquisicion'),
            Filter::datepicker('fecha_baja'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert("Editando ID: '.$rowId.'")');
    }

    public function actions(ActivoOficina $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('btn btn-primary')
                ->route('editaractof', ['id' => $row->id]),
            Button::add('delete')
                ->slot('Eliminar')
                ->class('btn btn-primary')
                ->dispatch('confirmDelete', ['id' => $row->id]),
        ];
    }
}
