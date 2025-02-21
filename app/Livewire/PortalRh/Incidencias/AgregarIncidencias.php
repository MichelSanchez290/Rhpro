<?php

namespace App\Livewire\PortalRh\Incidencias;

use Livewire\Component;
use App\Models\PortalRH\Incidencia;
use Illuminate\Support\Facades\Auth;

class AgregarIncidencias extends Component
{
    public $incidencia = [];

    protected $rules = [
        'incidencia.tipo_incidencia' => 'required',
        'incidencia.fecha_inicio' => 'required|date',
        'incidencia.fecha_final' => 'required|date|after_or_equal:incidencia.fecha_inicio',
    ];

    protected $messages = [
        'incidencia.*.required' => 'Este campo es obligatorio.',
        'incidencia.fecha_final.after_or_equal' => 'La fecha final debe ser posterior o igual a la fecha de inicio.',
    ];

    public function saveIncidencia()
    {
        $this->validate();

        // Crear incidencia
        $AgregarIncidencia = new Incidencia($this->incidencia);
        $AgregarIncidencia->save();

        // Relacionar la incidencia con el usuario autenticado
        $AgregarIncidencia->users()->attach(Auth::id());

        // Notificar a los administradores que hay una nueva incidencia pendiente
        session()->flash('message', 'Incidencia enviada para aprobación.');

        return redirect()->route('mostrarincidencia');
    }

    public function redirigirIncidencia()
    {
        return redirect()->route('mostrarincidencia');
    }

    public function render()
    {
        return view('livewire.portal-rh.incidencias.agregar-incidencias')->layout('layouts.client');
    }
}
