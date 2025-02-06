<?php
namespace App\Livewire\PortalCapacitacion\AsociarPuestoTrabajador;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\PortalCapacitacion\PerfilPuesto;

class AsignarPerfilPuesto extends Component
{
    public $usuario;
    public $perfiles;
    public $perfilSeleccionado;
    public $status; // 👈 Agregar esta propiedad
    public $fecha_inicio;
    public $fecha_final;
    public $motivo_cambio;

    public function mount($id)
    {
        $id = Crypt::decrypt($id); // Desencripta el ID
        $this->usuario = User::find($id); // Busca al usuario

        if (!$this->usuario) {
            abort(404, 'Usuario no encontrado.'); // Manejo de error si el usuario no existe
        }

        $this->perfiles = PerfilPuesto::all(); // Obtener los perfiles de puestos
    }

    public function asignarPerfil()
    {
        $this->validate([
            'perfilSeleccionado' => 'required',
            'status' => 'required|string|in:pendiente,aprobado,fallido',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'motivo_cambio' => 'required|string',
        ]);
    
        AsignacionPerfil::create([
            'usuario_id' => auth()->id(), // O el usuario que estás asignando
            'perfil_id' => json_encode($this->perfilSeleccionado),
            'status' => $this->status, // 👈 Aquí aseguramos que el status se envíe correctamente
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'motivo_cambio' => $this->motivo_cambio,
        ]);
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.asociar-puesto-trabajador.asignar-perfil-puesto')
            ->layout("layouts.portal_capacitacion");
    }
}

