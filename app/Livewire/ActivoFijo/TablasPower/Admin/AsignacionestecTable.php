<?php

namespace App\Livewire\ActivoFijo\TablasPower\Admin;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsignacionesTecExport;

final class AsignacionestecTable extends PowerGridComponent
{
    use WithExport;

    public string $tableName = 'asignacionestec-table-43hdtt-table';
    protected $listeners = ['refreshPowerGrid' => '$refresh'];

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
        return DB::table('activos_tecnologia_user')
            ->join('users', 'activos_tecnologia_user.user_id', '=', 'users.id')
            ->join('activos_tecnologias', 'activos_tecnologia_user.activos_tecnologias_id', '=', 'activos_tecnologias.id')
            ->join('sucursales', 'activos_tecnologias.sucursal_id', '=', 'sucursales.id')
            ->join('empresa_sucursal', 'sucursales.id', '=', 'empresa_sucursal.sucursal_id')
            ->join('empresas', 'empresa_sucursal.empresa_id', '=', 'empresas.id')
            ->join('aniosestimados', 'activos_tecnologias.aniosestimado_id', '=', 'aniosestimados.id')
            ->select([
                'activos_tecnologia_user.id',
                'users.name as usuario',
                'activos_tecnologias.nombre as activo',
                'activos_tecnologias.descripcion as descripcion',
                'activos_tecnologias.num_serie',
                'activos_tecnologias.num_activo',
                'activos_tecnologias.ubicacion_fisica',
                'activos_tecnologias.fecha_adquisicion',
                'activos_tecnologias.precio_adquisicion',
                'aniosestimados.vida_util_año as vida_util', // Corregido: aniosestimados.vida_util -> aniosestimados.vida_util_año
                'sucursales.nombre_sucursal as sucursal',
                'empresas.nombre as empresa',
                'activos_tecnologia_user.fecha_asignacion',
                'activos_tecnologia_user.fecha_devolucion',
                'activos_tecnologia_user.observaciones',
                'activos_tecnologia_user.status',
                'activos_tecnologia_user.foto1',
                'activos_tecnologia_user.foto2',
                'activos_tecnologia_user.foto3',
                'activos_tecnologia_user.created_at',
                'activos_tecnologia_user.updated_at',
            ]);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('usuario')
            ->add('activo')
            ->add('sucursal')
            ->add('empresa')
            ->add('fecha_asignacion')
            ->add('fecha_asignacion_formatted', fn($model) => Carbon::parse($model->fecha_asignacion)->format('d/m/Y'))
            ->add('fecha_devolucion')
            ->add('fecha_devolucion_formatted', fn($model) => $model->fecha_devolucion ? Carbon::parse($model->fecha_devolucion)->format('d/m/Y') : 'No definida')
            ->add('observaciones')
            ->add('status_formatted', fn($model) => $model->status == 1
                ? '<span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"><span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>Asignado</span>'
                : '<span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"><span class="h-1.5 w-1.5 rounded-full text-blue-600"></span>Devuelto</span>')
            ->add('created_at_formatted', fn($model) => Carbon::parse($model->created_at)->format('d/m/Y H:i'))
            ->add('updated_at')
            ->add('updated_at_formatted', fn($model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Usuario', 'usuario')
                ->sortable()
                ->searchable(),

            Column::make('Activo', 'activo')
                ->sortable()
                ->searchable(),

            Column::make('Sucursal', 'sucursal')
                ->sortable()
                ->searchable(),

            Column::make('Empresa', 'empresa')
                ->sortable()
                ->searchable(),

            Column::make('Fecha Asignación', 'fecha_asignacion_formatted', 'fecha_asignacion')
                ->sortable(),

            Column::make('Fecha Devolución', 'fecha_devolucion_formatted', 'fecha_devolucion')
                ->sortable(),

            Column::make('Observaciones', 'observaciones')
                ->sortable()
                ->searchable(),

            Column::make('Estado', 'status_formatted')
                ->sortable()
                ->searchable(),

            Column::make('Creado', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Actualizado', 'updated_at_formatted', 'updated_at')
                ->sortable(),

            Column::action('Acciones')
        ];
    }

    public function exportCustom()
    {
        try {
            $data = $this->datasource()->get();
            return Excel::download(new AsignacionesTecExport($data), 'asignaciones-tec-' . now()->format('Y-m-d-H-i-s') . '.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al generar el archivo: ' . $e->getMessage());
        }
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('fecha_asignacion'),
            Filter::datepicker('fecha_devolucion'),
        ];
    }

    #[\Livewire\Attributes\On('devolver')]
    public function devolver($rowId): void
    {
        $registro = DB::table('activos_tecnologia_user')->where('id', $rowId)->first();
        if ($registro->status == 0) {
            return;
        }

        DB::transaction(function () use ($rowId, $registro) {
            DB::table('activos_tecnologia_user')
                ->where('id', $rowId)
                ->update([
                    'status' => 0,
                    'fecha_devolucion' => now(),
                    'updated_at' => now(),
                ]);

            DB::table('activos_tecnologias')
                ->where('id', $registro->activos_tecnologias_id)
                ->update([
                    'status' => 'Activo',
                    'updated_at' => now(),
                ]);
        });

        session()->flash('message', 'Activo marcado como devuelto correctamente.');
        $this->refresh();
    }

    #[\Livewire\Attributes\On('deleteAsignacion')]
    public function deleteAsignacion($rowId): void
    {
        DB::table('activos_tecnologia_user')
            ->where('id', $rowId)
            ->delete();

        session()->flash('message', 'Asignación eliminada correctamente.');
        $this->refresh();
    }

    public function actions($row): array
    {
        return [
            Button::add('devolver')
                ->icon('default-asign')
                ->id()
                ->class('btn btn-primary' . ($row->status == 0 ? ' disabled' : ''))
                ->dispatch('devolver', ['rowId' => $row->id]),

            Button::add('delete')
                ->icon('default-trash')
                ->class('btn btn-danger')
                ->dispatch('openModal', [
                    'component' => 'borrar-activo',
                    'arguments' => [
                        'vista' => 'asignaciones-tec',
                        'activo_id' => $row->id
                    ]
                ]),

            Button::add('export-pdf')
                ->icon('default-download')
                ->class('btn btn-success')
                ->route('export.asignacion.pdf', ['asignacionId' => $row->id]),

            // Button::add('export-custom')
            //     ->icon('default-download')
            //     ->class('btn btn-info')
            //     ->route('export.asignaciones-tec', []),
        ];
    }
}
