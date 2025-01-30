<?php

namespace App\Livewire\Crm\CrmEmpresa\Agregar;

use Livewire\Component;
use App\Models\Crm\CrmEmpresa;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class AgregarEmpresa extends Component
{
    use WithFileUploads;

    public $pruebadeimagen;
    public $empresa = [], $imgagen;
    public $consulta;

    protected  $rules = [
        'empresa.id' => 'required',
        'empresa.nombre' => 'required',
        'empresa.tamano_empresa' => 'required',
        'empresa.pagina_web' => 'required',
        'empresa.logotipo' => 'required',
        'imgagen' => 'required'
    ];

    public function mount()
    {
        $this->consulta = CrmEmpresa::get();
    }

    public function saveEmpresa()
    {
        $this->validate();
        $this->imgagen->storeAs('ImagenCrmEmpresa', "imhf"."-imagen.png", 'subirDocs');
        $this->empresa['logotipo'] = "ArchivoCrmEmpresa/"."imhf"."imagen.png";
    }
    public function render()
    {
        return view('livewire.crm.crm-empresa.agregar.agregar-empresa')->layout('layouts.prueba');
    }
}