<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Crm\DatosFiscale;
use Livewire\WithFileUploads;

class DatosFiscale extends Component
{
    use Livewire\WithFileUploads;
    public $dato = [];
    public $consulta;

    protected $rules = [
        'dato.id' => 'required',
        'dato.razonSocial' => 'required',
        'dato.rfc' => 'required',
        'dato.calle' => 'required',
        'dato.numeroExterior' => 'required',
        'dato.numeroInterior' => 'required',
        'dato.colonia' => 'required',
        'dato.municipio' => 'required',
        'dato.localidad' => 'required',
        'dato.estado' => 'required',
        'dato.pais' => 'required',
        'dato.codigoPostal' => 'required',
    ];

    protected $messages = [
        'dato.id'.'required' => 'Id requerido',
        'dato.razonSocial'.'required' => 'Razon social requerida',
        'dato.rfc'.'required' => 'RFC requerido',
        'dato.calle'.'required' => 'Calle requerida',
        'dato.numeroExterior'.'required' => 'Num exterior requerido',
        'dato.numeroInterior'.'required' => 'Num interior requerido',
        'dato.colonia'.'required' => 'Colonia requerida',
        'dato.municipio'.'required' => 'Municipio requerido',
        'dato.localidad'.'required' => 'Localidad requerida',
        'dato.estado'.'required' => 'Estado requerido',
        'dato.pais'.'required' => 'Pais requerido',
        'dato.codigoPostal'.'required' => 'CP requerido',
    ];

    public function mount()
    {
        //ejemplo de cunsulta
        $this->consulta = DatosFiscale::get();
    }

    public function savedato()
    {
        $this->validate();
        $agregarDato = new DatosFiscale($this->empresa);
        $agregarDato->save();

        $this->dato = [];
        $this->emit('showAnimatedToast', 'Datos fiscales guardados correctamente');
        return redirect()->route('mostrar');
    }

    public function render()
    {
        return view('livewire.datos-fiscale')->layout('layouts.crm');
    }
}