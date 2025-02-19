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
    public $cuestionarioId;
    public $atencionClientes = null; // Pregunta clave: Atención a clientes
    public $esJefe = null; // Pregunta clave: Es jefe

    public function mount($key)
    {
        // Cargar la encuesta
        $this->encuesta = Encuesta::where('Clave', $key)->firstOrFail();
    
        // Obtener los IDs de los cuestionarios seleccionados
        $cuestionariosIds = $this->encuesta->cuestionarios->pluck('id')->toArray();
    
        // Asignar el cuestionarioId (por ejemplo, si solo hay un cuestionario)
        $this->cuestionarioId = $cuestionariosIds[0] ?? null; // Ajusta según tu lógica
    
        // Cargar las preguntas de los cuestionarios seleccionados
        $this->preguntas = PreguntaBase::whereIn('cuestionarios_id', $cuestionariosIds)->get();
    
        // Debug: Verificar los cuestionarios y preguntas cargadas
        \Log::info('Cuestionarios IDs:', ['ids' => $cuestionariosIds]);
        \Log::info('Preguntas cargadas:', ['preguntas' => $this->preguntas->pluck('id')]);
    }

    public function updatedRespuestas()
    {
        \Log::info('Respuestas actualizadas:', $this->respuestas);
    
        if ($this->cuestionarioId == 1) {
            $seccionI = $this->preguntas
                ->where('Seccion', 'Acontecimiento traumático severo')
                ->pluck('id')
                ->toArray();
    
            \Log::info('IDs de la Sección I:', $seccionI);
    
            $respuestasSeccionI = array_intersect_key($this->respuestas, array_flip($seccionI));
    
            \Log::info('Respuestas de la Sección I:', $respuestasSeccionI);
    
            if (in_array(1, $respuestasSeccionI)) {
                $this->mostrarSeccionesAdicionales = true;
            } else {
                $this->mostrarSeccionesAdicionales = false;
            }
    
            \Log::info('Mostrar secciones adicionales:', ['mostrar' => $this->mostrarSeccionesAdicionales]);
        }
    }

    public function submit()
    {
        // Validar que todas las respuestas estén completas
        $this->validate([
            'respuestas.*' => 'required|in:0,1,2,3,4', // Ajustar según las opciones del cuestionario
            'atencionClientes' => 'required_if:cuestionarioId,2|in:0,1', // Validar la pregunta clave
            'esJefe' => 'required_if:cuestionarioId,2|in:0,1', // Validar la pregunta clave
        ]);
    
        // Guardar las respuestas en la base de datos
        $trabajadorEncuesta = TrabajadorEncuesta::create([
            'encuesta_id' => $this->encuesta->id,
            'users_id' => auth()->id(),
            'fecha_fin_encuesta' => now(),
            'Avance' => 100,
        ]);
    
        foreach ($this->respuestas as $preguntaId => $respuesta) {
            if (!PreguntaBase::where('id', $preguntaId)->exists()) {
                continue;
            }
    
            Respuesta::create([
                'ValorRespuesta' => $respuesta,
                'preguntasbases_id' => $preguntaId,
                'trabajadores_encuestas_id' => $trabajadorEncuesta->id,
            ]);
        }
    
        // Calcular la calificación final (solo para cuestionario 2)
        if ($this->cuestionarioId == 2) {
            $calificacionFinal = $this->calcularCalificacionFinal();
            $nivelRiesgo = $this->determinarNivelRiesgo($calificacionFinal);
    
            // Guardar la calificación y el nivel de riesgo
            $trabajadorEncuesta->update([
                'calificacion_final' => $calificacionFinal,
                'nivel_riesgo' => $nivelRiesgo,
            ]);
        }
    
        // Redirigir a la página de agradecimiento
        return redirect()->route('survey.thankyou')->with('requiereAtencion', $nivelRiesgo ?? false);
    }

    private function calcularCalificacionFinal()
    {
        $puntaje = 0;

        foreach ($this->respuestas as $preguntaId => $respuesta) {
            $pregunta = PreguntaBase::find($preguntaId);

            // Aplicar la lógica de calificación según el cuestionario 2
            if (in_array($preguntaId, range(18, 33))) {
                $puntaje += $respuesta; // Siempre=0, Casi siempre=1, etc.
            } elseif (in_array($preguntaId, array_merge(range(1, 17), range(34, 46)))) {
                $puntaje += (4 - $respuesta); // Siempre=4, Casi siempre=3, etc.
            }
        }

        return $puntaje;
    }

    private function determinarNivelRiesgo($calificacionFinal)
    {
        if ($calificacionFinal < 20) {
            return 'Nulo o despreciable';
        } elseif ($calificacionFinal >= 20 && $calificacionFinal < 45) {
            return 'Bajo';
        } elseif ($calificacionFinal >= 45 && $calificacionFinal < 70) {
            return 'Medio';
        } elseif ($calificacionFinal >= 70 && $calificacionFinal < 90) {
            return 'Alto';
        } else {
            return 'Muy alto';
        }
    }

    public function render()
    {
        return view('livewire.dx035.cuestionario-para-responder.responder-cuestionario-uno')
            ->layout('layouts.cuestionariosdx035');
    }
}