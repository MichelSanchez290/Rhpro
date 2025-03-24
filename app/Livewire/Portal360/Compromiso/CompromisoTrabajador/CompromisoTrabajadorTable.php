<?php

namespace App\Livewire\Portal360\Compromiso\CompromisoTrabajador;

use App\Models\Encuestas360\Compromiso;
use App\Models\Encuestas360\RespuestaUsuario;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class CompromisoTrabajadorTable extends PowerGridComponent
{
    public string $tableName = 'compromiso-trabajador-table-atox1b-table';
    use WithExport; // Agregamos el trait para exportación

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::exportable('Compromisos_Trabajador_' . now()->format('Ymd_His')) 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV), // Formatos XLS y CSV
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        // Filter commitments for the current authenticated worker
        return Compromiso::query()
            ->where('users_id', Auth::id())
            ->with(['pregunta']);
    }

    public function relationSearch(): array
    {
        return [
            'pregunta' => ['texto'], // Habilitamos búsqueda en la relación pregunta
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('alta_formatted', fn (Compromiso $model) => Carbon::parse($model->alta)->format('d/m/Y'))
            ->add('vencimiento_formatted', fn (Compromiso $model) => Carbon::parse($model->vencimiento)->format('d/m/Y'))
            ->add('compromiso')
            ->add('verificado', fn (Compromiso $model) => $model->verificado ? 'Sí' : 'No')
            ->add('pregunta_texto', fn (Compromiso $model) => $model->pregunta ? $model->pregunta->texto : 'Sin pregunta')
            ->add('promedio_final', function (Compromiso $model) {
                if ($model->preguntas_id) {
                    $average = RespuestaUsuario::whereHas('respuesta360', function ($query) use ($model) {
                        $query->where('preguntas_id', $model->preguntas_id); // Changed from pregunta_id to preguntas_id
                    })
                    ->with('respuesta360')
                    ->get()
                    ->avg(function ($respuestaUsuario) {
                        return $respuestaUsuario->respuesta360->puntuacion;
                    });
                    return number_format($average, 2) ?? 'N/A';
                }
                return 'N/A';
            })
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Pregunta', 'pregunta_texto')
                ->sortable()
                ->searchable(),

            Column::make('Promedio Final', 'promedio_final')
                ->sortable(),

            Column::make('Fecha Inicio', 'alta_formatted', 'alta')
                ->sortable(),

            Column::make('Fecha Término', 'vencimiento_formatted', 'vencimiento')
                ->sortable(),

            Column::make('Compromiso', 'compromiso')
                ->sortable()
                ->searchable(),

            Column::make('Cumplido', 'verificado')
                ->sortable()
                ->searchable(),

            // Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            // Filter::datepicker('alta'),
            // Filter::datepicker('vencimiento'),
        ];
    }
    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    // public function actions(Compromiso $row): array
    // {
    //     return [
    //         // Button::add('edit')
    //         //     ->slot('Edit: '.$row->id)
    //         //     ->id()
    //         //     ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //         //     ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

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
