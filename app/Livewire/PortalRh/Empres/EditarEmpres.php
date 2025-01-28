<?php

namespace App\Livewire\PortalRh\Empres;

use Livewire\Component;
use App\Models\PortalRH\Empres;
use Illuminate\Support\Facades\Crypt;

class EditarEmpres extends Component
{
    public $empres_id, $nombre, $razon_social, $rfc, $nombre_comercial, $pais_origen, $representante_legal, $url_constancia_situacion_fiscal;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tem = Empres::findOrFail($id);
        
        $this->empres_id = $id;
        $this->nombre = $tem->nombre;
        $this->razon_social = $tem->razon_social;
        $this->rfc = $tem->rfc;
        $this->nombre_comercial = $tem->nombre_comercial;
        $this->pais_origen = $tem->pais_origen;
        $this->representante_legal = $tem->representante_legal;
        $this->url_constancia_situacion_fiscal = $tem->url_constancia_situacion_fiscal;
    }

    public function actualizarEmpres()
    {
        $this->validate([
            'nombre' => 'required',
            'razon_social' => 'required',
            'rfc' => 'required',
            'nombre_comercial' => 'required',
            'pais_origen' => 'required',
            'representante_legal' => 'required',
            'url_constancia_situacion_fiscal' => 'required',
        ]);

        Empres::updateOrCreate(['id' => $this->empres_id], [
            'nombre' => $this->nombre,
            'razon_social' => $this->razon_social,
            'rfc' => $this->rfc,
            'nombre_comercial' => $this->nombre_comercial,
            'pais_origen' => $this->pais_origen,
            'representante_legal' => $this->representante_legal,
            'url_constancia_situacion_fiscal' => $this->url_constancia_situacion_fiscal,
        ]);

        
        //$this->emit('editBann', 'Empresa editada correctamente');
        return redirect()->route('mostrarempresas');
    }

    public function redirigir()
    {
        return redirect()->route('mostrarempresas');
    }

    public function render()
    {
        return view('livewire.portal-rh.empres.editar-empres')->layout('layouts.client');
    }
}
