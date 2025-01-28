<?php

namespace App\Livewire\Dx035\Encuestas;

use App\Models\Dx035\Encuesta;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EncuestaTable extends PowerGridComponent
{
    public string $tableName = 'encuesta-table';

    /**
     * Configuración general de la tabla
     */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput()
                ->includeViewOnTop('encuestas.header'), // Si tienes una vista personalizada para el header
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /**
     * Fuente de datos para la tabla
     */
    public function datasource(): Builder
    {
        return Encuesta::query();
    }

    /**
     * Campos adicionales (debe devolver un PowerGridFields)
     */
    public function fields(): PowerGridFields
    {
        return PowerGrid::fields([
            'Clave',
            'Empresa',
            'RutaLogo',
            'FechaInicio',
            'Caducidad',
            'Estado',
            'NumeroEncuestas',
            'Formato',
            'EncuestasContestadas',
            'Actividades',
            'Numero',
            'Dep',
            'Cerrable',
            'usuariosdx035_CorreoElectronico',
            'FechaFinal',
            'created_at',
            'updated_at',
        ]);
    }

    /**
     * Columnas visibles en la tabla
     */
    public function columns(): array
    {
        return [
            Column::make('Clave', 'Clave')
                ->searchable()
                ->sortable(),

            Column::make('Empresa', 'Empresa')
                ->searchable()
                ->sortable(),

            Column::make('Ruta Logo', 'RutaLogo')
                ->hidden(),

            Column::make('Fecha de Inicio', 'FechaInicio')
                ->sortable(),

            Column::make('Caducidad', 'Caducidad')
                ->sortable(),

            Column::make('Estado', 'Estado')
                ->sortable(),

            Column::make('Número de Encuestas', 'NumeroEncuestas')
                ->sortable(),

            Column::make('Formato', 'Formato'),

            Column::make('Encuestas Contestadas', 'EncuestasContestadas'),

            Column::make('Departamento', 'Dep')
                ->searchable(),

            Column::make('Cerrable', 'Cerrable'),

            Column::make('Correo Electrónico', 'usuariosdx035_CorreoElectronico')
                ->searchable(),

            Column::make('Fecha Final', 'FechaFinal'),

            Column::action('Acciones')
        ];
    }

    /**
     * Filtros de la tabla
     */
    public function filters(): array
    {
        return [
            Filter::inputText('Clave'), // Sin placeholder
            Filter::inputText('Empresa'), // Sin placeholder
            Filter::datepicker('FechaInicio'),
            Filter::datepicker('Caducidad'),
            Filter::select('Estado', 'Estado', [
                1 => 'Activo',
                0 => 'Inactivo',
            ]), // Sin placeholder
        ];
    }

    /**
     * Acciones por fila
     */
    public function actions(Encuesta $row): array
    {
        return [
            Button::add('edit')
                ->caption('Editar')
                ->class('btn btn-primary')
                ->route('encuestas.edit', ['Clave' => $row->Clave]),

            Button::add('delete')
                ->caption('Eliminar')
                ->class('btn btn-danger')
                ->route('encuestas.destroy', ['Clave' => $row->Clave])
                ->method('delete'),
        ];
    }
}
