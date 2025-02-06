<?php

namespace App\Livewire;

use App\Models\ActivoFijo\Tipoactivo as ActivoFijoTipoactivo;
use LivewireUI\Modal\ModalComponent;
use App\Models\Tipoactivo;

class BorrarActivo extends ModalComponent
{
    public $activo_id;

    public function mount($activo_id)
    {
        $this->activo_id = $activo_id;
    }

    public function delete()
    {
        // Buscar y eliminar el elemento
        $activo = ActivoFijoTipoactivo::find($this->activo_id);
        
        if ($activo) {
            $activo->delete();
        }

        // Cerrar el modal después de eliminar
        $this->closeModal();

        // Emitir un evento para actualizar la tabla
        $this->dispatch('refreshPowerGrid');
    }

    public function render()
    {
        return view('livewire.borrar-activo');
    }
}
