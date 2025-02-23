<?php

namespace App\Livewire\Portal360\Preguntas\PreguntasSucursal;

use App\Models\Encuestas360\Pregunta;
use App\Models\PortalRH\Empresa;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarPreguntaSucursal extends Component
{

    public $preguntaId;
    public $pregunta = [
        'texto' => '',
        'descripcion' => ''
    ];

    public $respuestas = [];
    public $empresas = []; // Lista de empresas
    public $empresa_id; // Empresa seleccionada

    protected $rules = [
        'pregunta.texto' => 'required|min:10',
        'pregunta.descripcion' => 'required|max:500',
        'respuestas.*.texto' => 'required|min:5',
        'respuestas.*.puntuacion' => 'required|integer|min:1|max:4',
        'empresa_id' => 'required|exists:empresas,id', // Validar la empresa seleccionada
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

    public function mount($id)
    {
        try {
            $this->preguntaId = Crypt::decrypt($id);

            // Cargar la pregunta con sus respuestas
            $pregunta = Pregunta::with('respuestas')->findOrFail($this->preguntaId);

            $this->pregunta = [
                'texto' => $pregunta->texto,
                'descripcion' => $pregunta->descripcion
            ];

            // Cargar las respuestas
            $this->respuestas = $pregunta->respuestas->map(function ($respuesta) {
                return [
                    'id' => $respuesta->id,
                    'texto' => $respuesta->texto,
                    'puntuacion' => $respuesta->puntuacion,
                    'empresa_id' => $respuesta->empresa_id // Cargar empresa_id de la respuesta
                ];
            })->toArray();

            // Asegurar que siempre haya 4 respuestas
            while (count($this->respuestas) < 4) {
                $this->respuestas[] = [
                    'id' => null,
                    'texto' => '',
                    'puntuacion' => '',
                    'empresa_id' => null
                ];
            }

            // Cargar la lista de empresas
            $this->empresas = Empresa::select('id', 'nombre')->get();

            // Establecer la empresa seleccionada (si hay respuestas)
            if (!empty($this->respuestas[0]['empresa_id'])) {
                $this->empresa_id = $this->respuestas[0]['empresa_id'];
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al cargar la pregunta: ' . $e->getMessage());
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function editarPreguntaSucu()
    {
        $this->validate();

        try {
            // Buscar y actualizar la pregunta
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
                            'puntuacion' => $respuestaData['puntuacion'],
                            'empresa_id' => $this->empresa_id // Asignar la empresa seleccionada
                        ]
                    );
                } else {
                    // Crear nueva respuesta
                    $pregunta->respuestas()->create([
                        'texto' => $respuestaData['texto'],
                        'puntuacion' => $respuestaData['puntuacion'],
                        'empresa_id' => $this->empresa_id // Asignar la empresa seleccionada
                    ]);
                }
            }

            // Notificación de éxito
            $this->dispatch('toastr-success', message: 'Pregunta editada correctamente.');

            // Redireccionar a la lista de preguntas
            return redirect()->route('portal360.preguntas.preguntas-sucursal.mostrar-pregunta-sucursal');
        } catch (\Exception $e) {
            // Notificación de error
            $this->dispatch('toastr-error', message: 'Error al editar la pregunta: ' . $e->getMessage());
        }
    }



    public function render()
    {
        return view('livewire.portal360.preguntas.preguntas-sucursal.editar-pregunta-sucursal')->layout('layouts.portal360');
    }
}
