<?php

namespace App\Livewire\Portal360\Encuesta\EncuestaEmpresa;

use App\Models\Encuestas360\Encuesta360;
use App\Models\PortalRH\Empresa;
use Livewire\Component;

class AgregarEncuestaEmpresa extends Component
{

    public $encuesta = [
        'nombre' => '',
        'descripcion' => '',
        'indicaciones' => '',
        'empresa_id' => '', // Added empresa_id field
    ];

    public $empresas = []; // Property to store companies

    public function mount()
    {
        // Load companies when component is mounted
        $this->empresas = Empresa::select('id', 'nombre')->get();
    }

    protected $rules = [
        'encuesta.nombre' => 'required|min:3',
        'encuesta.descripcion' => 'required|min:5',
        'encuesta.indicaciones' => 'required|min:5',
        'encuesta.empresa_id' => 'required|exists:empresas,id', // Added validation rule
    ];

    protected $messages = [
        'encuesta.nombre.required' => 'El nombre es obligatorio y debe tener al menos 3 caracteres.',
        'encuesta.descripcion.required' => 'La descripción es obligatoria y debe tener al menos 5 caracteres.',
        'encuesta.indicaciones.required' => 'Las indicaciones son obligatorias y deben tener al menos 5 caracteres.',
        'encuesta.empresa_id.required' => 'Debe seleccionar una empresa.',
        'encuesta.empresa_id.exists' => 'La empresa seleccionada no es válida.',
    ];

    public function saveEncuestaEmpresa()
    {
        $this->validate();

        try {
            $nuevaEncuesta = new Encuesta360($this->encuesta);
            $nuevaEncuesta->save();

            $this->encuesta = [
                'nombre' => '',
                'descripcion' => '',
                'indicaciones' => '',
                'empresa_id' => '',
            ];

            $this->dispatch('toastr-success', message: 'Encuesta Guardada Correctamente.');

            return redirect()->route('portal360.encuesta.encuesta-empresa.mostrar-encuesta-empresa');
        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al guardar la encuesta: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.portal360.encuesta.encuesta-empresa.agregar-encuesta-empresa')->layout('layouts.portal360');
    }
}
