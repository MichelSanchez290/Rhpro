<?php

namespace App\Livewire\PortalRh\Incidencias;

use App\Models\PortalRh\Incidencia;
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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

final class IncidenciaTable extends PowerGridComponent
{
    public string $tableName = 'incidencia-table-truwzm-table';
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'Incidencias') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        return Incidencia::query()
            ->join('user_incidencia', 'incidencias.id', '=', 'user_incidencia.incidencia_id')
            ->join('users', 'user_incidencia.user_id', '=', 'users.id')
            ->select([
                'incidencias.*',
                'users.name as nombre_usuario'
            ])
            ->where('users.id', $user->id);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('tipo_incidencia')
            ->add('fecha_inicio_formatted', fn (Incidencia $model) => Carbon::parse($model->fecha_inicio)->format('d/m/Y'))
            ->add('fecha_final_formatted', fn (Incidencia $model) => Carbon::parse($model->fecha_final)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            
            Column::make('Incidencia', 'tipo_incidencia')
                ->sortable()
                ->searchable(),

            Column::make('Fecha inicio', 'fecha_inicio_formatted', 'fecha_inicio')
                ->sortable(),

            Column::make('Fecha final', 'fecha_final_formatted', 'fecha_final')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_inicio'),
            Filter::datepicker('fecha_final'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Incidencia $row): array
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
