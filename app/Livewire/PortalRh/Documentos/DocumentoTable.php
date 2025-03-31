<?php

namespace App\Livewire\PortalRh\Documentos;

use App\Models\PortalRh\Documento;
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

final class DocumentoTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'documento-table-kqlcbq-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::exportable(fileName: 'Documentos')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function datasource(): Builder
    {
        $user = Auth::user();

        $query = Documento::query()
        ->with(['users.documentos'])
            ->select('documentos.*')
            ->join('user_documento', 'documentos.id', '=', 'user_documento.documento_id')
            ->join('users', 'user_documento.user_id', '=', 'users.id')
            ->addSelect('users.name as user_name')
            ->addSelect('users.tipo_user as tipo'); // Traer el nombre del usuario relacionado

        if ($user->hasRole('GoldenAdmin')) {
            // GoldenAdmin ve todos los registros (no hay filtro adicional)
            return $query;
        } elseif ($user->hasRole('EmpresaAdmin')) {
            // EmpresaAdmin ve solo los documentos de su empresa
            return $query->where('users.empresa_id', $user->empresa_id);
        } elseif ($user->hasRole('SucursalAdmin')) {
            // SucursalAdmin ve solo los documentos de su sucursal
            return $query->where('users.sucursal_id', $user->sucursal_id);
        } elseif ($user->hasRole('Trabajador PORTAL RH')) {
            // Trabajador solo ve sus propios documentos
            return $query->where('users.id', $user->id);
        }

        // En caso de que el usuario no tenga ningún rol válido
        return $query->whereNull('documentos.id');
    }

    public function relationSearch(): array
    {
        return [
            'users.documentos' => ['name'],
            'users.documentos' => ['tipo_user'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_name')
            ->add('tipo')
            ->add('archivo', function (Documento $model) {
                return '<a href="' . asset('PortalRH/Documentos/' . basename($model->archivo)) . '" target="_blank" class="text-blue-600 hover:underline">Ver Archivo</a>';
            })
            ->add('fecha_subida_formatted', fn (Documento $model) => Carbon::parse($model->fecha_subida)->format('d/m/Y'))
            ->add('status')
            ->add('numero')
            ->add('original')
            ->add('comentarios')
            ->add('tipo_documento')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make('Usuario', 'user_name')
                ->sortable()
                ->searchable(),

            Column::make('Tipo Usuario', 'tipo')
                ->sortable()
                ->searchable(),

            Column::make('Tipo de documento', 'tipo_documento')
                ->sortable()
                ->searchable(),
            
            Column::make('Archivo', 'archivo')
                ->visibleInExport(false)
                ->sortable(),

            Column::make('Fecha subida', 'fecha_subida_formatted', 'fecha_subida')
                ->sortable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Numero', 'numero')
                ->sortable()
                ->searchable(),

            Column::make('Original', 'original')
                ->sortable()
                ->searchable(),

            Column::make('Comentarios', 'comentarios')
                ->sortable()
                ->searchable(),

            Column::make('Tipo de documento', 'tipo_documento')
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
            Filter::datepicker('fecha_subida'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Documento $row): array
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
