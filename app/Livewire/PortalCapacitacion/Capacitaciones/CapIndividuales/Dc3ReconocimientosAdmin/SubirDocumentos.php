<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\Dc3ReconocimientosAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PortalCapacitacion\CapacitacionDocumento;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SubirDocumentos extends Component
{
    use WithFileUploads;

    public $capacitacionId;
    public $dc3 = [];
    public $reconocimiento = [];
    public $previewDc3 = [];
    public $previewReconocimiento = [];
    public $confirmingDeletion = false;
    public $documentToDelete = null;
    public $showSuccessAlert = false;

    protected $rules = [
        'dc3.*' => 'nullable|mimes:pdf',
        'reconocimiento.*' => 'nullable|mimes:pdf',
    ];

    public function mount($id)
    {
        $this->capacitacionId = Crypt::decrypt($id);
    }

    public function updatedDc3()
    {
        $this->previewDc3 = [];
        foreach ($this->dc3 as $file) {
            $this->previewDc3[] = [
                'name' => $file->getClientOriginalName(),
                'size' => $this->formatBytes($file->getSize()),
                'type' => $file->getClientMimeType()
            ];
        }
    }

    public function updatedReconocimiento()
    {
        $this->previewReconocimiento = [];
        foreach ($this->reconocimiento as $file) {
            $this->previewReconocimiento[] = [
                'name' => $file->getClientOriginalName(),
                'size' => $this->formatBytes($file->getSize()),
                'type' => $file->getClientMimeType()
            ];
        }
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        return round($bytes / pow(1024, $pow), $precision) . ' ' . $units[$pow];
    }

    public function removeDc3($index)
    {
        array_splice($this->dc3, $index, 1);
        array_splice($this->previewDc3, $index, 1);
    }

    public function removeReconocimiento($index)
    {
        array_splice($this->reconocimiento, $index, 1);
        array_splice($this->previewReconocimiento, $index, 1);
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeletion = true;
        $this->documentToDelete = $id;
    }

    public function deleteDocument()
    {
        $documento = CapacitacionDocumento::find($this->documentToDelete);
        
        if ($documento->dc3 && Storage::disk('public')->exists($documento->dc3)) {
            Storage::disk('public')->delete($documento->dc3);
        }
        
        if ($documento->reconocimiento && Storage::disk('public')->exists($documento->reconocimiento)) {
            Storage::disk('public')->delete($documento->reconocimiento);
        }
        
        $documento->delete();
        $this->confirmingDeletion = false;
        $this->documentToDelete = null;
        
        $this->showSuccessAlert = true;
        session()->flash('message', 'Documento eliminado correctamente.');
    }

    public function guardarArchivos()
    {
        $this->validate();

        $uploadCount = 0;

        // Procesar DC3
        if ($this->dc3) {
            foreach ($this->dc3 as $dc3File) {
                $documento = new CapacitacionDocumento(['caps_individuales_id' => $this->capacitacionId]);
                
                $dc3Path = $dc3File->storeAs(
                    'dc3', 
                    $dc3File->getClientOriginalName(), 
                    'public'
                );
                $documento->dc3 = $dc3Path;
                $documento->save();
                $uploadCount++;
            }
        }

        // Procesar Reconocimientos
        if ($this->reconocimiento) {
            foreach ($this->reconocimiento as $reconocimientoFile) {
                $documento = new CapacitacionDocumento(['caps_individuales_id' => $this->capacitacionId]);
                
                $reconocimientoPath = $reconocimientoFile->storeAs(
                    'reconocimientos', 
                    $reconocimientoFile->getClientOriginalName(), 
                    'public'
                );
                $documento->reconocimiento = $reconocimientoPath;
                $documento->save();
                $uploadCount++;
            }
        }

        // Limpiar campos y mostrar alerta
        $this->reset(['dc3', 'reconocimiento', 'previewDc3', 'previewReconocimiento']);
        $this->showSuccessAlert = true;
        
        // Mensaje personalizado según cantidad de archivos subidos
        if ($uploadCount === 1) {
            session()->flash('message', '1 archivo subido correctamente.');
        } else {
            session()->flash('message', $uploadCount . ' archivos subidos correctamente.');
        }
    }

    public function closeAlert()
    {
        $this->showSuccessAlert = false;
    }

    public function render()
    {
        $documentos = CapacitacionDocumento::where('caps_individuales_id', $this->capacitacionId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.dc3-reconocimiento-admins.subir-documento', [
            'documentos' => $documentos
        ])->layout("layouts.portal_capacitacion");
    }  
}