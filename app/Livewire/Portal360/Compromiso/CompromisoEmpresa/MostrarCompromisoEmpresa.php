<?php

namespace App\Livewire\Portal360\Compromiso\CompromisoEmpresa;

use App\Models\Encuestas360\Compromiso;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarCompromisoEmpresa extends Component
{
    public function redirigirCompromisoEmpresa()
    {
        return redirect()->route('agregarCompromisoEmpresa');
    }

    #[On('eliminarCompromisoEmpresa')]
    public function deleteCompromisoEmpresa($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);

            $compromiso = Compromiso::findOrFail($decryptedId);
            $compromiso->delete();

            // Mostrar mensaje de éxito con SweetAlert2
            $this->dispatch('swal-success', message: 'Compromiso eliminado correctamente.');

            return redirect()->route('portal360.compromiso.compromiso-empresa.mostrar-compromiso-empresa');
        } catch (\Exception $e) {
            $this->dispatch('swal-error', message: 'Error al eliminar el compromiso.');
        }
    }

    public function render()
    {
        return view('livewire.portal360.compromiso.compromiso-empresa.mostrar-compromiso-empresa')->layout('layouts.portal360');
    }
}
