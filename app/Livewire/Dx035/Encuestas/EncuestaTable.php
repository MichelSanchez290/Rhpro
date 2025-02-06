<?php

namespace App\Livewire\Dx035\Encuestas;

use App\Models\Dx035\EncuestaCuestionario;
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
        return EncuestaCuestionario::query()
            ->with(['encuesta', 'cuestionario']);
    }

    /**
     * Campos adicionales (debe devolver un PowerGridFields)
     */
    public function fields(): PowerGridFields
    {
        return PowerGrid::fields([
            'encuesta.Clave' => 'Clave',
            'encuesta.Empresa' => 'Empresa',
            'encuesta.RutaLogo' => 'RutaLogo',
            'encuesta.FechaInicio' => 'FechaInicio',
            'encuesta.Caducidad' => 'Caducidad',
            'encuesta.Estado' => 'Estado',
            'encuesta.NumeroEncuestas' => 'NumeroEncuestas',
            'encuesta.Formato' => 'Formato',
            'encuesta.EncuestasContestadas' => 'EncuestasContestadas',
            'encuesta.Actividades' => 'Actividades',
            'encuesta.Numero' => 'Numero',
            'encuesta.Dep' => 'Dep',
            'encuesta.Cerrable' => 'Cerrable',
            'encuesta.usuariosdx035_CorreoElectronico' => 'usuariosdx035_CorreoElectronico',
            'encuesta.FechaFinal' => 'FechaFinal',
            'cuestionario.Nombre' => 'Cuestionario',
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
            Column::make('Clave', 'encuesta.Clave')
                ->searchable()
                ->sortable(),

            Column::make('Empresa', 'encuesta.Empresa')
                ->searchable()
                ->sortable(),

            Column::make('Ruta Logo', 'encuesta.RutaLogo')
                ->hidden(),

            Column::make('Fecha de Inicio', 'encuesta.FechaInicio')
                ->sortable(),

            Column::make('Caducidad', 'encuesta.Caducidad')
                ->sortable(),

            Column::make('Estado', 'encuesta.Estado')
                ->sortable(),

            Column::make('Número de Encuestas', 'encuesta.NumeroEncuestas')
                ->sortable(),

            Column::make('Formato', 'encuesta.Formato'),

            Column::make('Encuestas Contestadas', 'encuesta.EncuestasContestadas'),

            Column::make('Departamento', 'encuesta.Dep')
                ->searchable(),

            Column::make('Cerrable', 'encuesta.Cerrable'),

            Column::make('Correo Electrónico', 'encuesta.usuariosdx035_CorreoElectronico')
                ->searchable(),

            Column::make('Fecha Final', 'encuesta.FechaFinal'),

            Column::make('Cuestionario', 'cuestionario.Nombre')
                ->searchable(),

            Column::action('Acciones')
        ];
    }

    /**
     * Filtros de la tabla
     */
    public function filters(): array
    {
        return [
            Filter::inputText('encuesta.Clave'), // Sin placeholder
            Filter::inputText('encuesta.Empresa'), // Sin placeholder
            Filter::datepicker('encuesta.FechaInicio'),
            Filter::datepicker('encuesta.Caducidad'),
            Filter::select('encuesta.Estado', 'Estado', [
                1 => 'Activo',
                0 => 'Inactivo',
            ]), // Sin placeholder
        ];
    }

    /**
     * Acciones por fila
     */
    public function actions(EncuestaCuestionario $row): array
    {
        return [
            Button::add('edit')
                ->caption('Editar')
                ->class('btn btn-primary')
                ->route('encuestas.edit', ['Clave' => $row->encuesta->Clave]),

            Button::add('delete')
                ->caption('Eliminar')
                ->class('btn btn-danger')
                ->route('encuestas.destroy', ['Clave' => $row->encuesta->Clave])
                ->method('delete'),
        ];
    }
}
