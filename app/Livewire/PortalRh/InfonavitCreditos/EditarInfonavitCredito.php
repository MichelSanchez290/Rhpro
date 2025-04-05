<?php

namespace App\Livewire\PortalRh\InfonavitCreditos;

use Livewire\Component;
use App\Models\PortalRH\InfonavitCredito;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class EditarInfonavitCredito extends Component
{
    public $infonavit_id, $tipo_movimiento, $numero_credito, $fecha_movimiento,
        $tipo_descuento, $valor_descuento, $nombre_usuario;
    //

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $infonavit = InfonavitCredito::findOrFail($id);

        $this->infonavit_id  = $id;
        $this->tipo_movimiento = $infonavit->tipo_movimiento;
        $this->numero_credito = $infonavit->numero_credito;
        $this->fecha_movimiento     = $infonavit->fecha_movimiento;
        $this->tipo_descuento = $infonavit->tipo_descuento;
        $this->valor_descuento = $infonavit->valor_descuento;

        // Obtener el usuario asignado 
        if ($infonavit->user) {
            $this->nombre_usuario = $infonavit->user->name;
        }
    }

    public function actualizarInfonavit()
    {
        $this->validate([
            'tipo_movimiento' => 'required',
            'numero_credito'    => 'required',
            'fecha_movimiento'     => 'required',
            'tipo_descuento' => 'required',
            'valor_descuento' => 'required'
        ]);

        $infonavit = InfonavitCredito::findOrFail($this->infonavit_id);
        $infonavit->update([
            'tipo_movimiento'         => $this->tipo_movimiento,
            'numero_credito'          => $this->numero_credito,
            'fecha_movimiento'        => $this->fecha_movimiento,
            'tipo_descuento'          => $this->tipo_descuento,
            'valor_descuento'         => $this->valor_descuento
        ]);

        session()->flash('message', 'Credito Infonavit Actualizado.');
    }

    public function render()
    {
        return view('livewire.portal-rh.infonavit-creditos.editar-infonavit-credito')->layout('layouts.client');
    }
}
