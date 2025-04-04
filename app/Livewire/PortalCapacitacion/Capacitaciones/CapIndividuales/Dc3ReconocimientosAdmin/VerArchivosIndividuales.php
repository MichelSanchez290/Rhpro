<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapIndividuales\Dc3ReconocimientosAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PortalCapacitacion\CapacitacionDocumento;
use Illuminate\Support\Facades\Crypt;
use ZipArchive;

class VerArchivosIndividuales extends Component
{
    public $capacitaciones = [];
    use WithFileUploads;

    public function descargarArchivo($tipo, $id)
    {
        $capacitacionId = Crypt::decrypt($id);
        $capacitacionDocumento = CapacitacionDocumento::where('caps_individuales_id', $capacitacionId)
            ->where(function($query) {
                $query->whereNotNull('dc3')
                      ->orWhereNotNull('reconocimiento');
            })
            ->first();

        if (!$capacitacionDocumento) {
            abort(404, 'Archivo no encontrado');
        }

        $archivoPath = $tipo === 'dc3' ? $capacitacionDocumento->dc3 : $capacitacionDocumento->reconocimiento;

        if (!$archivoPath || !Storage::disk('public')->exists($archivoPath)) {
            abort(404, 'Archivo no disponible');
        }

        return response()->download(storage_path("app/public/{$archivoPath}"));
    }

    public function descargarTodos($id)
    {
        $capacitacionId = Crypt::decrypt($id);

        $archivos = CapacitacionDocumento::where('caps_individuales_id', $capacitacionId)
            ->where(function($query) {
                $query->whereNotNull('dc3')
                      ->orWhereNotNull('reconocimiento');
            })
            ->get();
    
        if ($archivos->isEmpty()) {
            abort(404, 'No hay archivos disponibles para descargar');
        }
    
        $zip = new ZipArchive;
        $zipFileName = 'documentos_capacitacion_.zip';
        $zipPath = storage_path('app/public/temp/'.$zipFileName);
    
        if (!file_exists(storage_path('app/public/temp'))) {
            mkdir(storage_path('app/public/temp'), 0755, true);
        }
    
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $addedFiles = 0;
            
            foreach ($archivos as $index => $archivo) {
                // Agregar DC3 si existe
                if ($archivo->dc3 && Storage::disk('public')->exists($archivo->dc3)) {
                    $zip->addFile(
                        storage_path("app/public/{$archivo->dc3}"),
                        'DC3_'.$index.'_'.basename($archivo->dc3)
                    );
                    $addedFiles++;
                }
    
                // Agregar Reconocimiento si existe
                if ($archivo->reconocimiento && Storage::disk('public')->exists($archivo->reconocimiento)) {
                    $zip->addFile(
                        storage_path("app/public/{$archivo->reconocimiento}"),
                        'Reconocimiento_'.$index.'_'.basename($archivo->reconocimiento)
                    );
                    $addedFiles++;
                }
            }
    
            $zip->close();
    
            if ($addedFiles === 0) {
                abort(404, 'Los archivos existen en la base de datos pero no en el almacenamiento');
            }
    
            return response()->download($zipPath)->deleteFileAfterSend(true);
        }
    
        abort(500, 'No se pudo crear el archivo ZIP');
    }

    public function render()
    {
        $capacitacionDocumentos = CapacitacionDocumento::whereIn('caps_individuales_id', $this->capacitaciones->pluck('id'))->get();

        return view('livewire.portal-capacitacion.capacitaciones.cap-individuales.dc3-reconocimientos-admins.ver-archivos-ind', 
            compact('capacitacionDocumentos'))
            ->layout("layouts.portal_capacitacion");
    }
}