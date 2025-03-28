<?php

namespace App\Livewire\PortalRh\CambioSalario;

use Livewire\Component;
use App\Models\User;
use App\Models\PortalRH\Instructor;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\CambioSalario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use Livewire\WithFileUploads;
use Illuminate\Support\Str; 

class AgregarCambioSalario extends Component
{
    use WithFileUploads;
    public $salario = [], $sucursales=[], $departamentos=[], $users=[];
    public $empresas, $empresa, $sucursal, $departamento, $user_id, $documento;

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

    public function updatedUserId($userId)
    {
        // Buscar el usuario
        $user = User::find($userId);
        
        if ($user) {
            // Verificar si es instructor
            $instructor = Instructor::where('user_id', $userId)->first();
            if ($instructor) {
                $this->salario['salario_anterior'] = $instructor->honorarios;
                return;
            }
            
            // Si no es instructor, verificar si es trabajador
            $trabajador = Trabajador::where('user_id', $userId)->first();
            if ($trabajador) {
                $this->salario['salario_anterior'] = $trabajador->sueldo;
            }
        }
    }

    

    protected $rules = [
        'salario.fecha_cambio' => 'required|date',
        'salario.salario_anterior' => 'required|numeric',
        'salario.salario_nuevo' => 'required|numeric',
        'salario.motivo' => 'required',
        'salario.observaciones' => 'required',
        'documento' => 'required|file',

        'empresa' => 'required',
        'sucursal' => 'required',
        'departamento' => 'required',
        'user_id' => 'required|exists:users,id',
    ];

    protected $messages = [
        'salario.*.required' => 'Este campo es obligatorio.',
        'salario.salario_anterior.numeric' => 'Ingrese solo números.',
        'salario.salario_nuevo.numeric' => 'Ingrese solo números.',
        'documento.required' => 'Adjunta un archivo en formato PDF.',
        'documento.file' => 'Adjunta un archivo en formato PDF.',

        'empresa.required' => 'Por favor seleccione una empresa.',
        'sucursal.required' => 'Por favor seleccione una sucursal.',
        'departamento.required' => 'Por favor seleccione un departamento.',
        'user_id.required' => 'Este campo es obligatorio.',
        'user_id.exists' => 'El usuario seleccionado no existe.',
    ];

    public function saveSalario()
    {
        $this->validate();

        // Generar nombre único para el archivo unico
        $nombreArchivo = $this->user_id . '_' . time() . '_' . Str::slug($this->salario['motivo']) . '.pdf';

        $this->documento->storeAs('PortalRH/CambioSalario', $nombreArchivo, 'subirDocs');
        $this->salario['documento'] = "PortalRH/CambioSalario/" . $nombreArchivo;

        $nuevoSalario = new CambioSalario($this->salario);
        $nuevoSalario->save();

        // Asociar el usuario seleccionado en la tabla pivote
        $nuevoSalario->users()->attach($this->user_id);

        // Actualizar el salario en las tablas correspondientes
        $instructor = Instructor::where('user_id', $this->user_id)->first();
        $trabajador = Trabajador::where('user_id', $this->user_id)->first();

        if ($instructor) {
            $instructor->update(['honorarios' => $this->salario['salario_nuevo']]);
        } elseif ($trabajador) {
            $trabajador->update(['sueldo' => $this->salario['salario_nuevo']]);
        }

        $this->salario = [];
        $this->documento=NULL;

        session()->flash('message', 'Cambio de Salario Agregado.');
    }

    public function redirigirSalario()
    {
        return redirect()->route('mostrarcambiosal');
    }

    public function render()
    {
        return view('livewire.portal-rh.cambio-salario.agregar-cambio-salario')->layout('layouts.client');
    }
}
