<?php

namespace App\Livewire\PortalRh\Trabajador;

use Livewire\Component;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\Puesto;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class EditarTrabajador extends Component
{
    public $trabajador_id, 
        $clave_trabajador, 
        $numero_seguridad_social, 
        $fecha_nacimiento, 
        $lugar_nacimiento, 
        $estado, 
        $codigo_postal, 
        $sexo, 
        $curp, 
        $rfc, 
        $numero_celular, 
        $fecha_ingreso, 
        $edad, 
        $estado_civil, 
        $estudios, 
        $ocupacion, 
        $tipo_puest, 
        $contratacion, 
        $tipo_personal, 
        $jornada_trabajo, 
        $rotacion, 
        $experiencia, 
        $tiempo_puesto, 
        $calle, 
        $colonia, 
        $numero, 
        $status, 
        $user_id,
        $departamento_id,
        $puesto_id,
        $registro_patronal_id
    ;
    

    public $usuarios, $departamentos, $puestos, $registros_patronales;


    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $trabajador = Trabajador::findOrFail($id);
        
        $this->trabajador_id = $id;
        $this->clave_trabajador = $trabajador->clave_trabajador;
        $this->numero_seguridad_social = $trabajador->numero_seguridad_social;
        $this->fecha_nacimiento = $trabajador->fecha_nacimiento;
        $this->lugar_nacimiento = $trabajador->lugar_nacimiento;
        $this->estado = $trabajador->estado;
        $this->codigo_postal = $trabajador->codigo_postal;
        $this->sexo = $trabajador->sexo;
        $this->curp = $trabajador->curp;
        $this->rfc = $trabajador->rfc;
        $this->numero_celular = $trabajador->numero_celular;
        $this->fecha_ingreso = $trabajador->fecha_ingreso;
        $this->edad = $trabajador->edad;
        $this->estado_civil = $trabajador->estado_civil;
        $this->estudios = $trabajador->estudios;
        $this->ocupacion = $trabajador->ocupacion;
        $this->tipo_puest = $trabajador->tipo_puest;
        $this->contratacion = $trabajador->contratacion;
        $this->tipo_personal = $trabajador->tipo_personal;
        $this->jornada_trabajo = $trabajador->jornada_trabajo;
        $this->rotacion = $trabajador->rotacion;
        $this->experiencia = $trabajador->experiencia;
        $this->tiempo_puesto = $trabajador->tiempo_puesto;
        $this->calle = $trabajador->calle;
        $this->colonia = $trabajador->colonia;
        $this->numero = $trabajador->numero;
        $this->status = $trabajador->status;

        $this->user_id = $trabajador->user_id;
        $this->departamento_id = $trabajador->departamento_id;
        $this->puesto_id = $trabajador->puesto_id;
        $this->registro_patronal_id = $trabajador->registro_patronal_id;

        $this->usuarios = User::all();
        $this->departamentos = Departamento::all();
        $this->puestos = Puesto::all();
        $this->registros_patronales = RegistroPatronal::all();
    }

    public function actualizarTrabajador()
    {
        $this->validate([
            'clave_trabajador' => 'required',
            'numero_seguridad_social' => 'required',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'estado' => 'required',
            'codigo_postal' => 'required|digits:5',
            'sexo' => 'required',
            'curp' => 'required|size:18',
            'rfc' => 'nullable|size:13',
            'numero_celular' => 'required|digits:10',
            'fecha_ingreso' => 'required',
            'edad' => 'required',
            'estado_civil' => 'required',
            'estudios' => 'required',
            'ocupacion' => 'required',
            'tipo_puest' => 'required',
            'contratacion' => 'required',
            'tipo_personal' => 'required',
            'jornada_trabajo' => 'required',
            'rotacion' => 'required',
            'experiencia' => 'required',
            'tiempo_puesto' => 'required',
            'calle' => 'required',
            'colonia' => 'required',
            'numero' => 'required',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'puesto_id' => 'required|exists:puestos,id',
            'registro_patronal_id' => 'required|exists:registros_patronales,id',
        ]);

        Trabajador::updateOrCreate(['id' => $this->trabajador_id], [
            'clave_trabajador' => $this->clave_trabajador,
            'numero_seguridad_social' => $this->numero_seguridad_social,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'lugar_nacimiento' => $this->lugar_nacimiento,
            'estado' => $this->estado,
            'codigo_postal' => $this->codigo_postal,
            'sexo' => $this->sexo,
            'curp' => $this->curp,
            'rfc' => $this->rfc,
            'numero_celular' => $this->numero_celular,
            'fecha_ingreso' => $this->fecha_ingreso,
            'edad' => $this->edad,
            'estado_civil' => $this->estado_civil,
            'estudios' => $this->estudios,
            'ocupacion' => $this->ocupacion,
            'tipo_puest' => $this->tipo_puest,
            'contratacion' => $this->contratacion,
            'tipo_personal' => $this->tipo_personal,
            'jornada_trabajo' => $this->jornada_trabajo,
            'rotacion' => $this->rotacion,
            'experiencia' => $this->experiencia,
            'tiempo_puesto' => $this->tiempo_puesto,
            'calle' => $this->calle,
            'colonia' => $this->colonia,
            'numero' => $this->numero,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'departamento_id' => $this->departamento_id,
            'puesto_id' => $this->puesto_id,
            'registro_patronal_id' => $this->registro_patronal_id,
        ]);

        return redirect()->route('mostrartrabajador')->with('message', 'Trabajador actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.portal-rh.trabajador.editar-trabajador')->layout('layouts.client');
    }
}
