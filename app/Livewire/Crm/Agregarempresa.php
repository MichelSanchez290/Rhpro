<?php

namespace App\Livewire\Crm;

use Livewire\Component;
use App\Models\Crm\CrmEmpresa;
use Livewire\WithFileUploads;

class Agregarempresa extends Component
{
    use WithFileUploads;
    public $empresa = [], $subirPortada;
    public $consulta;

    //REGLAS DE VALIDACIÓN
    protected $rules = [
        'empresa.id' => 'required',
        'empresa.nombre' => 'required',
        'empresa.tamano_empresa' => 'required',
        'subirPortada' => 'required',
        // 'empresa.logotipo' => 'required',
        'empresa.pagina_web' => 'required'
    ];

    //MENSAJES DE VALIDACION
    protected $messages = [
        'empresa.id.required' => 'Codigo unico es requerido',
        'empresa.nombre.required' => 'Nombre es requerido',
        'empresa.tamano_empresa.required' => 'Tamaño es requerido',
        'subirPortada.required' => 'Tamaño es requerido',
        // 'empresa.logotipo.required' => 'El logotipo es requerido',
        'empresa.pagina_web.required' => 'La página es requerida'
    ];

    //Inicializar datos o preparar propiedades del controlador a vista,
    //Solo una vez, al cargar la vista.
    public function mount()
    {
        //ejemplo de cunsulta
        $this->consulta = CrmEmpresa::get();
    }

    public function saveempresa()
    {
        $this->validate();
        $this->subirPortada->storeAs('Imagenempresa', $this->empresa['nombre'] . "-imagen.png", 'subirDocs');
        $this->empresa['logotipo'] = "Imagenempresa/" .  $this->empresa['nombre'] . "-imagen.png";

        //declaramos una valiable en donde se almacenara todo el arreglo para agregar el empresa
        $Agregarempresa = new CrmEmpresa($this->empresa);
        $Agregarempresa->save();

        $this->empresa = [];
        $this->subirPortada = NULL;
        $this->emit('showAnimatedToast', 'empresa guardado correctamente');
        return redirect()->route('mostrar');
    }

    public function render()
    {
        return view('livewire.crm.agregar-crm-empresa')->layout('layouts.crm');
    }
}