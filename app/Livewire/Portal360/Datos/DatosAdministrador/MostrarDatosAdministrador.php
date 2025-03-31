<?php

namespace App\Livewire\Portal360\Datos\DatosAdministrador;

use App\Models\Encuestas360\Dato;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarDatosAdministrador extends Component
{
    public function redirigirDatosAdministrador()
    {
        return redirect()->route('agregarDatosAdministrador');
    }

    #[On('eliminarDatosAdministrador')]
    public function deleteDatosAdministrador($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);

            $dato = Dato::findOrFail($decryptedId);
            $dato->delete();

            // Mostrar mensaje de éxito con SweetAlert2
            $this->dispatch('swal-success', message: 'Datos eliminados correctamente.');

            return redirect()->route('portal360.datos.datos-administrador.mostrar-datos-administrador');
        } catch (\Exception $e) {
            $this->dispatch('swal-error', message: 'Error al eliminar el compromiso.');
        }
    }
    public function render()
    {
        return view('livewire.portal360.datos.datos-administrador.mostrar-datos-administrador')->layout('layouts.portal360');
    }
}
