<?php

namespace App\Livewire\PortalRh\Empres;

use App\Models\PortalRh\Empres;
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

final class EmpresTable extends PowerGridComponent
{
    use WithExport;

    public string $tableName = 'empres-table-u4eqeo-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'empresas-export-file')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        return Empres::query();
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
            ->add('nombre')
            ->add('razon_social')
            ->add('rfc')
            ->add('nombre_comercial')
            ->add('pais_origen')
            ->add('representante_legal')
            ->add('url_constancia_situacion_fiscal')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Razon social', 'razon_social')
                ->sortable()
                ->searchable(),

            Column::make('Rfc', 'rfc')
                ->sortable()
                ->searchable(),

            Column::make('Nombre comercial', 'nombre_comercial')
                ->sortable()
                ->searchable(),

            Column::make('Pais origen', 'pais_origen')
                ->sortable()
                ->searchable(),

            Column::make('Representante legal', 'representante_legal')
                ->sortable()
                ->searchable(),

            Column::make('Url constancia situacion fiscal', 'url_constancia_situacion_fiscal')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at')
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

    public function actions(Empres $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded')
                ->route('editarempresa', ['id' => Crypt::encrypt($row->id)]),


            Button::add('delete')
                ->slot('Eliminar')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
                // ->confirm('Are you sure you want to edit?'),
                ->dispatch('confirmDelete', ['id' => $row->id]), // Emitir evento Livewire
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