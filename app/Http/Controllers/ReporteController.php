<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dx035\Encuesta;
use App\Models\Dx035\Respuesta;
use App\Models\Dx035\TrabajadorEncuesta;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function generarReporte($encuestaId)
    {
        // Obtener la encuesta
        $encuesta = Encuesta::findOrFail($encuestaId);

        // Obtener las respuestas de la encuesta
        $respuestas = Respuesta::whereHas('trabajadorEncuesta', function ($query) use ($encuestaId) {
            $query->where('encuesta_id', $encuestaId);
        })->get();

        // Obtener el perfil de los participantes (ejemplo)
        $perfilParticipantes = [
            'genero' => [
                'Hombre' => 60,
                'Mujer' => 40,
            ],
            'edad' => [
                '18-25' => 20,
                '26-35' => 30,
                '36-45' => 25,
                '46+' => 25,
            ],
            'estadoCivil' => [
                'Soltero' => 50,
                'Casado' => 40,
                'Divorciado' => 10,
            ],
            'estudios' => [
                'Primaria' => 10,
                'Secundaria' => 30,
                'Preparatoria' => 40,
                'Universidad' => 20,
            ],
        ];

        // Obtener el índice de participación
        $indiceParticipacion = [
            'contestadas' => $encuesta->EncuestasContestadas,
            'sin_contestar' => $encuesta->NumeroEncuestas - $encuesta->EncuestasContestadas,
        ];

        // Obtener las categorías y dominios (ejemplo)
        $categorias = [
            'Ambiente de trabajo' => [
                'dominios' => ['Condiciones en el ambiente de trabajo'],
                'dimensiones' => 3,
                'preguntas' => 5,
            ],
            'Organización del tiempo de trabajo' => [
                'dominios' => ['Jornada de trabajo'],
                'dimensiones' => 2,
                'preguntas' => 4,
            ],
            // Agrega más categorías según sea necesario
        ];

        // Cargar la vista del reporte
        $pdf = Pdf::loadView('reporte.encuesta', [
            'encuesta' => $encuesta,
            'respuestas' => $respuestas,
            'perfilParticipantes' => $perfilParticipantes,
            'indiceParticipacion' => $indiceParticipacion,
            'categorias' => $categorias,
        ]);

        // Descargar el PDF
        return $pdf->download('reporte_encuesta.pdf');
    }
}