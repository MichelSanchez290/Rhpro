<?php

namespace App\Livewire\PortalRh\Incidencias;

use Livewire\Component;
use App\Models\PortalRH\Incidencia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VerIncidencias extends Component
{
    public $incidencias;

    public function mount()
    {
        $user = Auth::user();

        // Obtener solo las incidencias que tengan asignado al usuario autenticado.
        $this->incidencias = Incidencia::with('users')
            ->whereHas('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })
        ->get();
    }
    
    public function render()
    {
        return view('livewire.portal-rh.incidencias.ver-incidencias')->layout('layouts.client');
    }
}
