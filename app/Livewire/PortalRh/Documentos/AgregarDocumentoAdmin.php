<?php

namespace App\Livewire\PortalRh\Documentos;

use Livewire\Component;
use App\Models\PortalRH\Documento;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AgregarDocumentoAdmin extends Component
{
    use WithFileUploads;
    public $documento = [], $sucursales=[], $departamentos=[], $users=[];
    public $empresas, $empresa, $sucursal, $departamento, $user_id, $archivo;

    public function mount()
    {
        $this->empresas = Empresa::all();
    }

    public function updatedEmpresa()
    {
        $this->sucursales = Empresa::with('sucursales')->where('id', $this->empresa)->get();
    }

    public function updatedSucursal()
    {
        $this->departamentos = Sucursal::with('departamentos')->where('id', $this->sucursal)->get();
    }

    public function updatedDepartamento()
    {
        // Obtener los users del departamento seleccionado
        $this->users = Departamento::with('users')->where('id', $this->departamento)->get();
    }

    protected $rules = [
        'archivo' => 'required|file',
        'documento.fecha_subida' => 'required|date',
        'documento.status' => 'required', 
        'documento.numero' => 'required',
        'documento.original' => 'required',
        'documento.comentarios' => 'required',
        'documento.tipo_documento' => 'required',

        'empresa' => 'required',
        'sucursal' => 'required',
        'departamento' => 'required',
        'user_id' => 'required|exists:users,id',
    ];

    protected $messages = [
        'documento.*.required' => 'Este campo es obligatorio.',
        'documento.numero.numeric' => 'Ingrese solo números',
        'archivo.required' => 'El archivo es requerido, solo formato PDF.',
        'archivo.file' => 'Adjunta un archivo en formato PDF.',

        'empresa.required' => 'Por favor seleccione una empresa.',
        'sucursal.required' => 'Por favor seleccione una sucursal.',
        'departamento.required' => 'Por favor seleccione un departamento.',
        'user_id.required' => 'Este campo es obligatorio.',
        'user_id.exists' => 'El usuario seleccionado no existe.',
    ];

    public function saveDoc()
    {
        //dd();
        $this->validate();

        // Generar nombre único para el archivo
        $nombreArchivo = $this->user_id . '_' . time() . '_' . $this->documento['tipo_documento'] . '.pdf';
        
        // Guardar el documento
        $this->archivo->storeAs('PortalRH/Documentos', $nombreArchivo, 'subirDocs');
        $this->documento['archivo'] = "PortalRH/Documentos/" . $nombreArchivo;

        // Crear incidencia con status 'Pendiente'
        $nuevoDoc = new Documento($this->documento);
        $nuevoDoc->save();

        $this->documento = [];
        $this->archivo=NULL;

        // Asociar el usuario en la tabla pivote
        $nuevoDoc->users()->attach($this->user_id);

        session()->flash('message', 'Documento Agregado.');
    }

    public function redirigirDoc()
    {
        return redirect()->route('mostrardoc');
    }

    public function render()
    {
        return view('livewire.portal-rh.documentos.agregar-documento-admin')->layout('layouts.client');
    }
}
