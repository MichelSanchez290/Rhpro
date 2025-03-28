<?php

namespace App\Livewire\Portal360\Encpre\EncuestaPreguntaEncpreSucursal;

use App\Models\Encuestas360\Encpre;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarEncuestaPreguntaEncpreSucursal extends Component
{

    public function redirigirEncpreSucursal()
    {
        return redirect()->route('agregarEncpreSucursal');
    }

    #[On('eliminarEncpreSucursal')]
    public function deleteEncpreSucursal($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $encpre = Encpre::findOrFail($decryptedId);
            
            // Obtener el ID de la encuesta
            $encuestaId = $encpre->encuestas_id;
            
            // Eliminar todas las relaciones que pertenecen a la misma encuesta
            Encpre::where('encuestas_id', $encuestaId)->delete();
            
            // Mostrar mensaje de éxito con SweetAlert2
            $this->dispatch('swal-success', message: 'Todas las preguntas de la encuesta fueron eliminadas correctamente.');

            return redirect()->route('portal360.encpre.encuesta-pregunta-encpre-sucursal.mostrar-encuesta-pregunta-encpre-sucursal');
        } catch (\Exception $e) {
            $this->dispatch('swal-error', message: 'Error al eliminar la relación.');
        }
    }
    
    public function render()
    {
        return view('livewire.portal360.encpre.encuesta-pregunta-encpre-sucursal.mostrar-encuesta-pregunta-encpre-sucursal')->layout('layouts.portal360');
    }
}
