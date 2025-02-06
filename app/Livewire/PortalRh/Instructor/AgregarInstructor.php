<?php

namespace App\Livewire\PortalRh\Instructor;

use Livewire\Component;
use App\Models\PortalRH\Instruct;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departament;
use App\Models\User;

class AgregarInstructor extends Component
{
    public $instructor = [];
    public $usuarios, $sucursales, $departamentos;

    public function mount()
    {
        $this->usuarios = User::all();
        $this->sucursales = Sucursal::all();
        $this->departamentos = Departament::all();
    }

    protected $rules = [
        'instructor.telefono1' => 'required|digits:10',
        'instructor.telefono2' => 'required|digits:10',
        'instructor.registroStps' => 'required',
        'instructor.rfc' => 'nullable|size:13',
        'instructor.regimen' => 'required',
        'instructor.estado' => 'required',
        'instructor.municipio' => 'required',
        'instructor.codigopostal' => 'required|digits:5',
        'instructor.colonia' => 'required',
        'instructor.calle' => 'required',
        'instructor.numero' => 'required',
        'instructor.honorarios' => 'required',
        'instructor.status' => 'required',
        'instructor.dc5' => 'required',
        'instructor.cuentabancaria' => 'required',
        'instructor.ine' => 'required',
        'instructor.curp' => 'required|size:18', //|size:18
        'instructor.sat' => 'required',
        'instructor.domicilio' => 'required',
        'instructor.tipoinstructor' => 'required',
        'instructor.nombre_empresa' => 'required',
        'instructor.rfc_empre' => 'required|size:13',
        'instructor.calle_empre' => 'required',
        'instructor.numero_empre' => 'required',
        'instructor.colonia_empre' => 'required',
        'instructor.municipio_empre' => 'required',
        'instructor.estado_empre' => 'required',
        'instructor.postal_empre' => 'required|digits:5',
        'instructor.regimen_empre' => 'required',
        'instructor.user_id' => 'required|exists:users,id',
        'instructor.sucursal_id' => 'required|exists:sucursales,id',
        'instructor.departamento_id' => 'required|exists:departamentos,id',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'instructor.*.required' => 'Este campo es obligatorio',
        'instructor.codigopostal.digits' => 'El código postal debe tener 5 dígitos.',
        'instructor.postal_empre.digits' => 'El código postal debe tener 5 dígitos.',
        'instructor.curp.size' => 'La CURP debe tener exactamente 18 caracteres.',
        'instructor.rfc.size' => 'El RFC debe tener exactamente 13 caracteres.',
        'instructor.rfc_empre.size' => 'El RFC de la empresa debe tener exactamente 13 caracteres.',
        'instructor.telefono1.digits' => 'El número de celular debe tener 10 dígitos.',
        'instructor.telefono2.digits' => 'El número de celular debe tener 10 dígitos.',
        'instructor.user_id.exists' => 'El usuario seleccionado no existe.',
        'instructor.sucursal_id.exists' => 'La sucursal seleccionado no existe.',
        'instructor.departamento_id.exists' => 'El departamento seleccionado no existe.',
    ];



    // Método para guardar el registro patronal
    public function saveInstructor()
    {
        $this->validate();

        Instruct::create($this->instructor);

        $this->instructor = [];
        //$this->emit('showAnimatedToast', 'Registro patronal guardado correctamente.');
        return redirect()->route('mostrarinstructor');
    }

    public function redirigirInstructor()
    {
        return redirect()->route('mostrarinstructor');
    }

    public function render()
    {
        return view('livewire.portal-rh.instructor.agregar-instructor')->layout('layouts.client');
    }
}
