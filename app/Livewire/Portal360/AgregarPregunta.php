<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Pregunta;
use Livewire\Component;

class AgregarPregunta extends Component
{
    public $pregunta = []; // Inicializar con valores vacíos
    public $respuestas = [];

    // Reglas de validación
    protected $rules = [
        'pregunta.texto' => 'required|min:10', // Agregar validación de longitud mínima
        'pregunta.descripcion' => 'required|max:500', // Agregar validación de longitud máxima
        'respuestas.*.texto' => 'required|min:5',
        'respuestas.*.puntuacion' => 'required|integer|min:1|max:4',
        // 'respuestas.' =>,
        // 'respuestas.'

    ];

    protected $messages = [
        'pregunta.texto.required' => 'El texto de la pregunta es obligatorio.',
        'pregunta.texto.min' => 'El texto debe tener al menos 10 caracteres.',
        'pregunta.descripcion.required' => 'La descripción es obligatoria.',
        'pregunta.descripcion.max' => 'La descripción no debe exceder los 500 caracteres.',
        'respuestas.*.texto.required' => 'El texto de la respuesta es obligatorio.',
        'respuestas.*.texto.min' => 'El texto de la respuesta debe tener al menos 5 caracteres.',
        'respuestas.*.puntuacion.required' => 'La puntuación es obligatoria.',
        'respuestas.*.puntuacion.integer' => 'La puntuación debe ser un número entero.',
        'respuestas.*.puntuacion.min' => 'La puntuación debe ser al menos 1.',
        'respuestas.*.puntuacion.max' => 'La puntuación no debe ser mayor a 4.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName); // Validación en tiempo real
    }

    public function savePregunta()
    {
        $this->validate();

        try {
            $nuevaPregunta = new Pregunta($this->pregunta);
            $nuevaPregunta->save();

            foreach ($this->respuestas as $respuestaData) {
                $nuevaPregunta->respuestas()->create($respuestaData);
            }

            $this->pregunta = [];
            $this->respuestas = [];

            $this->dispatch('toastr-success', message: 'Pregunta y respuestas guardadas correctamente.');
            return redirect()->route('portal360.mostrarPregunta');
        } catch (\Exception $e) {
            logger($e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al guardar la pregunta: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.portal360.agregar-pregunta')
            ->layout('layouts.portal360');
    }
}

