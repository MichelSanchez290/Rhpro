<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\AdminTrabajador;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PortalCapacitacion\Evidencia;
use App\Models\PortalCapacitacion\CapacitacionIndividual; // Asegúrate de importar el modelo CapsIndividual
use Illuminate\Support\Facades\Crypt;

class AgregarEvidenciasTrabajador extends Component
{
    use WithFileUploads; // Habilitar la carga de archivos

    public $evidencias; // Para la imagen
    public $comentarios;
    public $status;
    public $fecha;    
    public $caps_individuales_id; // ID de la capacitación individual

    public function mount($id)
    {
        // Desencriptar el ID de la capacitación individual
        $this->caps_individuales_id = Crypt::decrypt($id);
    }

    public function save()
    {
        // Validar los datos
        $this->validate([
            'evidencias' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
            'comentarios' => 'nullable|string|max:500',
            'status' => 'required|string',
            'fecha' => 'required|date',
        ]);

        // Guardar la imagen en el almacenamiento
        $imagePath = $this->evidencias->store('evidencias', 'public');

        // Crear una nueva evidencia en la base de datos
        $evidencia = Evidencia::create([
            'evidencias' => $imagePath,
            'comentarios' => $this->comentarios,
            'status' => $this->status,
            'fecha' => $this->fecha,
        ]);

        // Guardar la relación en la tabla pivote
        $capsIndividual = CapacitacionIndividual::find($this->caps_individuales_id);
        if ($capsIndividual) {
            $capsIndividual->evidencias()->attach($evidencia->id);
        }

        // Mensaje de éxito
        session()->flash('message', 'Evidencia agregada exitosamente.');

        // Limpiar los campos
        $this->reset();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.admin-trabajador.agregar-evidencias')
            ->layout("layouts.portal_capacitacion");
    }
}
