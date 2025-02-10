<?php

namespace App\Livewire\PortalRh\Empres;

use Livewire\Component;
use App\Models\PortalRH\Empresa;

class AgregarEmpres extends Component
{
    
    public $empresa = []; //almacenar 


    public function mount(){
        $prueba = Empresa::with('sucursales')->get();
        //dd($prueba);



        foreach($prueba as $p){

            foreach($p->sucursales as $sucursales){
                dd($sucursales->nombre_sucursal);
            }
            
        }
    }

    // Reglas de validación
    protected $rules = [
        'empresa.nombre' => 'required',
        'empresa.razon_social' => 'required',
        'empresa.rfc' => 'required',
        'empresa.nombre_comercial' => 'required',
        'empresa.pais_origen' => 'required',
        'empresa.representante_legal' => 'required',
        'empresa.url_constancia_situacion_fiscal' => 'nullable|url',
    ];


    
    protected $messages = [
        'empresa.nombre.required' => 'El nombre es obligatorio.',
        'empresa.razon_social.required' => 'La razón social es obligatoria.',
        'empresa.rfc.required' => 'El RFC es obligatorio.',
        'empresa.nombre_comercial.required' => 'El nombre comercial es obligatorio.',
        'empresa.pais_origen.required' => 'El país de origen es obligatorio.',
        'empresa.representante_legal.required' => 'El representante legal es obligatorio.',
        'empresa.url_constancia_situacion_fiscal.url' => 'Debe proporcionar una URL válida.',
    ];
    

    public function saveEmpres()
    {

        $this->validate();

        $nuevaEmpresa = new Empresa($this->empresa);
        $nuevaEmpresa->save();

        $this->empresa = [];
        //$this->emit('showAnimatedToast', 'Empresa guardada correctamente.');
        return redirect()->route('mostrarempresas');
    }

    public function redirigir()
    {
        return redirect()->route('mostrarempresas');
    }

    public function render()
    {
        return view('livewire.portal-rh.empres.agregar-empres')->layout('layouts.client');
    }
}
