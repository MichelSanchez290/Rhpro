<?php

namespace App\Livewire\Crm\DatosFiscale\Agregar;

use Livewire\Component;
use App\Models\Crm\DatosFiscale;
use App\Models\Crm\CrmEmpresa;

class AgregarDatosFiscale extends Component
{
    public $dato =[];
    public $consulta;

    protected $rules = [
        'dato.razonSocial' => 'required',
        'dato.rfc' => 'required',
        'dato.calle' => 'required',
        'dato.numeroExterior' => 'required',
        'dato.numeroInterior' => '',
        'dato.colonia' => 'required',
        'dato.municipio' => 'required',
        'dato.localidad' => 'required',
        'dato.estado' => 'required',
        'dato.pais' => 'required',
        'dato.codigoPostal' => 'required',
        'dato.crmEmpresas_id' => 'required',
    ];

    protected $messages = [
        'dato.razonSocial.required' => 'Razon social requerida',
        'dato.rfc.required' => 'RFC requerido',
        'dato.calle.required' => 'Calle requerida',
        'dato.numeroExterior.required' => 'Numero Exterior requerido',
        'dato.colonia.required' => 'Colonia requerida',
        'dato.municipio.required' => 'Municipio requerido',
        'dato.localidad.required' => 'Localidad requerida',
        'dato.estado.required' => 'Estado requerido',
        'dato.pais.required' => 'Pais requerido',
        'dato.codigoPostal.required' => 'Codigo Postal requerida',
        'dato.crmEmpresas_id.required' => 'Empresa requerida',
    ];

    public function mount()
    {
        $this->consulta = DatosFiscale::get();
    }

    public function saveDato()
    {
        $this->validate();

        $AgregarDato = new DatosFiscale($this->dato);
        $AgregarDato->save();

        $this->dato=[];
    }

    public function render()
    {
        return view('livewire.crm.datos-fiscale.agregar.agregar-datos-fiscale',[
                'empresa' => CrmEmpresa::get()
            ])->layout('layouts.crm');
    }
}
