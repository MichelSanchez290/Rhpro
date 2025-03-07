<?php

namespace App\Livewire\PortalRh\Becario;

use Livewire\Component;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\PortalRH\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgregarBecario extends Component
{
    public $becario = [], $sucursales=[], $puestos=[], $user=[];

    public $usuarios, $registros_patronales, 
    $empresas, $empresa, $nombre, $apellido_p, $apellido_m, $password,
    $departamentos, $departamento;

    public function mount()
    {
        $this->usuarios = User::all();
        $this->registros_patronales = RegistroPatronal::all();
        $this->empresas = Empresa::all();
        $this->departamentos = Departamento::all();
    }

    public function updatedEmpresa()
    {
        //dd();
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();

    }

    public function updatedDepartamento()
    {
        // Obtener los puestos del departamento seleccionado
        $this->puestos = Departamento::with('puestos')->where('id', $this->departamento)->get();
    }


    protected $rules = [
        'becario.clave_becario' => 'required',
        'becario.numero_seguridad_social' => 'required',
        'becario.fecha_nacimiento' => 'required',
        'becario.lugar_nacimiento' => 'required',
        'becario.estado' => 'required',
        'becario.codigo_postal' => 'required|digits:5',
        'becario.ocupacion' => 'required',
        'becario.sexo' => 'required',
        'becario.curp' => 'required|size:18',
        'becario.rfc' => 'required|size:13',
        'becario.numero_celular' => 'required|digits:10',
        'becario.fecha_ingreso' => 'required',
        'becario.status' => 'required',
        'becario.calle' => 'required',
        'becario.colonia' => 'required',
        'becario.registro_patronal_id' => 'required|exists:registros_patronales,id',

        'apellido_p' => 'required',
        'apellido_m' => 'required',
        'user.email' => 'required',
        'password' => 'required',
        'empresa' => 'required',
        'user.sucursal_id' => 'required|exists:sucursales,id',
        'departamento' => 'required',
        'user.puesto_id' => 'required|exists:puestos,id',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'becario.*.required' => 'Este campo es obligatorio.',
        'becario.codigo_postal.digits' => 'El código postal debe tener 5 dígitos.',
        'becario.curp.size' => 'La CURP debe tener exactamente 18 caracteres.',
        'becario.rfc.size' => 'El RFC debe tener exactamente 13 caracteres.',
        'becario.numero_celular.digits' => 'El número de celular debe tener 10 dígitos.',
        'becario.registro_patronal_id.exists' => 'El Reg Patronal seleccionado no existe.',

        'nombre.required' => 'Este campo es obligatorio.',
        'apellido_p.required' => 'Este campo es obligatorio.',
        'apellido_m.required' => 'Este campo es obligatorio.',
        'user.email.required' => 'Este campo es obligatorio.',
        'password.required' => 'Este campo es obligatorio.',
        'empresa.required' => 'Este campo es obligatorio.',
        'user.sucursal_id.required' => 'Este campo es obligatorio.',
        'departamento.required' => 'Este campo es obligatorio.',
        'user.puesto_id.required' => 'Este campo es obligatorio.',
        'user.puesto_id.exists' => 'El puesto seleccionado no existe.',
    ];
    
    // Método para guardar el registro patronal
    public function saveBecario()
    {
        $this->validate();
        $this->user['name'] = $this->nombre." ".$this->apellido_p." ".$this->apellido_m;
        $this->user['password'] =  Hash::make($this->password);
        $this->user['empresa_id'] = $this->empresa;
        $this->user['departamento_id'] = $this->empresa;
        $this->user['tipo_user'] = "Becario";

        $guardaUser = new User($this->user);
        $guardaUser -> save();
        $this->becario['user_id'] = $guardaUser->id;


        Becario::create($this->becario);
        $this->becario = [];
        //$this->emit('showAnimatedToast', 'Registro patronal guardado correctamente.');
        return redirect()->route('mostrarbecario'); 
    }


    public function redirigirBecario()
    {
        return redirect()->route('mostrarbecario');
    }

    public function render()
    {
        return view('livewire.portal-rh.becario.agregar-becario')->layout('layouts.client');
    }
}
