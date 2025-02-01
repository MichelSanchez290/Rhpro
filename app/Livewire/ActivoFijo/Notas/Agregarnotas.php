<?php

namespace App\Livewire\ActivoFijo\Notas;

use Livewire\Component;
use App\Models\ActivoFijo\Notatecno;
use App\Models\ActivoFijo\Activos\ActivoTecnologia;

class Agregarnotas extends Component
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
        $nota->activosTecnologia()->attach($this->activosTecnologiaSeleccionados);

        // Redireccionar o limpiar el formulario
        $this->reset(['notadescripcion', 'activosTecnologiaSeleccionados']);
        return redirect()->route('mostrarnotas'); // Cambia 'ruta_de_muestra' por la ruta correcta
    }

    public function render()
    {
        return view('livewire.activo-fijo.notas.agregarnotas')->layout('layouts.navactivos');
    }
}