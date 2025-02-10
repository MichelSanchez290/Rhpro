<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Encuesta360;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class EncuestaDev extends Component
{
    public function redirigirencuesta()
    {
        return redirect()->route('agregarEncuesta');
    }

    public function deleteEncuesta($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            
            $encuesta = Encuesta360::findOrFail($decryptedId);
            $encuesta->delete();

            $this->dispatch('toastr-success', message: 'Encuesta eliminada correctamente.');
            return redirect()->route('portal360.mostrarEncuestaDev');
        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al eliminar la encuesta: ' . $e->getMessage());
        }
    }

    #[On('eliminarEncuesta')]
    public function confirmarEliminacion($id)
    {
        $this->deleteEncuesta($id);
    }


    public function render()
    {
        return view('livewire.portal360.encuesta-dev')->layout('layouts.portal360');
    }
}
