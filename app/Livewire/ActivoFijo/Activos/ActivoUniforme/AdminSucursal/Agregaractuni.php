<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoUniforme\AdminSucursal;

use App\Models\ActivoFijo\Activos\ActivoUniforme;
use App\Models\ActivoFijo\Tipoactivo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Agregaractuni extends Component
{
    use WithFileUploads;
    public $consulta;
    public $activo=[],$tipos=[];
    public $subirfoto1,$subirfoto2,$subirfoto3;

    protected $rules = [
        'activo.descripcion'=>'required',
        'activo.talla'=>'required',
        'activo.cantidad'=>'required',
        'activo.estado'=>'required',
        'activo.disponible'=>'required',
        'activo.fecha_adquisicion' => 'required',
        'activo.observaciones'=>'required',
        'activo.tipo_activo_id'=>'required',
        'activo.color'=>'required',

    ];

    protected $messages = [
        'activo.descripcion.required' => 'Descripcion es requerido',
        'activo.talla.required' => 'Numero activo es requerido',
        'activo.cantidad.required' => 'Ubicacion es requerido',
        'activo.estado.required' => 'Fecha es requerido',
        'activo.disponible.required' => 'Tipo es requerido',
        'activo.fecha_adquisicion.required' => 'Precio es requerido',
        'activo.observaciones.required' => 'Año es requerido',
        'activo.tipo_activo_id.required' => 'Año es requerido',
        'activo.color.required' => 'Año es requerido',
    ];

    public function mount()
    {
        //ejemplo de consulta
        $this->consulta = ActivoUniforme::get();
        $this->activo['tipo_activo_id'] = Tipoactivo::where('nombre_activo', 'Activo Uniformes')->value('id');
        //dd($this->activo['tipo_activo_id']);
    }

    public function saveActivoUni()
    {
        $this->validate([
            'subirfoto1' => 'required|image|max:2048',
            'subirfoto2' => 'nullable|image|max:2048',
            'subirfoto3' => 'nullable|image|max:2048',
        ]);

        $this->activo['empresa_id'] = Auth::user()->empresa_id;
        $this->activo['sucursal_id'] = Auth::user()->sucursal_id;

        $this->subirfoto1->storeAs('ImagenUniforme1',$this->activo['descripcion']."-imagen.png",'subirDocs');
        $this->activo['foto1']="ImagenUniforme1/".$this->activo['descripcion']."-imagen.png";

        $this->subirfoto2->storeAs('ImagenUniforme2',$this->activo['descripcion']."-imagen.png",'subirDocs');
        $this->activo['foto2']="ImagenUniforme2/".$this->activo['descripcion']."-imagen.png";

        $this->subirfoto3->storeAs('ImagenUniforme3',$this->activo['descripcion']."-imagen.png",'subirDocs');
        $this->activo['foto3']="ImagenUniforme3/".$this->activo['descripcion']."-imagen.png";
        // Crear una nueva instancia de Sale y asignar los valores
        $AgregarActivo = new ActivoUniforme($this->activo);
        $AgregarActivo->save();
    
        // Limpiar los datos de la venta después de guardar
        $this->activo = [];
        $this->subirfoto1=NULL ;
        $this->subirfoto2=NULL ;
        $this->subirfoto3=NULL ;
        
        return redirect()->route('mostraractuni');
    }
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-uniforme.admin-sucursal.agregaractuni')->layout('layouts.navactivos');
    }
}
