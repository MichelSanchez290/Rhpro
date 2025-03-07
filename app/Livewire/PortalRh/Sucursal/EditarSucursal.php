<?php

namespace App\Livewire\PortalRh\Sucursal;

use Livewire\Component;
use App\Models\PortalRH\Sucursal;
use Illuminate\Support\Facades\Crypt;
use App\Models\PortalRH\RegistroPatronal;



class EditarSucursal extends Component
{
    public $sucursal_id, $clave_sucursal, $nombre_sucursal, $zona_economica, $estado, $cuenta_contable, $rfc, $correo, $telefono, $status, $registro_patronal_id;
    public $regpatronales;


    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $sucursal = Sucursal::findOrFail($id);
        
        $this->sucursal_id = $id;
        $this->clave_sucursal = $sucursal->clave_sucursal;
        $this->nombre_sucursal = $sucursal->nombre_sucursal;
        $this->zona_economica = $sucursal->zona_economica;
        $this->estado = $sucursal->estado;
        $this->cuenta_contable = $sucursal->cuenta_contable;
        $this->rfc = $sucursal->rfc;
        $this->correo = $sucursal->correo;
        $this->telefono = $sucursal->telefono;
        $this->status = $sucursal->status;
        $this->registro_patronal_id = $sucursal->registro_patronal_id;

        $this->regpatronales = RegistroPatronal::all();
    }

    public function actualizarSucursal()
    {
        $this->validate([
            'clave_sucursal' => 'required',
            'nombre_sucursal' => 'required',
            'zona_economica' => 'required',
            'estado' => 'required',
            'cuenta_contable' => 'nullable',
            'rfc' => 'required',
            'correo' => 'required|email',
            'telefono' => 'nullable',
            'status' => 'required',
            'registro_patronal_id' => 'nullable|integer',
        ]);

        Sucursal::updateOrCreate(['id' => $this->sucursal_id], [
            'clave_sucursal' => $this->clave_sucursal,
            'nombre_sucursal' => $this->nombre_sucursal,
            'zona_economica' => $this->zona_economica,
            'estado' => $this->estado,
            'cuenta_contable' => $this->cuenta_contable,
            'rfc' => $this->rfc,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'status' => $this->status,
            'registro_patronal_id' => $this->registro_patronal_id,
        ]);

        return redirect()->route('mostrarsucursal')->with('message', 'Sucursal actualizada correctamente.');
    }


    public function render()
    {
        return view('livewire.portal-rh.sucursal.editar-sucursal')->layout('layouts.client');
    }
}
