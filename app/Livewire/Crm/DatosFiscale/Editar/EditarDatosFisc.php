<?php

namespace App\Livewire\Crm\DatosFiscale\Editar;

use App\Models\Crm\DatosFiscale;
use Livewire\Component;
use App\Models\Crm\CrmEmpresa;

class EditarDatosFisc extends Component
{
    public $dato_id, $razonSocial, $rfc;
    public $calle, $numeroExterior, $numeroInterior, $colonia, $municipio, $localidad, $estado, $pais, $codigoPostal;
    public $empresa_id;

    public function mount($id)
    {
        $tem = DatosFiscale::findOrFail($id);

        $this->dato_id = $id;
        $this->razonSocial = $tem->razonSocial;
        $this->rfc = $tem->rfc;
        $this->calle = $tem->calle;
        $this->numeroExterior = $tem->numeroExterior;
        $this->numeroInterior = $tem->numeroInterior;
        $this->colonia = $tem->colonia;
        $this->municipio = $tem->municipio;
        $this->localidad= $tem->localidad;
        $this->estado = $tem->estado;
        $this->pais = $tem->pais;
        $this->codigoPostal = $tem->codigoPostal;
        $this->empresa_id = $tem->empresa_id;
    }

    public function editDato()
    {
        $this->validate([
            'razonSocial' => 'required',
            'rfc' => 'required',
            'calle' => 'required',
            'numeroExterior' => 'required',
            'numeroInterior' => '',
            'colonia' => 'required',
            'municipio' => 'required',
            'localidad' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'codigoPostal' => 'required',
            'empresa_id' => 'required',
        ]);

        DatosFiscale::updateOrCreate(['id'=>$this->dato_id], [
            'razonSocial' => $this->razonSocial,
            'rfc' => $this->rfc,
            'calle' => $this->calle,
            'numeroExterior' => $this->numeroExterior,
            'numeroInterior' => $this->numeroInterior,
            'colonia' => $this->colonia,
            'municipio' => $this->municipio,
            'localidad' => $this->localidad,
            'estado' => $this->estado,
            'pais' => $this->pais,
            'codigoPostal' => $this->codigoPostal,
            'crmEmpresa_id' => $this->empresa_id
        ]);
        return redirect()->route('mostrarDatosFiscales');
    }
    public function render()
    {
        return view('livewire.crm.datos-fiscale.editar.editar-datos-fisc',[
            'empresa' => CrmEmpresa::get()
        ])->layout('layouts.crm');
    }
}