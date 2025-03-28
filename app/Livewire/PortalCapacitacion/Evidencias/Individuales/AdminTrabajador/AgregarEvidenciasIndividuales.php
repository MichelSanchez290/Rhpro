<?php

namespace App\Livewire\PortalCapacitacion\Evidencias\Individuales\AdminTrabajador;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PortalCapacitacion\Evidencia;
use App\Models\PortalCapacitacion\Escaneardc;
use App\Models\PortalCapacitacion\CapacitacionIndividual; // Asegúrate de importar el modelo CapsIndividual
use Illuminate\Support\Facades\Crypt;

class AgregarEvidenciasIndividuales extends Component
{
    use WithFileUploads; // Habilitar la carga de archivos

    public $evidencias = []; 
    public $evidenciasPreview = [];
    public $documento; // Para el archivo PDF
    public $documentoPreview;
    public $caps_individuales_id;

    public function mount($id)
    {
        $this->caps_individuales_id = Crypt::decrypt($id);
    }

    
    public function updatedEvidencias()
    {
        $this->evidenciasPreview = []; // Limpiar previsualización
        foreach ($this->evidencias as $file) {
            $this->evidenciasPreview[] = $file->temporaryUrl(); // Genera la vista previa
        }
    }
    
    public function removeImage($index)
    {
        unset($this->evidencias[$index]);
        unset($this->evidenciasPreview[$index]);

        // Restablecer los arrays sin activar una recarga automática
        $this->evidencias = array_values($this->evidencias);
        $this->evidenciasPreview = array_values($this->evidenciasPreview);

        $this->dispatch('refreshPreview');

    }

    public function save()
    {
        // Validar los datos
        $this->validate([
            'evidencias' => 'nullable|array',
            'evidencias.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'documento' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    
        // Definir la carpeta de destino en "public/EvidenciasInd"
        $carpetaDestino = 'EvidenciasInd';
        $evidenciasGuardadas = []; // Para almacenar las evidencias creadas
    
        foreach ($this->evidencias as $file) {
            // Obtener el nombre original del archivo
            $nombreArchivo = $file->getClientOriginalName();
    
            // Guardar la imagen en "public/EvidenciasInd"
            $path = $file->storeAs($carpetaDestino, $nombreArchivo, 'public');
    
            // Guardar la ruta en la base de datos con estado "pendiente"
            $evidencia = Evidencia::create([
                'evidencias' => $path, // Guardamos la ruta relativa
                'status' => 'pendiente',
            ]);
    
            // Agregar a la lista de evidencias guardadas
            $evidenciasGuardadas[] = $evidencia;
    
            // Relacionar la evidencia con la capacitación individual
            if ($this->caps_individuales_id) {
                $capsIndividual = CapacitacionIndividual::find($this->caps_individuales_id);
                if ($capsIndividual) {
                    $capsIndividual->evidencias()->attach($evidencia->id);
                }
            }
        }
    
        // 📌 Guardar el documento PDF si existe
        if ($this->documento && count($evidenciasGuardadas) > 0) {
            $pdfPath = $this->documento->store('documentos', 'public');
    
            Escaneardc::create([
                'urlEsca' => $pdfPath,
                'capacitacion_individual_id' => $this->caps_individuales_id, // Nuevo campo en la tabla
                'evidencia_id' => $evidenciasGuardadas[0]->id, // Vincular con la primera evidencia
            ]);
        }
    
        // Mensaje de éxito
        session()->flash('message', 'Evidencia(s) agregada(s) exitosamente.');
    
        // Limpiar los campos
        $this->reset();
    }
    

    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.individuales.admin-trabajador.agregar-evidencias-individuales')
            ->layout("layouts.portal_capacitacion");
    }
}
