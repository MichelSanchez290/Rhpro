<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use App\Models\Dx035\Encuesta;

class MostrarEncuestas extends Component
{
    public $showModal = false; // Control para ventana emergente
    public $encuestaToDelete;  // Clave de la encuesta a eliminar

    // Escuchar el evento confirmDelete
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ];

    // Método para confirmar la eliminación
    public function confirmDelete($clave)
    {
        $this->encuestaToDelete = $clave;
        $this->showModal = true; // Mostrar el modal de confirmación
    }

    // Método para eliminar la encuesta
    public function deleteEncuesta()
    {
        if ($this->encuestaToDelete) {
            // Buscar la encuesta por su clave
            $encuesta = Encuesta::findOrFail($this->encuestaToDelete);

            // Eliminar el logo si existe
            if ($encuesta->RutaLogo) {
                Storage::disk('public')->delete($encuesta->RutaLogo);
            }

            // Eliminar la encuesta
            $encuesta->delete();

            // Mostrar mensaje de éxito
            session()->flash('message', 'Encuesta eliminada correctamente.');
        }

        // Cerrar el modal y reiniciar la variable
        $this->encuestaToDelete = null;
        $this->showModal = false;

        // Redirigir a la página de índice de encuestas
        return redirect()->route('encuesta.index');
    }

    public function render()
    {
        return view('livewire.dx035.encuestas.mostrar-encuestas')
            ->layout('layouts.dx035');
    }
}
