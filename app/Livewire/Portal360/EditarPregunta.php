<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Pregunta;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarPregunta extends Component
{

    public $preguntaId, $texto, $descripcion;

    // Reglas de validación
    protected $rules = [
        'texto' => 'required|min:10', // Coincide con las reglas de AgregarPregunta
        'descripcion' => 'required|max:500', // Coincide con las reglas de AgregarPregunta
    ];

    protected $messages = [
        'texto.required' => 'El texto de la pregunta es obligatorio.',
        'texto.min' => 'El texto debe tener al menos 10 caracteres.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.max' => 'La descripción no debe exceder los 500 caracteres.',
    ];

    public function mount($id)
    {
        try {
            $this->preguntaId = Crypt::decrypt($id);

            $pregunta = Pregunta::findOrFail($this->preguntaId);

            $this->texto = $pregunta->texto;
            $this->descripcion = $pregunta->descripcion;
        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al cargar la pregunta: ' . $e->getMessage());
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName); // Validación en tiempo real
    }

    public function editpregunta()
    {
        $this->validate();

        try {
            // Buscar la pregunta y actualizarla
            $pregunta = Pregunta::findOrFail($this->preguntaId);
            $pregunta->update([
                'texto' => $this->texto,
                'descripcion' => $this->descripcion,
            ]);

            // Notificación de éxito
            $this->dispatch('toastr-success', message: 'Pregunta editada correctamente.');

            // Redireccionar a la lista de preguntas
            return redirect()->route('portal360.mostrarPregunta');
        } catch (\Exception $e) {
            // Notificación de error
            $this->dispatch('toastr-error', message: 'Error al editar la pregunta: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.portal360.editar-pregunta')
            ->layout('layouts.portal360');
    }
}
