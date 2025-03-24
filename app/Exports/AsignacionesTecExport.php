<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsignacionesTecExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data)->map(function ($model) {
            // Obtener los valores de la base de datos
            $precioAdquisicion = $model->precio_adquisicion;
            $valorResidualEstimado = $precioAdquisicion * 0.77; // Asumiendo un 77% del precio de adquisición

            // Calcular Año de depreciación usando fecha_adquisicion
            $anioDepreciacion = 0;
            if ($model->fecha_adquisicion) {
                $fechaAdquisicion = Carbon::parse($model->fecha_adquisicion);
                $fechaActual = Carbon::now();
                $diferenciaAnios = $fechaActual->year - $fechaAdquisicion->year;
                $diasTranscurridos = $fechaActual->diffInDays($fechaAdquisicion->copy()->startOfYear());
                if ($fechaActual->year > $fechaAdquisicion->year) {
                    $diasTranscurridos = $fechaActual->diffInDays($fechaAdquisicion->copy()->startOfYear()->addYears($diferenciaAnios));
                }
                $fraccionAnio = $diasTranscurridos / 365;
                $anioDepreciacion = round($diferenciaAnios + $fraccionAnio, 2); // Redondear a 2 decimales
            }

            // Calcular Valor de depreciación descendiente fija estimado
            $valorDepreciacion = -($precioAdquisicion - $valorResidualEstimado);

            // Calcular Porcentaje
            $porcentaje = $precioAdquisicion != 0 ? $valorResidualEstimado / $precioAdquisicion : 0;

            // Retornar las columnas en el orden especificado
            return [
                'nombre_de_activo' => $model->activo,
                'descripcion' => $model->descripcion,
                'numero_serie' => $model->num_serie,
                'numero_activo_fijo' => $model->num_activo,
                'ubicacion_fisica' => $model->ubicacion_fisica,
                'fecha_adquisicion' => $model->fecha_adquisicion ? Carbon::parse($model->fecha_adquisicion)->format('d/m/Y') : '',
                'precio_adquisicion' => $precioAdquisicion,
                'vida_util' => $model->vida_util,
                'valor_residual_estimado' => $valorResidualEstimado,
                'anio_depreciacion' => $anioDepreciacion,
                'valor_depreciacion_descendente_fija_estimado' => $valorDepreciacion,
                'columna1' => $valorDepreciacion,
                'porcentaje' => $porcentaje,
                'valor_recuperacion' => $valorResidualEstimado,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nombre de activo',
            'Descripción',
            'N. de serie',
            'N. de activo fijo',
            'Ubicación física',
            'Fecha de adquisición',
            'Precio de la adquisición',
            'Vida útil (años)',
            'Valor residual estimado',
            'Año de depreciación',
            'Valor de depreciación descendiente fija estimado',
            'Columna1',
            '%',
            'Valor de recuperación',
        ];
    }
}