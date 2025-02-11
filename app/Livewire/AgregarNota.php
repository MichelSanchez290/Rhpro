<?php

namespace App\Livewire;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Notatecno;
use LivewireUI\Modal\ModalComponent;

class AgregarNota extends ModalComponent
{
    public $consulta, $notadescripcion, $activosTecnologiaSeleccionados = [];
    public $activosTecnologia; // Lista de activos de tecnología

    public function mount()
    {
        $this->consulta = Notatecno::all(); // Obtener todas las notas
        $this->activosTecnologia = ActivoTecnologia::all(); // Obtener todos los activos de tecnología
    }

    protected $rules = [
        'notadescripcion' => 'required|string',
        'activosTecnologiaSeleccionados' => 'required|array', // Validar que se seleccione al menos un activo
    ];

    protected $validationAttributes = [
        'notadescripcion' => 'Descripción',
        'activosTecnologiaSeleccionados' => 'Activos de Tecnología',
    ];

    public function agregarNotatec()
    {
        $this->validate();

        // Crear la nota
        $nota = Notatecno::create([
            'descripcion' => $this->notadescripcion,
        ]);

        // Asociar los activos de tecnología seleccionados
        $nota->activosTecnologias()->attach($this->activosTecnologiaSeleccionados);

        // Redireccionar o limpiar el formulario
        $this->reset(['notadescripcion', 'activosTecnologiaSeleccionados']);
        $this->closeModal();

        // Redirigir a la ruta deseada
        return redirect()->route('mostrarnotas');
    }
    public function render()
    {
        return view('livewire.agregar-nota');
    }
}
