<?php

namespace App\Livewire\PortalRh\Sucursal;

use Livewire\Component;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\RegistPatronal;

class AgregarSucursal extends Component
{
    public $sucursal = [];
    public $regpatronales;

    public function mount()
    {
        $this->regpatronales = RegistPatronal::all();
    }

    // REGLAS DE VALIDACIÓN
    protected $rules = [
        'sucursal.clave_sucursal' => 'required',
        'sucursal.nombre_sucursal' => 'required',
        'sucursal.zona_economica' => 'required',
        'sucursal.estado' => 'required',
        'sucursal.cuenta_contable' => 'required',
        'sucursal.rfc' => 'required|size:13',
        'sucursal.correo' => 'required|email',
        'sucursal.telefono' => 'required',
        'sucursal.status' => 'required',
        'sucursal.registro_patronal_id' => 'required',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'sucursal.clave_sucursal.required' => 'La clave de la sucursal es requerida',
        'sucursal.nombre_sucursal.required' => 'El nombre de la sucursal es requerido',
        'sucursal.zona_economica.required' => 'La zona económica es requerida',
        'sucursal.estado.required' => 'El estado es requerido',
        'sucursal.cuenta_contable.required' => 'La cuenta contable es requerida',
        'sucursal.rfc.required' => 'El RFC es requerido',
        'registro.rfc.size' => 'El RFC debe tener exactamente 13 caracteres.',
        'sucursal.correo.required' => 'El correo es requerido',
        'sucursal.correo.email' => 'El correo debe ser válido',
        'sucursal.telefono.required' => 'El teléfono es requerido',
        'sucursal.status.required' => 'El estado es requerido',
        'sucursal.registro_patronal_id' => 'El reg patronal es requerido',
    ];

    // Método para guardar sucursal
    public function saveSucursal()
    {
        $this->validate();

        $AgregarSucursal = new Sucursal($this->sucursal);
        $AgregarSucursal->save();

        $this->sucursal = [];
        //$this->emit('showAnimatedToast', 'Sucursal guardada correctamente');
        return redirect()->route('mostrarsucursal');
    }

    public function render()
    {
        return view('livewire.portal-rh.sucursal.agregar-sucursal')->layout('layouts.client');
    }
}
