<?php

namespace App\Livewire\Dx035\CuestionarioParaResponder;

use Livewire\Component;
use App\Models\Dx035\Encuesta;
use App\Models\Dx035\PreguntaBase;
use App\Models\Dx035\TrabajadorEncuesta;
use App\Models\Dx035\Respuesta;

class ResponderCuestionarioUno extends Component
{
    public $encuesta;
    public $preguntas;
    public $respuestas = [];
    public $mostrarSeccionesAdicionales = false;

    public function mount($key)
    {
        // Cargar la encuesta y las preguntas del cuestionario 1
        $this->encuesta = Encuesta::where('Clave', $key)->firstOrFail();
        $this->preguntas = PreguntaBase::where('cuestionarios_id', 1)->get();
    }

    public function updatedRespuestas()
    {
        // Verificar si alguna respuesta en la Sección I es "Sí"
        $seccionI = $this->preguntas
            ->where('Seccion', 'Acontecimiento traumático severo')
            ->pluck('id')
            ->toArray();
    
        // Filtrar las respuestas de la Sección I
        $respuestasSeccionI = array_intersect_key($this->respuestas, array_flip($seccionI));
    
        // Si alguna respuesta en la Sección I es "Sí", mostrar las secciones adicionales
        if (in_array(1, $respuestasSeccionI)) {
            $this->mostrarSeccionesAdicionales = true;
        } else {
            $this->mostrarSeccionesAdicionales = false;
        }
    }

    public function submit()
    {
        // Validar que todas las respuestas estén completas
        $this->validate([
            'respuestas.*' => 'required|in:0,1',
        ]);

        // Evaluar las respuestas
        $seccionI = array_slice($this->respuestas, 0, 6);
        $seccionII = array_slice($this->respuestas, 6, 5);
        $seccionIII = array_slice($this->respuestas, 11, 5);
        $seccionIV = array_slice($this->respuestas, 16, 5);

        $requiereAtencion = false;

        if (in_array(1, $seccionI)) {
            if (in_array(1, $seccionII) || array_sum($seccionIII) >= 3 || array_sum($seccionIV) >= 2) {
                $requiereAtencion = true;
            }
        }

        // Guardar las respuestas en la base de datos
        $trabajadorEncuesta = TrabajadorEncuesta::create([
            'encuesta_id' => $this->encuesta->id, // Usar el ID de la encuesta
            'users_id' => auth()->id(), // Asignar el ID del usuario autenticado
            'fecha_fin_encuesta' => now(),
            'Avance' => 100, // Puedes ajustar este valor según tu lógica
        ]);

        foreach ($this->respuestas as $preguntaId => $respuesta) {
            // Verificar si el ID de la pregunta existe en la tabla preguntas_bases
            if (!PreguntaBase::where('id', $preguntaId)->exists()) {
                continue; // Saltar preguntas no respondidas o con ID inválido
            }

            Respuesta::create([
                'ValorRespuesta' => $respuesta,
                'preguntasbases_id' => $preguntaId,
                'trabajadores_encuestas_id' => $trabajadorEncuesta->id,
            ]);
        }

        // Filtrar respuestas no válidas
        $this->respuestas = array_filter($this->respuestas, function ($preguntaId) {
            return PreguntaBase::where('id', $preguntaId)->exists();
        }, ARRAY_FILTER_USE_KEY);

        // Calcular el porcentaje de avance
        $totalTrabajadores = $this->encuesta->NumeroEncuestas;
        $respuestasRecibidas = $this->encuesta->EncuestasContestadas + 1; // Incrementar en 1
        $porcentajeAvance = ($respuestasRecibidas / $totalTrabajadores) * 100;

        // Actualizar el avance de la encuesta
        $this->encuesta->update([
            'EncuestasContestadas' => $respuestasRecibidas,
            'Avance' => $porcentajeAvance,
        ]);

        // Redirigir a la página de agradecimiento
        return redirect()->route('survey.thankyou')->with('requiereAtencion', $requiereAtencion);
    }

    public function render()
    {
        return view('livewire.dx035.cuestionario-para-responder.responder-cuestionario-uno')
            ->layout('layouts.app');
    }
}