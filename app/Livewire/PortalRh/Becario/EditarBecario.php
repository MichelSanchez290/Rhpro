<?php

namespace App\Livewire\PortalRh\Becario;

use Livewire\Component;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class EditarBecario extends Component
{
    public $becario_id, 
        $clave_becario, 
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
        $fecha_ingreso, 
        $status, 
        $calle, 
        $colonia,
        
        $user_id,
        $departamento_id,
        $puesto_id,
        $registro_patronal_id
    ;
    

    public $usuarios, $departamentos, $puestos, $registros_patronales;


    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $becario = Becario::findOrFail($id);
        
        $this->becario_id = $id;
        $this->clave_becario = $becario->clave_becario;
        $this->numero_seguridad_social = $becario->numero_seguridad_social;
        $this->fecha_nacimiento = $becario->fecha_nacimiento;
        $this->lugar_nacimiento = $becario->lugar_nacimiento;
        $this->estado = $becario->estado;
        $this->codigo_postal = $becario->codigo_postal;
        $this->ocupacion = $becario->ocupacion;
        $this->sexo = $becario->sexo;
        $this->curp = $becario->curp;
        $this->rfc = $becario->rfc;
        $this->numero_celular = $becario->numero_celular;
        $this->fecha_ingreso = $becario->fecha_ingreso;
        $this->status = $becario->status;
        $this->calle = $becario->calle;
        $this->colonia = $becario->colonia;

        $this->user_id = $becario->user_id;
        $this->departamento_id = $becario->departamento_id;
        $this->puesto_id = $becario->puesto_id;
        $this->registro_patronal_id = $becario->registro_patronal_id;

        $this->usuarios = User::all();
        $this->departamentos = Departamento::all();
        $this->puestos = Puesto::all();
        $this->registros_patronales = RegistroPatronal::all();
    }

    public function actualizarBecario()
    {
        $this->validate([
            'clave_becario' => 'required',
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
            'fecha_ingreso' => 'required',
            'status' => 'required',
            'calle' => 'required',
            'colonia' => 'required',

            'user_id' => 'required|exists:users,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'puesto_id' => 'required|exists:puestos,id',
            'registro_patronal_id' => 'required|exists:registros_patronales,id',
        ]);

        Becario::updateOrCreate(['id' => $this->becario_id], [
            'clave_becario' => $this->clave_becario,
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
            'fecha_ingreso' => $this->fecha_ingreso,
            'status' => $this->status,
            'calle' => $this->calle,
            'colonia' => $this->colonia,
            
            'user_id' => $this->user_id,
            'departamento_id' => $this->departamento_id,
            'puesto_id' => $this->puesto_id,
            'registro_patronal_id' => $this->registro_patronal_id,
        ]);

        //$this->dispatch('toastr-success', message: 'Becario actualizado correctamente.');
        //$this->emit('message', 'Becario actualizado correctamente.');
        return redirect()->route('mostrarbecario');
    }

    public function render()
    {
        return view('livewire.portal-rh.becario.editar-becario')->layout('layouts.client');
    }
}
