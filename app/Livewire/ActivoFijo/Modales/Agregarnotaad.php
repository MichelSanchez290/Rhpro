<?php

namespace App\Livewire\ActivoFijo\Modales;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Notatecno;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent; // Asegúrate de usar ModalComponent en lugar de Component

class Agregarnotaad extends ModalComponent // Cambia a ModalComponent
{
    public $notadescripcion; // Descripción de la nota
    public $activosTecnologiaSeleccionados = null; // Activo de tecnología seleccionado
    public $activosTecnologia = []; // Lista de todos los activos de tecnología

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Verificar si el usuario tiene el rol GoldenAdmin
        if (!$user || !$user->hasRole('GoldenAdmin')) {
            $this->closeModal();
            return;
        }

        // Cargar todos los activos de tecnología si el usuario es GoldenAdmin
        $this->cargarActivosTecnologia();
    }

    /**
     * Carga todos los activos de tecnología disponibles.
     */
    protected function cargarActivosTecnologia()
    {
        // GoldenAdmin puede ver todos los activos de tecnología, sin filtros
        $this->activosTecnologia = ActivoTecnologia::query()
            ->with(['sucursal', 'empresa']) // Cargar relaciones para mostrar en el select
            ->get();
    }

    protected $rules = [
        'notadescripcion' => 'required|string|max:255', // Descripción obligatoria, con límite de caracteres
        'activosTecnologiaSeleccionados' => 'required|exists:activos_tecnologias,id', // Activo seleccionado debe existir
    ];

    protected $validationAttributes = [
        'notadescripcion' => 'Descripción',
        'activosTecnologiaSeleccionados' => 'Activo de Tecnología',
    ];

    /**
     * Guarda la nota y la asocia con el activo de tecnología seleccionado.
     */
    public function agregarNotatec()
    {
        // Validar los datos del formulario
        $this->validate();

        // Crear la nota
        $nota = Notatecno::create([
            'descripcion' => $this->notadescripcion,
        ]);

        // Asociar el activo de tecnología seleccionado a través de la tabla pivote
        if ($this->activosTecnologiaSeleccionados) {
            $nota->activosTecnologias()->attach($this->activosTecnologiaSeleccionados);
        }

        // Cerrar el modal y emitir evento para actualizar la tabla
        $this->closeModal();
        $this->dispatch('refreshPowerGrid');
    }

    public function render()
    {
        return view('livewire.activo-fijo.modales.agregarnotaad');
    }
}