<?php

namespace App\Livewire\Crm\CrmEmpresa\Agregar;

use Livewire\Component;
use App\Models\Crm\CrmEmpresa;
use Livewire\WithFileUploads;

class AgregarEmpresa extends Component
{
    use WithFileUploads;

    public $pruebadeimagen;
    public $empresa = [], $imgagen;
    public $consulta;

    protected  $rules = [
        'empresa.nombre' => 'required',
        'empresa.tamano_empresa' => 'required',
        'empresa.pagina_web' => 'required',
        'imgagen' => 'required'
    ];

    protected $messages = [
        'empresa.nombre.required' => 'nombre requerido',
        'empresa.tamano_empresa.required' => 'empresa requerido',
        'empresa.pagina_web.required' => 'pagina web requerida',
        'imgagen.required' => 'logotipo requerido',
    ];

    public function mount()
    {
        $this->consulta = CrmEmpresa::get();
    }

    public function saveEmpresa()
    {
        $this->validate();
        $this->imgagen->storeAs('ImagenCrmEmpresa', $this->empresa['nombre']."-imagen.png", 'subirDocs');
        $this->empresa['logotipo'] = "ArchivoCrmEmpresa".$this->empresa['nombre']."imagen.png";

        $AgregarEmpresa = new CrmEmpresa($this->empresa);
        $AgregarEmpresa->save();

        $this->empresa=[];
        $this->imgagen=NULL;
        // $this->emit('showAnimatedToast', 'Producto guardado correctamente');
        // return redirect()->route('Inicio');
    }
    public function render()
    {
        return view('livewire.crm.crm-empresa.agregar.agregar-empresa')->layout('layouts.prueba');
    }
}