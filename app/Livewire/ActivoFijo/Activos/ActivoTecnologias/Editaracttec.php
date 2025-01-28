<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoTecnologias;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Anioestimado;
use App\Models\ActivoFijo\Tipoactivo;
use Livewire\Component;

class Editaracttec extends Component
{
    public $activotec_id,$nombre,$descripcion,$numser,$numact,$ubicacion,$fechaad,$fechaba,$tipo,$precioad,$anio;
    public $tipos,$anios;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'numser' => 'required',
        'numact' => 'required',
        'ubicacion' => 'required',
        'fechaad' => 'required',
        'fechaba' => 'required',
        'tipo' => 'required|exists:tipo_activos,id',
        'precioad' => 'required',
        'anio'=> 'required|exists:aniosestimados,id',
    ];
    public function mount($id)
    {
        $item = ActivoTecnologia::findOrFail($id);
        $this->activotec_id= $id;
        $this->nombre = $item->nombre;
        $this->descripcion= $item->descripcion;
        $this->numser=$item->num_serie;
        $this->numact=$item->num_activo;
        $this->ubicacion=$item->ubicacion_fisica;
        $this->fechaad=$item->fecha_adquisicion;
        $this->fechaba=$item->fecha_baja;
        $this->tipo=$item->tipo_activo_id;
        $this->precioad=$item->precio_adquisicion;
        $this->anio=$item->aniosestimado_id;

        $this->tipos = Tipoactivo::all()->pluck('nombre_activo', 'id');
        $this->anios = Anioestimado::all()->pluck('vida_util_año', 'id');
    }

    public function editar()
    {
        $this->validate(); 

        // Actualizar la venta con los nuevos datos
        $activotec = ActivoTecnologia::findOrFail($this->activotec_id); 
        $activotec->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'num_serie' => $this->numser,
            'num_activo' => $this->numact,
            'ubicacion_fisica' => $this->ubicacion,
            'fecha_adquisicion' => $this->fechaad,
            'fecha_baja' => $this->fechaba,
            'tipo_activo_id' => $this->tipo,
            'precio_adquisicion' => $this->precioad,
            'aniosestimado_id' => $this->anio,
        ]);
        
        return redirect()->route('mostraracttec');
    }


    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-tecnologias.editaracttec')->layout('layouts.navactivos');
    }
}
