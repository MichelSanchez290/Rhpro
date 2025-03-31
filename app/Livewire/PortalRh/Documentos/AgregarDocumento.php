<?php

namespace App\Livewire\PortalRh\Documentos;

use Livewire\Component;
use App\Models\PortalRH\Documento;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AgregarDocumento extends Component
{
    use WithFileUploads;
    public $documento = [], $archivo;

    protected $rules = [
        'archivo' => 'required|file',
        'documento.fecha_subida' => 'required|date',
        'documento.status' => 'required', 
        'documento.numero' => 'required',
        'documento.original' => 'required',
        'documento.comentarios' => 'required',
        'documento.tipo_documento' => 'required',
    ];

    protected $messages = [
        'documento.*.required' => 'Este campo es obligatorio.',
        'documento.numero.numeric' => 'Ingrese solo números',
        'archivo.required' => 'El archivo es requerido, solo formato PDF.',
        'archivo.file' => 'Adjunta un archivo en formato PDF.',
    ];

    public function saveDoc()
    {
        //dd();
        $this->validate();
        
        // Generar nombre único para el archivo
        $nombreArchivo = Auth::id() . '_' . time() . '_' . $this->documento['tipo_documento'] . '.pdf';
        
        // Guardar el documento
        $this->archivo->storeAs('PortalRH/Documentos', $nombreArchivo, 'subirDocs');
        $this->documento['archivo'] = "PortalRH/Documentos/" . $nombreArchivo;

        // Crear incidencia con status 'Pendiente'
        $nuevoDoc = new Documento($this->documento);
        $nuevoDoc->save();

        $this->documento = [];
        $this->archivo=NULL;

        // Asociar el usuario en la tabla pivote
        $nuevoDoc->users()->attach(Auth::id());

        session()->flash('message', 'Documento Agregado.');
    }

    public function redirigirDoc()
    {
        return redirect()->route('mostrardoc');
    }

    public function render()
    {
        return view('livewire.portal-rh.documentos.agregar-documento')->layout('layouts.client');
    }
}
