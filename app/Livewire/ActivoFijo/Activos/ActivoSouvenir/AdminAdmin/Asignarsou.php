<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoSouvenir\AdminAdmin;

use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class Asignarsou extends Component
{
    use WithFileUploads;
    public $empresas, $sucursales;
    public $empresaSeleccionada;
    public $sucursalesFiltradas = [];
    public $sucursal_id; // Agregamos esta propiedad para almacenar la sucursal seleccionada
    public $activosFiltrados = [];
    public $usuariosFiltrados = [];
    public $usuarioSeleccionado; // Añadido
    public $activoSeleccionado;
    public $observaciones;

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
            $this->activosFiltrados = ActivoSouvenir::where('sucursal_id', $sucursalId)->get();
            $this->usuariosFiltrados = User::where('sucursal_id', $sucursalId)->get();
        } else {
            $this->activosFiltrados = []; // Si no se selecciona una sucursal, vacía el listado de activos
            $this->usuariosFiltrados = [];
        }
    }

    public function asignarActivo()
    {
        $this->validate([
            'usuarioSeleccionado' => 'required|exists:users,id',
            'activoSeleccionado' => 'required|exists:activos_souvenirs,id',
            'observaciones' => 'required|string',
        ]);
    
        $usuario = User::find($this->usuarioSeleccionado);
        $activo = ActivoSouvenir::find($this->activoSeleccionado);
    
        // Definir la ruta base para las imágenes
        $rutaBase = 'ActivoFijo/Activos/ActivoSouvenir/Asignaciones/Admin';
        $nombreActivo = $activo->nombre ?? 'activo_' . $activo->id; // Usar el nombre del activo o su ID si no hay nombre
    
        // Asignar el activo al usuario con las rutas de las imágenes
        $usuario->activosSouvenir()->attach($activo->id, [
            'fecha_asignacion' => now(),
            'fecha_devolucion' => null,
            'observaciones' => $this->observaciones,
            'status' => 1,
        ]);

        $activo->update([
            'status' => 'Asignado',
            'updated_at' => now(),
        ]);
    
        // Resetear campos después de la asignación
        $this->reset([
            'usuarioSeleccionado',
            'activoSeleccionado',
            'observaciones',
        ]);
    
        session()->flash('success', '¡Activo asignado exitosamente!');

        // Redirigir con mensaje de éxito
        return redirect()->route('mostrarasignsouad');
    }
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-souvenir.admin-admin.asignarsou')->layout('layouts.navactivos');
    }
}
