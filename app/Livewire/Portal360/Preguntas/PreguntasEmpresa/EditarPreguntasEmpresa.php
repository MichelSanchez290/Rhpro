<?php

namespace App\Livewire\Portal360\Preguntas\PreguntasEmpresa;

use App\Models\Encuestas360\Pregunta;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarPreguntasEmpresa extends Component
{
    public $preguntaId;
    public $pregunta = [
        'texto' => '',
        'descripcion' => ''
    ];
    
    public $respuestas = [];

    protected $rules = [
        'pregunta.texto' => 'required|min:10',
        'pregunta.descripcion' => 'required|max:500',
        'respuestas.*.texto' => 'required|min:5',
        'respuestas.*.puntuacion' => 'required|integer|min:1|max:4',
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
    

    public function mount($id)
    {
        try {
            $this->preguntaId = Crypt::decrypt($id);

            $pregunta = Pregunta::with('respuestas')->findOrFail($this->preguntaId);

            $this->pregunta = [
                'texto' => $pregunta->texto,
                'descripcion' => $pregunta->descripcion
            ];

            $this->respuestas = $pregunta->respuestas->map(function ($respuesta) {
                return [
                    'id' => $respuesta->id,
                    'texto' => $respuesta->texto,
                    'puntuacion' => $respuesta->puntuacion
                ];
            })->toArray();

            // Ensure we always have 4 respuestas, adding empty ones if needed
            while (count($this->respuestas) < 4) {
                $this->respuestas[] = [
                    'id' => null,
                    'texto' => '',
                    'puntuacion' => ''
                ];
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al cargar la pregunta: ' . $e->getMessage());
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function editarPreguntaEmpre()
    {
        $this->validate();

        try {
            // Buscar la pregunta y actualizarla
            $pregunta = Pregunta::findOrFail($this->preguntaId);
            $pregunta->update([
                'texto' => $this->pregunta['texto'],
                'descripcion' => $this->pregunta['descripcion']
            ]);

            // Actualizar o crear respuestas
            foreach ($this->respuestas as $respuestaData) {
                if (isset($respuestaData['id'])) {
                    // Actualizar respuesta existente
                    $pregunta->respuestas()->updateOrCreate(
                        ['id' => $respuestaData['id']],
                        [
                            'texto' => $respuestaData['texto'],
                            'puntuacion' => $respuestaData['puntuacion']
                        ]
                    );
                } else {
                    // Crear nueva respuesta
                    $pregunta->respuestas()->create([
                        'texto' => $respuestaData['texto'],
                        'puntuacion' => $respuestaData['puntuacion']
                    ]);
                }
            }

            // Notificación de éxito
            $this->dispatch('toastr-success', message: 'Pregunta editada correctamente.');

            // Redireccionar a la lista de preguntas
            return redirect()->route('portal360.preguntas.preguntas-empresa.mostrar-preguntas-empresa');
        } catch (\Exception $e) {
            // Notificación de error
            $this->dispatch('toastr-error', message: 'Error al editar la pregunta: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.portal360.preguntas.preguntas-empresa.editar-preguntas-empresa')->layout('layouts.portal360');
    }
}
