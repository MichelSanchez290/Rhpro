<?php

namespace App\Livewire\PortalRh\Trabajador;

use Livewire\Component;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;

class AgregarTrabajador extends Component
{
    public $trabajador = [];
    public $usuarios, $departamentos, $puestos, $registros_patronales;

    public function mount()
    {
        $this->usuarios = User::all();
        $this->departamentos = Departamento::all();
        $this->puestos = Puesto::all();
        $this->registros_patronales = RegistroPatronal::all();
    }

    protected $rules = [
        'trabajador.clave_trabajador' => 'required',
        'trabajador.numero_seguridad_social' => 'required',
        'trabajador.fecha_nacimiento' => 'required',
        'trabajador.lugar_nacimiento' => 'required',
        'trabajador.estado' => 'required',
        'trabajador.codigo_postal' => 'required|digits:5',
        'trabajador.sexo' => 'required',
        'trabajador.curp' => 'required|size:18',
        'trabajador.rfc' => 'nullable|size:13',
        'trabajador.numero_celular' => 'required|digits:10',
        'trabajador.fecha_ingreso' => 'required',
        'trabajador.edad' => 'required',
        'trabajador.estado_civil' => 'required',
        'trabajador.estudios' => 'required',
        'trabajador.ocupacion' => 'required',
        'trabajador.tipo_puest' => 'required',
        'trabajador.contratacion' => 'required',
        'trabajador.tipo_personal' => 'required',
        'trabajador.jornada_trabajo' => 'required',
        'trabajador.rotacion' => 'required',
        'trabajador.experiencia' => 'required',
        'trabajador.tiempo_puesto' => 'required',
        'trabajador.calle' => 'required',
        'trabajador.colonia' => 'required',
        'trabajador.numero' => 'required',
        'trabajador.status' => 'required',
        'trabajador.user_id' => 'required|exists:users,id',
        'trabajador.departamento_id' => 'required|exists:departamentos,id',
        'trabajador.puesto_id' => 'required|exists:puestos,id',
        'trabajador.registro_patronal_id' => 'required|exists:registros_patronales,id',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'trabajador.*.required' => 'Este campo es obligatorio.',
        'trabajador.codigo_postal.digits' => 'El código postal debe tener 5 dígitos.',
        'trabajador.curp.size' => 'La CURP debe tener exactamente 18 caracteres.',
        'trabajador.rfc.size' => 'El RFC debe tener exactamente 13 caracteres.',
        'trabajador.numero_celular.digits' => 'El número de celular debe tener 10 dígitos.',
        'trabajador.user_id.exists' => 'El usuario seleccionado no existe.',
        'trabajador.departamento_id.exists' => 'El departamento seleccionado no existe.',
        'trabajador.puesto_id.exists' => 'El puesto seleccionado no existe.',
        'trabajador.registro_patronal_id.exists' => 'El Reg Patronal seleccionado no existe.',
    ];



    // Método para guardar el registro patronal
    public function saveTrabajador()
    {
        $this->validate();

        Trabajador::create($this->trabajador);

        $this->trabajador = [];
        //$this->emit('showAnimatedToast', 'Registro patronal guardado correctamente.');
        return redirect()->route('mostrartrabajador');
    }

    public function redirigirTrabajador()
    {
        return redirect()->route('mostrartrabajador');
    }

    public function render()
    {
        return view('livewire.portal-rh.trabajador.agregar-trabajador')->layout('layouts.client');
    }
}
