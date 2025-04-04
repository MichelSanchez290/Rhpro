<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResultadosGeneralesExport implements FromArray, WithHeadings, WithStyles
{
    protected $resultados;
    protected $calificadoNombre;
    protected $empresaNombre;
    protected $sucursalNombre;
    protected $encuestaNombre; // Nueva propiedad

    public function __construct($resultados, $calificadoNombre, $empresaNombre, $sucursalNombre, $encuestaNombre)
    {
        $this->resultados = $resultados;
        $this->calificadoNombre = $calificadoNombre;
        $this->empresaNombre = $empresaNombre;
        $this->sucursalNombre = $sucursalNombre;
        $this->encuestaNombre = $encuestaNombre;
    }

    public function headings(): array
    {
        return [
            'Nombre del colaborador',
            'Departamento',
            'Pregunta',
            'Resultado',
        ];
    }

    public function array(): array
    {
        $data = [];

        $data[] = ['REPORTE GENERAL DE RESULTADOS EVALUACIÓN 360 GRADOS', '', '', ''];
        $data[] = [$this->encuestaNombre, '', '', '']; 
        $data[] = [$this->calificadoNombre, '', '', ''];
        $data[] = [$this->empresaNombre, '', '', ''];
        $data[] = [$this->sucursalNombre, '', '', ''];
        $data[] = ['', '', '', ''];

        $data[] = ['Clasificación de Evaluaciones 360° por Niveles', '', '', ''];
        $data[] = ['Rango', 'Resultado', 'Color', ''];
        $data[] = ['0-1', 'Bajo', 'Rojo', ''];
        $data[] = ['1-2', 'Regular', 'Anaranjado', ''];
        $data[] = ['2-3', 'Bueno', 'Amarillo', ''];
        $data[] = ['3-4', 'Sobresaliente', 'Verde', ''];
        $data[] = ['', '', '', ''];

        foreach ($this->resultados as $pregunta => $resultadosPregunta) {
            $data[] = [$pregunta, '', '', ''];
            foreach ($resultadosPregunta as $resultado) {
                $data[] = [
                    $resultado['nombre'],
                    $resultado['departamento'],
                    $pregunta,
                    $resultado['resultado'],
                ];
            }
            $data[] = ['', '', '', ''];
        }

        return $data;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16]],
            2 => ['font' => ['bold' => true]],
            3 => ['font' => ['bold' => true]],
            4 => ['font' => ['bold' => true]],
            6 => ['font' => ['bold' => true]],
            7 => ['font' => ['bold' => true]],
            'A' => ['font' => ['bold' => true]],
        ];
    }
}