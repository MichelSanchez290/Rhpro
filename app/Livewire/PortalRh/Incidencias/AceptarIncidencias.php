<?php

namespace App\Livewire\PortalRh\Incidencias;
use App\Models\PortalRH\Incidencia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AceptarIncidencias extends Component
{
    public $incidencias_pendientes;

    public function mount()
    {
        // Obtener incidencias que aún no han sido aprobadas
         $this->incidencias_pendientes = Incidencia::with('users')->doesntHave('users')->get();
    }

    public function aprobar($incidenciaId)
    {
        $incidencia = Incidencia::findOrFail($incidenciaId);

        // Obtener el usuario que solicitó la incidencia
        $user = $incidencia->users()->first();

        if ($user) {
            // Insertar en la tabla pivote user_incidencia
            $incidencia->users()->syncWithoutDetaching([$user->id]);

            // Notificar al usuario
            session()->flash('message', 'Incidencia aprobada y registrada.');
        }

        // Actualizar la lista de incidencias pendientes
        $this->mount();
    }

    public function rechazar($incidenciaId)
    {
        $incidencia = Incidencia::findOrFail($incidenciaId);

        // Obtener el usuario que solicitó la incidencia
        $user = $incidencia->users()->first();

        if ($user) {
            // Notificar al usuario que su incidencia fue rechazada
            session()->flash('message', 'Incidencia rechazada.');

            // Opcional: Eliminar la incidencia si no deseas conservar registros rechazados
            $incidencia->delete();
        }

        // Actualizar la lista de incidencias pendientes
        $this->mount();
    }

    public function render()
    {
        return view('livewire.portal-rh.incidencias.aceptar-incidencias')->layout('layouts.client');
    }
}
