<?php

namespace App\Livewire\PortalRh\InfonavitCreditos;

use App\Models\PortalRh\InfonavitCredito;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class InfonavitCreditoTable extends PowerGridComponent
{
    public string $tableName = 'infonavit-credito-table-cgaugf-table';

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
        return InfonavitCredito::query();
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
            ->add('tipo_movimiento')
            ->add('numero_credito')
            ->add('fecha_movimiento_formatted', fn (InfonavitCredito $model) => Carbon::parse($model->fecha_movimiento)->format('d/m/Y'))
            ->add('tipo_descuento')
            ->add('valor_descuento')
            ->add('user_id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Id', 'id'),
            Column::make('Tipo movimiento', 'tipo_movimiento')
                ->sortable()
                ->searchable(),

            Column::make('Numero credito', 'numero_credito')
                ->sortable()
                ->searchable(),

            Column::make('Fecha movimiento', 'fecha_movimiento_formatted', 'fecha_movimiento')
                ->sortable(),

            Column::make('Tipo descuento', 'tipo_descuento')
                ->sortable()
                ->searchable(),

            Column::make('Valor descuento', 'valor_descuento')
                ->sortable()
                ->searchable(),

            Column::make('User id', 'user_id'),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_movimiento'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(InfonavitCredito $row): array
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
