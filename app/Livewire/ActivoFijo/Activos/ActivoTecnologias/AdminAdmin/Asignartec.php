<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminAdmin;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Tipoactivo;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Asignartec extends Component
{

    public $empresas, $sucursales;
    public $empresaSeleccionada;
    public $sucursalesFiltradas = [];
    public $sucursal_id; // Agregamos esta propiedad para almacenar la sucursal seleccionada
    public $activosFiltrados = [];
    public $usuariosFiltrados = [];

    public function mount()
    {
        // Obtener todas las empresas
        $this->empresas = Empresa::all();

        // Inicializar empresaSeleccionada con la empresa del usuario autenticado
        $this->empresaSeleccionada = Auth::user()->empresa_id;

        // Cargar sucursales de la empresa del usuario autenticado
        $this->sucursalesFiltradas = Sucursal::join('empresa_sucursal', 'sucursales.id', '=', 'empresa_sucursal.sucursal_id')
            ->where('empresa_sucursal.empresa_id', Auth::user()->empresa_id)
            ->get();
    }

    public function updatedEmpresaSeleccionada($empresaId)
    {
        // Obtén las sucursales relacionadas con la empresa seleccionada
        $empresa = Empresa::find($empresaId);
        if ($empresa) {
            $this->sucursalesFiltradas = $empresa->sucursales;
        } else {
            $this->sucursalesFiltradas = []; // Si no se encuentra la empresa, vacía el listado de sucursales
        }

        // Reiniciar la selección de sucursal
        $this->sucursal_id = null;
        $this->activosFiltrados = [];
        $this->usuariosFiltrados = [];
    }

    public function updatedSucursalId($sucursalId)
    {
        // Obtén los activos de tecnología relacionados con la sucursal seleccionada
        if ($sucursalId) {
            $this->activosFiltrados = ActivoTecnologia::where('sucursal_id', $sucursalId)->get();
            $this->usuariosFiltrados = User::where('sucursal_id',$sucursalId)->get();
        } else {
            $this->activosFiltrados = []; // Si no se selecciona una sucursal, vacía el listado de activos
            $this->usuariosFiltrados = [];
        }
    }

    public function asignarActivo()
    {
        // Validar que se hayan seleccionado un usuario y un activo
        $this->validate([
            'usuarioSeleccionado' => 'required|exists:users,id',
            'activoSeleccionado' => 'required|exists:activos_tecnologias,id',
        ]);

        // Obtener el usuario y el activo seleccionados
        $usuario = User::find($this->usuarioSeleccionado);
        $activo = ActivoTecnologia::find($this->activoSeleccionado);

        // Asignar el activo al usuario
        $usuario->activosTecnologia()->attach($activo->id, [
            'fecha_asignacion' => now(),
            'fecha_devolucion' => null,
            'observaciones' => 'Asignado manualmente',
            'status' => 1,
            'foto1' => '',
            'foto2' => '',
            'foto3' => '',
        ]);

        // Mostrar mensaje de éxito
        session()->flash('message', 'Activo asignado correctamente.');
    }

    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-tecnologias.admin-admin.asignartec')->layout('layouts.navactivos');
    }
}
