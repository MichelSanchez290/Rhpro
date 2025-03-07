<?php

namespace App\Livewire\PortalRh\Practicante;

use Livewire\Component;
use App\Models\PortalRH\Practicante;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class EditarPracticante extends Component
{
    public $practicante_id, 
        $clave_practicante, 
        $numero_seguridad_social, 
        $fecha_nacimiento, 
        $lugar_nacimiento, 
        $estado, 
        $codigo_postal, 
        $ocupacion,
        $sexo, 
        $curp, 
        $rfc, 
        $numero_celular, 
        
        $user_id,
        $departamento_id,
        $puesto_id,
        $registro_patronal_id
    ;
    

    public $usuarios, $departamentos, $puestos, $registros_patronales;


    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $practicante = Practicante::findOrFail($id);
        
        $this->practicante_id = $id;
        $this->clave_practicante = $practicante->clave_practicante;
        $this->numero_seguridad_social = $practicante->numero_seguridad_social;
        $this->fecha_nacimiento = $practicante->fecha_nacimiento;
        $this->lugar_nacimiento = $practicante->lugar_nacimiento;
        $this->estado = $practicante->estado;
        $this->codigo_postal = $practicante->codigo_postal;
        $this->ocupacion = $practicante->ocupacion;
        $this->sexo = $practicante->sexo;
        $this->curp = $practicante->curp;
        $this->rfc = $practicante->rfc;
        $this->numero_celular = $practicante->numero_celular;

        $this->user_id = $practicante->user_id;
        $this->departamento_id = $practicante->departamento_id;
        $this->puesto_id = $practicante->puesto_id;
        $this->registro_patronal_id = $practicante->registro_patronal_id;

        $this->usuarios = User::all();
        $this->departamentos = Departamento::all();
        $this->puestos = Puesto::all();
        $this->registros_patronales = RegistroPatronal::all();
    }

    public function actualizarPracticante()
    {
        $this->validate([
            'clave_practicante' => 'required',
            'numero_seguridad_social' => 'required',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'estado' => 'required',
            'codigo_postal' => 'required|digits:5',
            'ocupacion' => 'required',
            'sexo' => 'required',
            'curp' => 'required|size:18',
            'rfc' => 'required|size:13',
            'numero_celular' => 'required|digits:10',

            'user_id' => 'required|exists:users,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'puesto_id' => 'required|exists:puestos,id',
            'registro_patronal_id' => 'required|exists:registros_patronales,id',

            
        ]);

        Practicante::updateOrCreate(['id' => $this->practicante_id], [
            'clave_practicante' => $this->clave_practicante,
            'numero_seguridad_social' => $this->numero_seguridad_social,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'lugar_nacimiento' => $this->lugar_nacimiento,
            'estado' => $this->estado,
            'codigo_postal' => $this->codigo_postal,
            'ocupacion' => $this->sexo,
            'sexo' => $this->sexo,
            'curp' => $this->curp,
            'rfc' => $this->rfc,
            'numero_celular' => $this->numero_celular,
            
            'user_id' => $this->user_id,
            'departamento_id' => $this->departamento_id,
            'puesto_id' => $this->puesto_id,
            'registro_patronal_id' => $this->registro_patronal_id,
        ]);

        //$this->dispatch('toastr-success', message: 'Becario actualizado correctamente.');
        //$this->emit('message', 'Becario actualizado correctamente.');
        return redirect()->route('mostrarpracticante');
    }

    public function render()
    {
        return view('livewire.portal-rh.practicante.editar-practicante')->layout('layouts.client');
    }
}
