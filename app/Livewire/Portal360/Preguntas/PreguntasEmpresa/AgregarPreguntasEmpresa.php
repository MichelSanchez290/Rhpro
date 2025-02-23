<?php

namespace App\Livewire\Portal360\Preguntas\PreguntasEmpresa;

use App\Models\Encuestas360\Pregunta;
use App\Models\PortalRH\Empresa;
use Livewire\Component;

class AgregarPreguntasEmpresa extends Component
{
    
public $pregunta = [
    'texto' => '',
    'descripcion' => ''
];

public $respuestas = [];
public $empresas = []; // Propiedad para almacenar la lista de empresas
public $empresa_id; // Propiedad para almacenar el ID de la empresa seleccionada

// Inicializar las 4 respuestas y cargar las empresas
public function mount()
{
    $this->respuestas = [
        ['texto' => '', 'puntuacion' => ''],
        ['texto' => '', 'puntuacion' => ''],
        ['texto' => '', 'puntuacion' => ''],
        ['texto' => '', 'puntuacion' => '']
    ];

    // Cargar las empresas al montar el componente
    $this->empresas = Empresa::select('id', 'nombre')->get();
}

protected $rules = [
    'pregunta.texto' => 'required|min:10',
    'pregunta.descripcion' => 'required|max:500',
    'respuestas.*.texto' => 'required|min:5',
    'respuestas.*.puntuacion' => 'required|integer|min:1|max:4',
    'empresa_id' => 'required|exists:empresas,id', // Validar que se seleccione una empresa válida
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
    'empresa_id.required' => 'Debe seleccionar una empresa.',
    'empresa_id.exists' => 'La empresa seleccionada no es válida.',
];

public function updated($propertyName)
{
    $this->validateOnly($propertyName);
}

public function savePreguntaEmpresa()
{
    $this->validate();

    try {
        // Crear la pregunta
        $nuevaPregunta = Pregunta::create([
            'texto' => $this->pregunta['texto'],
            'descripcion' => $this->pregunta['descripcion']
        ]);

        // Crear las respuestas asociadas a la pregunta
        foreach ($this->respuestas as $respuesta) {
            $nuevaPregunta->respuestas()->create([
                'texto' => $respuesta['texto'],
                'puntuacion' => $respuesta['puntuacion'],
                'empresa_id' => $this->empresa_id // Asignar la empresa seleccionada
            ]);
        }

        // Limpiar los campos después de guardar
        $this->reset(['pregunta', 'respuestas', 'empresa_id']);
        $this->mount(); // Reinicializar las respuestas

        $this->dispatch('toastr-success', message: 'Pregunta y respuestas guardadas correctamente.');
        return redirect()->route('portal360.preguntas.preguntas-empresa.mostrar-preguntas-empresa');

    } catch (\Exception $e) {
        logger($e->getMessage());
        $this->dispatch('toastr-error', message: 'Error al guardar la pregunta: ' . $e->getMessage());
    }
}



    public function render()
    {
        return view('livewire.portal360.preguntas.preguntas-empresa.agregar-preguntas-empresa')->layout('layouts.portal360');
    }
}
