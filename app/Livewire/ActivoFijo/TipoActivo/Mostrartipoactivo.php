<?php

namespace App\Livewire\ActivoFijo\TipoActivo;

use App\Models\ActivoFijo\Tipoactivo;
use Livewire\Component;

class Mostrartipoactivo extends Component
{
    public $tipoActivoId;
    public $showConfirmModal = false;

    protected $listeners = ['confirmDeleteModal'];

    public function confirmDeleteModal($id)
    {
        $this->tipoActivoId = $id;
        $this->showConfirmModal = true; // Mostrar el modal
    }

    public function deleteTipoActivo()
    {
        $tipoActivo = Tipoactivo::find($this->tipoActivoId);
        if ($tipoActivo) {
            $tipoActivo->delete();
            session()->flash('message', 'El activo ha sido eliminado.');

            $this->dispatch('tipoActivoEliminado', message: 'El activo ha sido eliminado correctamente.');
        } else {
            $this->dispatch('errorEliminacion', message: 'No se pudo eliminar el activo.');
        }

        $this->showConfirmModal = false; // Ocultar el modal
        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.activo-fijo.tipo-activo.mostrartipoactivo')->layout('layouts.navactivos');
    }
}
