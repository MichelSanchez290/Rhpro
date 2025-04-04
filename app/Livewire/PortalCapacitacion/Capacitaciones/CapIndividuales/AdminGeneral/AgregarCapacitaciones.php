<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\CapacitacionIndividual;
use App\Models\PortalCapacitacion\Curso;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Models\PortalCapacitacion\ComparacionPuesto;

class AgregarCapacitaciones extends Component
{
    public $fechaIni, $fechaFin, $nombreCapacitacion, $objetivoCapacitacion, $cursos_id = [];
    public $cursos = [];
    public $ocupacion_especifica, $status;
    public $usuario_id; 
    public $competenciaRequerida;

    public function mount($id, $competencia = null)
    {
        // Desencriptar el id recibido
        $this->usuario_id = Crypt::decrypt($id);

        // Buscar la capacitación
        $this->capacitacion = CapacitacionIndividual::find($id);

        if (!$this->capacitacion) {
            session()->flash('error', 'Capacitación no encontrada.');
            
        }

        // Cargar los cursos disponibles
        $this->cursos = Curso::all();

        // Si se pasa una competencia, asignarla al nombre de la capacitación
        if ($competencia) {
            $this->nombreCapacitacion = $competencia;
            $this->competenciaRequerida = $competencia;
        }       
    }

    public function asignarCapacitacion()
    {
        $this->validate([
            'fechaIni' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaIni',
            'nombreCapacitacion' => 'required|string|max:255',
            'objetivoCapacitacion' => 'required|string',
            'cursos_id' => 'required|exists:cursos,id',
            'ocupacion_especifica' => 'required|string|max:255',
            'status' => 'required',
        ]);

        // Crear la capacitación
        $capacitacion = CapacitacionIndividual::create([
            'fechaIni' => $this->fechaIni,
            'fechaFin' => $this->fechaFin,
            'nombreCapacitacion' => $this->nombreCapacitacion,
            'objetivoCapacitacion' => $this->objetivoCapacitacion,
            'cursos_id' => $this->cursos_id, 
            'ocupacion_especifica' => $this->ocupacion_especifica,
            'status' => $this->status,
        ]);

        if (method_exists($capacitacion, 'cursos')) {
            $capacitacion->cursos()->sync($this->cursos_id);
        }

        $capacitacion->usuarios()->attach($this->usuario_id);
        // Limpiar los inputs
        $this->reset(['fechaIni', 'fechaFin', 'nombreCapacitacion', 'objetivoCapacitacion', 'cursos_id', 'ocupacion_especifica', 'status']);

        session()->flash('message', 'Capacitación asignada correctamente.');
        $this->dispatch('capacitacionRegistrada');

        $comparacion = ComparacionPuesto::where('competencias_requeridas', $this->competenciaRequerida)
                                ->where('users_id', $this->usuario_id)
                                ->first();

        if ($comparacion) {
            $comparacion->capacitacion_asignada = 1;
            $comparacion->save();
        }

    }

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.admin-general.agregar-capacitaciones', [
            'cursos' => $this->cursos,
            'competenciaRequerida' => $this->competenciaRequerida,
        ])->layout("layouts.portal_capacitacion");
    }
}
