<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\Dc3ReconocimientosAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PortalCapacitacion\CapacitacionDocumento;
use Illuminate\Support\Facades\Crypt;

class SubirDocumentos extends Component
{
    use WithFileUploads;

    public $capacitacionId;
    public $tipo;
    public $archivo;

    protected $rules = [
        'tipo' => 'required|in:DC3,Reconocimiento',
        'archivo' => 'required|file|mimes:pdf,jpeg,png,docx|max:10240', // Puedes ajustar los tipos de archivo y tamaño
    ];

    public function mount($id)
    {
        $this->capacitacionId = Crypt::decrypt($id);
    }

    public function submit()
    {
        $this->validate();

        // Guardar el archivo
        $path = $this->archivo->store('evidencias', 'public');

        // Crear el nuevo registro en la base de datos
        CapacitacionDocumento::create([
            'caps_individuales_id' => $this->capacitacionId, // Aquí pasas el valor del ID de la capacitación
            'tipo' => $this->tipo,
            'archivo' => $path,
        ]);

        session()->flash('message', 'Documento subido con éxito.');

        // Reiniciar el formulario
        $this->reset();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.dc3-reconocimiento-admins.subir-documento')
        ->layout("layouts.portal_capacitacion");
    }  
}
