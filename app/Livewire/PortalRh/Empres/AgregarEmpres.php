<?php

namespace App\Livewire\PortalRh\Empres;

use Livewire\Component;
use App\Models\PortalRH\Empresa;
use Livewire\WithFileUploads;

class AgregarEmpres extends Component
{
    use WithFileUploads;
    public $empresa = [], $pdfConstancia, $subirLogo; //almacenar 

    // Reglas de validación
    protected $rules = [
        'empresa.nombre' => 'required',
        'empresa.razon_social' => 'required',
        'empresa.rfc' => 'required|min:12|max:13|unique:empresas,rfc',
        'empresa.nombre_comercial' => 'required',
        'empresa.pais_origen' => 'required',
        'empresa.representante_legal' => 'required',
        'subirLogo' => 'required|image|mimes:png,jpg,jpeg|max:2048', // 2MB máximo
        'pdfConstancia' => 'required|file|mimes:pdf|max:5120', // 5MB máximo
    ];

    protected $messages = [
        'empresa.nombre.required' => 'El nombre es obligatorio.',
        'empresa.razon_social.required' => 'La razón social es obligatoria.',
        'empresa.rfc.required' => 'El RFC es obligatorio.',
        'empresa.rfc.min' => 'El RFC debe tener al menos 12 caracteres.',
        'empresa.rfc.max' => 'El RFC no debe exceder los 13 caracteres.',
        'empresa.rfc.unique' => 'Este RFC ya esta asignada a otra empresa.',
        'empresa.nombre_comercial.required' => 'El nombre comercial es obligatorio.',
        'empresa.pais_origen.required' => 'El país de origen es obligatorio.',
        'empresa.representante_legal.required' => 'El representante legal es obligatorio.',

        'pdfConstancia.required' => 'El archivo es requerido, solo formato PDF.',
        'subirLogo.required' => 'El logo es requerido, por favor cargue una imagen',
        'subirLogo.image' => 'El archivo debe ser una imagen válida',
        'subirLogo.mimes' => 'El logo debe ser en formato PNG, JPG o JPEG',
        'subirLogo.max' => 'La imagen del logo no debe pesar más de 2MB',
        'pdfConstancia.mimes' => 'El archivo debe ser un PDF válido',
        'pdfConstancia.max' => 'El PDF no debe pesar más de 5MB',
    ];
    

    public function saveEmpres()
    {

        $this->validate();
        $this->pdfConstancia->storeAs('PortalRH/Empresas', $this->empresa['nombre'].".pdf", 'subirDocs');
        $this->empresa['url_constancia_situacion_fiscal'] = "PortalRH/Empresas/" . $this->empresa['nombre'] .".pdf";

        $this->subirLogo->storeAs('PortalRH/EmpresaLogos', $this->empresa['nombre']."-logo.png", 'subirDocs');
        $this->empresa['logo'] = "PortalRH/EmpresaLogos/" . $this->empresa['nombre'] ."-logo.png";

        $nuevaEmpresa = new Empresa($this->empresa);
        $nuevaEmpresa->save();

        $this->empresa = [];
        $this->pdfConstancia=NULL;
        $this->subirLogo=NULL;

        session()->flash('message', 'Empresa Agregada.');
    }

    public function redirigir()
    {
        return redirect()->route('mostrarempresas');
    }

    public function render()
    {
        return view('livewire.portal-rh.empres.agregar-empres')->layout('layouts.client');
    }
}
