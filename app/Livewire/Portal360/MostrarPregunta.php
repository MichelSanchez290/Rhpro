<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Pregunta;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarPregunta extends Component
{
    public function redirigirpregunta()
    {
        return redirect()->route('agregarPregunta');
    }

    public function deletePregunta($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            
            $pregunta = Pregunta::findOrFail($decryptedId);
            
            // Eliminar primero las respuestas relacionadas
            $pregunta->respuestas()->delete();
            
            // Luego eliminar la pregunta
            $pregunta->delete();

            $this->dispatch('toastr-success', message: 'Pregunta eliminada correctamente.');
            return redirect()->route('portal360.mostrarPregunta');
        } catch (\Exception $e) {
            $this->dispatch('toastr-error', message: 'Error al eliminar la pregunta: ' . $e->getMessage());
        }
    }

    #[On('eliminarPregunta')]
    public function confirmarEliminacion($id)
    {
        $this->deletePregunta($id);
    }

    public function render()
    {
        return view('livewire.portal360.mostrar-pregunta')->layout('layouts.portal360');
    }
}
