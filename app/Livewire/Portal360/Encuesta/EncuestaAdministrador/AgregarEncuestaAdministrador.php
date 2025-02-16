<?php

namespace App\Livewire\Portal360\Encuesta\EncuestaAdministrador;

use App\Models\Encuestas360\Encuesta360;
use Livewire\Component;

class AgregarEncuestaAdministrador extends Component
{

    public $encuesta = [
        'nombre' => '',
        'descripcion' => '',
        'indicaciones' => '',
    ];

    protected $rules = [
        'encuesta.nombre' => 'required|min:3',
        'encuesta.descripcion' => 'required|min:5',
        'encuesta.indicaciones' => 'required|min:5',
    ];

    protected $messages = [
        'encuesta.nombre.required' => 'El nombre es obligatorio y debe tener al menos 3 caracteres.',
        'encuesta.descripcion.required' => 'La descripción es obligatoria y debe tener al menos 5 caracteres.',
        'encuesta.indicaciones.required' => 'Las indicaciones son obligatorias y deben tener al menos 5 caracteres.',
    ];

    public function saveEncuestaAdministrador()
    {
        $this->validate();

        try {
            $nuevaEncuesta = new Encuesta360($this->encuesta);
            $nuevaEncuesta->save();

            $this->encuesta = [
                'nombre' => '',
                'descripcion' => '',
                'indicaciones' => '',
            ];

            // Notificación de éxito
            $this->dispatch('toastr-success', message: 'Encuesta Guardada Correctamente.');

            return redirect()->route('portal360.encuesta.encuesta-administrador.mostrar-encuesta-administrador');
        } catch (\Exception $e) {
            // Notificación de error
            $this->dispatch('toastr-error', message: 'Error al guardar la encuesta: ' . $e->getMessage());
        }
    }

    

    public function render()
    {
        return view('livewire.portal360.encuesta.encuesta-administrador.agregar-encuesta-administrador')->layout('layouts.portal360');
    }
}
