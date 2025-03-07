<?php

namespace App\Livewire\Portal360\Preguntas\PreguntasAdministrador;

use App\Models\Encuestas360\Pregunta;
use Livewire\Component;

class AgregarPreguntasAdministrador extends Component
{
    public $pregunta = [
        'texto' => '',
        'descripcion' => ''
    ];

    
    public $respuestas = [];
    
    // Inicializar las 4 respuestas
    public function mount()
    {
        $this->respuestas = [
            [
                'texto' => '',
                'puntuacion' => ''
            ],
            [
                'texto' => '',
                'puntuacion' => ''
            ],
            [
                'texto' => '',
                'puntuacion' => ''
            ],
            [
                'texto' => '',
                'puntuacion' => ''
            ]
        ];
    }

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function savePreguntaAdministrador()
    {
        $this->validate();

        try {
            $nuevaPregunta = Pregunta::create([
                'texto' => $this->pregunta['texto'],
                'descripcion' => $this->pregunta['descripcion']
            ]);

            foreach ($this->respuestas as $respuesta) {
                $nuevaPregunta->respuestas()->create([
                    'texto' => $respuesta['texto'],
                    'puntuacion' => $respuesta['puntuacion']
                ]);
            }

            // Limpiar los campos después de guardar
            $this->pregunta = [
                'texto' => '',
                'descripcion' => ''
            ];
            
            $this->mount(); // Reinicializar las respuestas

            $this->dispatch('toastr-success', message: 'Pregunta y respuestas guardadas correctamente.');
            return redirect()->route('portal360.preguntas.preguntas-administrador.mostrar-preguntas-administrador');

        } catch (\Exception $e) {
            logger($e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al guardar la pregunta: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.portal360.preguntas.preguntas-administrador.agregar-preguntas-administrador')->layout('layouts.portal360');
    }
}
