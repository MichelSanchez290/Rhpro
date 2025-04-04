<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResultadosPorUsuarioExport implements FromArray, WithHeadings, WithStyles
{
    protected $promedioFinal;
    protected $resultadoFinal;
    protected $calificadorNombre;
    protected $calificadoNombre;
    protected $empresaNombre;
    protected $sucursalNombre;
    protected $departamentoNombre;
    protected $puestoNombre;
    protected $encuestaNombre; // Nueva propiedad
    protected $realizada;
    protected $datosTabla;

    public function __construct($data)
    {
        $this->promedioFinal = $data['promedioFinal'];
        $this->resultadoFinal = $data['resultadoFinal'];
        $this->calificadorNombre = $data['calificadorNombre'];
        $this->calificadoNombre = $data['calificadoNombre'];
        $this->empresaNombre = $data['empresaNombre'];
        $this->sucursalNombre = $data['sucursalNombre'];
        $this->departamentoNombre = $data['departamentoNombre'];
        $this->puestoNombre = $data['puestoNombre'];
        $this->encuestaNombre = $data['encuestaNombre'];
        $this->realizada = $data['realizada'];
        $this->datosTabla = $data['datosTabla'];
    }

    public function headings(): array
    {
        return [
            'Competencias Evaluadas',
            'Autoevaluación',
            'Promedio',
            'Diferencia',
        ];
    }

    public function array(): array
    {
        $data = [];

        // Encabezado
        $data[] = ['RESULTADOS EVALUACIÓN 360 - ADMINISTRADOR', '', '', ''];
        $data[] = ["Envaluación: {$this->encuestaNombre}", '', '', '']; // Nombre de la encuesta
        $data[] = [$this->calificadoNombre, '', '', ''];
        $data[] = ["Evaluado por: {$this->calificadorNombre}", '', '', ''];
        $data[] = ["{$this->empresaNombre} - {$this->sucursalNombre}", '', '', ''];
        $data[] = ["{$this->departamentoNombre} - {$this->puestoNombre}", '', '', ''];
        $data[] = ['', '', '', ''];

        // Estado
        $data[] = ['Estado de la Evaluación', $this->realizada ? 'Completada' : 'Pendiente', '', ''];
        $data[] = ['', '', '', ''];

        if ($this->realizada) {
            // Clasificación
            $data[] = ['Clasificación de Evaluaciones 360° por Niveles', '', '', ''];
            $data[] = ['Rango', 'Resultado', 'Color', ''];
            $data[] = ['0-1', 'Bajo', 'Rojo', ''];
            $data[] = ['1-2', 'Regular', 'Anaranjado', ''];
            $data[] = ['2-3', 'Bueno', 'Amarillo', ''];
            $data[] = ['3-4', 'Sobresaliente', 'Verde', ''];
            $data[] = ['', '', '', ''];

            // Resultados por Competencia
            $data[] = ['Resultados por Competencia', '', '', ''];
            foreach ($this->datosTabla['items'] as $item) {
                $data[] = [
                    $item['competencia'],
                    $item['autoevaluacion'],
                    $item['promedio'],
                    $item['diferencia'],
                ];
            }
            $data[] = [
                'Promedio',
                $this->datosTabla['promedioAutoevaluacion'],
                $this->datosTabla['promedioOtros'],
                $this->datosTabla['promedioDiferencia'],
            ];
            $data[] = ['', '', '', ''];

            // Promedio Final
            $data[] = ['Promedio Final', number_format($this->promedioFinal, 2), $this->resultadoFinal, ''];
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
            5 => ['font' => ['bold' => true]],
            7 => ['font' => ['bold' => true]],
            9 => ['font' => ['bold' => true]],
            10 => ['font' => ['bold' => true]],
            'A' => ['font' => ['bold' => true]],
        ];
    }
}
