<?php

namespace App\Livewire\PortalRh\Bajas;

use Livewire\Component;
use App\Models\PortalRH\Baja;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AgregarBaja extends Component
{
    use WithFileUploads;
    public $baja = [], $sucursales=[], $departamentos=[], $users=[];
    public $empresas, $empresa, $sucursal, $departamento, $user_id, $pdfdocumento;

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
        'baja.fecha_baja' => 'required|date',
        'baja.motivo_baja' => 'required',
        'baja.tipo_baja' => 'required',
        'pdfdocumento' => 'required|file',
        'baja.observaciones' => 'nullable',

        'empresa' => 'required',
        'sucursal' => 'required',
        'departamento' => 'required',
        'user_id' => 'required|exists:users,id',
    ];

    protected $messages = [
        'baja.*.required' => 'Este campo es obligatorio.',
        'pdfdocumento.required' => 'El documento es requerido, solo formato PDF.',
        'pdfdocumento.file' => 'Adjunta un archivo en formato PDF.',

        'empresa.required' => 'Por favor seleccione una empresa.',
        'sucursal.required' => 'Por favor seleccione una sucursal.',
        'departamento.required' => 'Por favor seleccione un departamento.',
        'user_id.required' => 'Este campo es obligatorio.',
        'user_id.exists' => 'El usuario seleccionado no existe.',
    ];

    public function saveBaja()
    {

        $this->validate();
        
        // Generar nombre único para el archivo
        $nombreArchivo = $this->user_id . '_' . time() . '_' . Str::slug($this->baja['tipo_baja']) . '.pdf';
        
        // Guardar el documento
        $this->pdfdocumento->storeAs('PortalRH/Bajas', $nombreArchivo, 'subirDocs');
        $this->baja['documento'] = "PortalRH/Bajas/" . $nombreArchivo;

        $nuevaBaja = new Baja($this->baja);
        $nuevaBaja->user_id = $this->user_id;
        $nuevaBaja->save();

        $this->baja = [];
        $this->user_id = null;
        $this->pdfdocumento=NULL;
        
        session()->flash('message', 'Baja Agregada.');
    }

    public function redirigirBaja()
    {
        return redirect()->route('mostrarbaja');
    }

    public function render()
    {
        return view('livewire.portal-rh.bajas.agregar-baja')->layout('layouts.client');
    }
}
