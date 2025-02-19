<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreEmpresa;

use App\Models\Encuestas360\Encpre;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarEncuestaPreguntaEncpreEmpresa extends Component
{
    public function redirigirEncpreEmpresa()
    {
        return redirect()->route('agregarEncpreEmpresa');
    }

    #[On('eliminarEncpreEmpresa')]
    public function deleteEncpreEmpresa($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);

            $encpre = Encpre::findOrFail($decryptedId);
            $encpre->delete();

            // Mostrar mensaje de éxito con SweetAlert2
            $this->dispatch('swal-success', message: 'Encuesta y preguunta eliminada correctamente.');

            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-empresa.mostrar-encuesta-pregunta-encpre-empresa');
        } catch (\Exception $e) {
            $this->dispatch('swal-error', message: 'Error al eliminar la relación.');
        }
    }

    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-empresa.mostrar-encuesta-pregunta-encpre-empresa')->layout('layouts.portal360');
    }
}
