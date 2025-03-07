<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\AdminTrabajador;

use Livewire\Component;
use App\Models\PortalCapacitacion\CapacitacionIndividual;
use App\Models\PortalCapacitacion\Evidencia;

class MostrarEvidenciasTrabajador extends Component
{
    public $caps_individuales_id;  
    public $evidencias; 
    public $showModal = false;
    public $funcionToDelete;

    public function mount($id)
    {
        $this->caps_individuales_id = \Illuminate\Support\Facades\Crypt::decrypt($id);

        $capsIndividual = CapacitacionIndividual::find($this->caps_individuales_id);
        if ($capsIndividual) {
            $this->evidencias = $capsIndividual->evidencias;  // Obtener las evidencias asociadas
        }
    }

    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->funcionToDelete = $id;
        $this->showModal = true; // Mostrar modal
    }

    public function deleteFuncion()
    {
        if ($this->funcionToDelete) {
            Evidencia::find($this->funcionToDelete)->delete();
            session()->flash('message', 'Evidencia eliminada con éxito');
        }
        $this->funcionToDelete = null;
        $this->showModal = false;

        return redirect()->route('verEvidenciasIndTrabajador', ['id' => $this->usuario_id]); // Redirigir después de eliminar
    }

    public function render()
{
    return view('livewire.portal-capacitacion.evidencias.admin-trabajador.mostrar-evidencias', [
        'caps_individuales_id' => $this->caps_individuales_id
    ])->layout("layouts.portal_capacitacion");
}

}
