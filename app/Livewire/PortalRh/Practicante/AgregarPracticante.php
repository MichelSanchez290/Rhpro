<?php

namespace App\Livewire\PortalRh\Practicante;

use Livewire\Component;
use App\Models\PortalRH\Practicante;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgregarPracticante extends Component
{
    public $practicante = [], $sucursales=[], $users=[];
    public $usuarios, $departamentos, $puestos, $registros_patronales, 
    
    $empresas, $empresa, $nombre, $apellido_p, $apellido_m, $password;


    public function mount()
    {
        $this->usuarios = User::all();
        $this->departamentos = Departamento::all();
        $this->puestos = Puesto::all();
        $this->registros_patronales = RegistroPatronal::all();
        $this->empresas = Empresa::all();
        
    }

    public function updatedEmpresa()
    {
        //dd();
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();

    }

    protected $rules = [
        'practicante.clave_practicante' => 'required',
        'practicante.numero_seguridad_social' => 'required',
        'practicante.fecha_nacimiento' => 'required',
        'practicante.lugar_nacimiento' => 'required',
        'practicante.estado' => 'required',
        'practicante.codigo_postal' => 'required|digits:5',
        'practicante.ocupacion' => 'required',
        'practicante.sexo' => 'required',
        'practicante.curp' => 'required|size:18',
        'practicante.rfc' => 'required|size:13',
        'practicante.numero_celular' => 'required|digits:10',

        
        
        'practicante.departamento_id' => 'required|exists:departamentos,id',
        'practicante.puesto_id' => 'required|exists:puestos,id',
        'practicante.registro_patronal_id' => 'required|exists:registros_patronales,id',


        'nombre' => 'required',
        'apellido_p' => 'required',
        'users.email' => 'required',
        'password' => 'required',
        'empresa' => 'required',
        'users.sucursal_id' => 'required',
    ];

    // MENSAJES DE VALIDACIÓN
    protected $messages = [
        'practicante.*.required' => 'Este campo es obligatorio.',
        'practicante.codigo_postal.digits' => 'El código postal debe tener 5 dígitos.',
        'practicante.curp.size' => 'La CURP debe tener exactamente 18 caracteres.',
        'practicante.rfc.size' => 'El RFC debe tener exactamente 13 caracteres.',
        'practicante.numero_celular.digits' => 'El número de celular debe tener 10 dígitos.',
        
        'practicante.departamento_id.exists' => 'El departamento seleccionado no existe.',
        'practicante.puesto_id.exists' => 'El puesto seleccionado no existe.',
        'practicante.registro_patronal_id.exists' => 'El Reg Patronal seleccionado no existe.',
    ];


    // Método para guardar el registro patronal
    public function savePracticante()
    {
        $this->validate();
        $this->users['name'] = $this->nombre." ".$this->apellido_p." ".$this->apellido_m;
        $this->users['password'] =  Hash::make($this->password);
        $this->users['empresa_id'] = $this->empresa;
        $this->users['tipo_user'] = "Practicante";



        $guardaUser = new User($this->users);
        $guardaUser -> save();
        $this->practicante['user_id'] = $guardaUser->id;

        Practicante::create($this->practicante);
        $this->practicante = [];
        //$this->emit('showAnimatedToast', 'Registro patronal guardado correctamente.');
        return redirect()->route('mostrarpracticante'); 
    }

    
    
    public function redirigirPracticante()
    {
        return redirect()->route('mostrarpracticante');
    }

    public function render()
    {
        return view('livewire.portal-rh.practicante.agregar-practicante')->layout('layouts.client');
    }
}
