<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\CapacitacionIndividual;
use App\Models\PortalCapacitacion\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class EditarCapacitaciones extends Component
{
    public $fechaIni, $fechaFin, $nombreCapacitacion, $objetivoCapacitacion, $cursos_id = [];
    public $cursos = [];
    public $ocupacion_especifica, $status;
    public $usuario_id, $capacitacion_id, $userSeleccionado, $user;
    public $capacitacion;

    public function mount($id)
    {
        // Desencriptar el id recibido
        $this->capacitacion_id = Crypt::decrypt($id);

        // Buscar la capacitación y cargar la relación de curso
        $this->capacitacion = CapacitacionIndividual::find($this->capacitacion_id);
        $this->userSeleccionado = Crypt::decrypt($id);
        $this->user = User::find($this->userSeleccionado);

        if (!$this->capacitacion) {
            session()->flash('error', 'Capacitación no encontrada.');
            return redirect()->route('verCapacitacionesInd', ['id' => $this->usuario_id]);
        }
         // Asignar el usuario seleccionado
        $this->userSeleccionado = $this->capacitacion->usuario_id ?? null;

        // Cargar los cursos disponibles
        $this->cursos = Curso::all();

        // Rellenar los campos con los datos de la capacitación a editar
        $this->fechaIni = $this->capacitacion->fechaIni;
        $this->fechaFin = $this->capacitacion->fechaFin;
        $this->nombreCapacitacion = $this->capacitacion->nombreCapacitacion;
        $this->objetivoCapacitacion = $this->capacitacion->objetivoCapacitacion;
        $this->ocupacion_especifica = $this->capacitacion->ocupacion_especifica;
        $this->status = $this->capacitacion->status;

        // Cargar el id del curso relacionado
        $this->cursos_id = $this->capacitacion->curso ? [$this->capacitacion->curso->id] : [];
    }

    public function actualizarCapacitacion()
    {
        $this->validate([
            'fechaIni' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaIni',
            'nombreCapacitacion' => 'required',
            'objetivoCapacitacion' => 'required',
            'ocupacion_especifica' => 'required',
            'status' => 'required',
        ]);

        // Actualizar la capacitación
        $this->capacitacion->update([
            'fechaIni' => $this->fechaIni,
            'fechaFin' => $this->fechaFin,
            'nombreCapacitacion' => $this->nombreCapacitacion,
            'objetivoCapacitacion' => $this->objetivoCapacitacion,
            'ocupacion_especifica' => $this->ocupacion_especifica,
            'status' => $this->status,
        ]);

        // Actualizar la relación de cursos (si es necesario)
        if (method_exists($this->capacitacion, 'cursos')) {
            $this->capacitacion->cursos()->sync($this->cursos_id);
        }

        session()->flash('message', 'Capacitación actualizada correctamente.');

        if (!$this->capacitacion) {
            session()->flash('error', 'Capacitación no encontrada.');
        
            // Asigna usuario_id desde la capacitación antes de redirigir

            
            $usuario_id = $this->capacitacion->usuario_id ?? null;
            dd($usuario_id);
            return redirect()->route('verCapacitacionesInd', ['id' => $capacitacion_id]);
        }
    }

    public function render()
    {
        
        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.admin-general.editar-capacitaciones', [
            'cursos' => $this->cursos,
        ])->layout("layouts.portal_capacitacion");
    }
}
