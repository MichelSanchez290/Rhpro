<?php

namespace App\Livewire\PortalRh\RegistPatronal;

use Livewire\Component;
use App\Models\PortalRH\RegistroPatronal;
use Illuminate\Support\Facades\Crypt;

class EditarRegPatronal extends Component
{
    public $registro_id, $registro_patronal, $rfc, $nombre_o_razon_social, $regimen_capital,
        $regimen_fiscal, $actividad_economica, $imss_calle_manzana, $imms_num_exterior,
        $imms_num_int, $imms_colonia, $imms_codigo_postal, $imms_estado, $imms_municipio,
        $imms_telefono, $imms_convenio_rembolso_subsidios, $imms_tipo_contribucion,
        $area_geografica, $delegacion_imms, $subdelegacion_imms, $prima_año, $prima_mes,
        $porcentaje_prima_rt, $clase_riesgo_trabajo, $acreditacion_stps, $representante_legal,
        $puesto_representante, $cuenta_contable
    ;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $registro = RegistroPatronal::findOrFail($id);
        
        $this->registro_id = $id;
        $this->registro_patronal     = $registro->registro_patronal;
        $this->rfc = $registro->rfc;
        $this->nombre_o_razon_social = $registro->nombre_o_razon_social;
        $this->regimen_capital       = $registro->regimen_capital;
        $this->regimen_fiscal        = $registro->regimen_fiscal;
        $this->actividad_economica   = $registro->actividad_economica;
        $this->imss_calle_manzana    = $registro->imss_calle_manzana;
        $this->imms_num_exterior     = $registro->imms_num_exterior;
        $this->imms_num_int          = $registro->imms_num_int;
        $this->imms_colonia          = $registro->imms_colonia;
        $this->imms_codigo_postal    = $registro->imms_codigo_postal;
        $this->imms_estado           = $registro->imms_estado;
        $this->imms_municipio        = $registro->imms_municipio;
        $this->imms_telefono         = $registro->imms_telefono;
        $this->imms_convenio_rembolso_subsidios = $registro->imms_convenio_rembolso_subsidios;
        $this->imms_tipo_contribucion = $registro->imms_tipo_contribucion;
        $this->area_geografica       = $registro->area_geografica;
        $this->delegacion_imms       = $registro->delegacion_imms;
        $this->subdelegacion_imms    = $registro->subdelegacion_imms;
        $this->prima_año             = $registro->prima_año;
        $this->prima_mes             = $registro->prima_mes;
        $this->porcentaje_prima_rt   = $registro->porcentaje_prima_rt;
        $this->clase_riesgo_trabajo  = $registro->clase_riesgo_trabajo;
        $this->acreditacion_stps     = $registro->acreditacion_stps;
        $this->representante_legal   = $registro->representante_legal;
        $this->puesto_representante  = $registro->puesto_representante;
        $this->cuenta_contable       = $registro->cuenta_contable;
    }

    public function actualizarRegistro()
    {
        $this->validate([
            'registro_patronal' => 'required',
            'rfc' => 'required|size:13',
            'nombre_o_razon_social' => 'required',
            'regimen_capital' => 'required',
            'regimen_fiscal' => 'required',
            'actividad_economica' => 'required',
            'imss_calle_manzana' => 'required',
            'imms_num_exterior' => 'required',
            'imms_num_int' => 'nullable',
            'imms_colonia' => 'required',
            'imms_codigo_postal' => 'required|digits:5',
            'imms_estado' => 'required',
            'imms_municipio' => 'required',
            'imms_telefono' => 'required|digits:10',
            'imms_convenio_rembolso_subsidios' => 'required',
            'imms_tipo_contribucion' => 'required',
            'area_geografica' => 'required',
            'delegacion_imms' => 'required',
            'subdelegacion_imms' => 'required',
            'prima_año' => 'required',
            'prima_mes' => 'required',
            'porcentaje_prima_rt' => 'required',
            'clase_riesgo_trabajo' => 'required',
            'acreditacion_stps' => 'required',
            'representante_legal' => 'required',
            'puesto_representante' => 'required',
            'cuenta_contable' => 'required',
        ]);

        $registro = RegistroPatronal::findOrFail($this->registro_id);
        $registro->update([
            'registro_patronal' => $this->registro_patronal,
            'rfc' => $this->rfc,
            'nombre_o_razon_social' => $this->nombre_o_razon_social,
            'regimen_capital' => $this->regimen_capital,
            'regimen_fiscal' => $this->regimen_fiscal,
            'actividad_economica' => $this->actividad_economica,
            'imss_calle_manzana' => $this->imss_calle_manzana,
            'imms_num_exterior' => $this->imms_num_exterior,
            'imms_num_int' => $this->imms_num_int,
            'imms_colonia' => $this->imms_colonia,
            'imms_codigo_postal' => $this->imms_codigo_postal,
            'imms_estado' => $this->imms_estado,
            'imms_municipio' => $this->imms_municipio,
            'imms_telefono' => $this->imms_telefono,
            'imms_convenio_rembolso_subsidios' => $this->imms_convenio_rembolso_subsidios,
            'imms_tipo_contribucion' => $this->imms_tipo_contribucion,
            'area_geografica' => $this->area_geografica,
            'delegacion_imms' => $this->delegacion_imms,
            'subdelegacion_imms' => $this->subdelegacion_imms,
            'prima_año' => $this->prima_año,
            'prima_mes' => $this->prima_mes,
            'porcentaje_prima_rt' => $this->porcentaje_prima_rt,
            'clase_riesgo_trabajo' => $this->clase_riesgo_trabajo,
            'acreditacion_stps' => $this->acreditacion_stps,
            'representante_legal' => $this->representante_legal,
            'puesto_representante' => $this->puesto_representante,
            'cuenta_contable' => $this->cuenta_contable,
        ]);
    
        session()->flash('message', 'Registro Patronal actualizado');
    }

    public function render()
    {
        return view('livewire.portal-rh.regist-patronal.editar-reg-patronal')->layout('layouts.client');
    }
}
