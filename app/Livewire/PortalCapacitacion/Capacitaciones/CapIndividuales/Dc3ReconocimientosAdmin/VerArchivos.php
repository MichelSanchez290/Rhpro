<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapGrupales\Dc3ReconocimientosAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PortalCapacitacion\Dc3Reconocimiento;
use Illuminate\Support\Facades\Crypt;

class VerArchivos extends Component
{
    use WithFileUploads;

   public function descargarArchivo($tipo, $id)
    {
        $capacitacionId = Crypt::decrypt($id);
        $dc3Reconocimiento = Dc3Reconocimiento::where('grupocursos_capacitaciones_id', $capacitacionId)
        ->where(function($query) {
            $query->whereNotNull('dc3')
                  ->orWhereNotNull('reconocimiento');
        })
        ->first();

        if (!$dc3Reconocimiento) {
            abort(404, 'Archivo no encontrado');
        }

        // Determinar qué archivo descargar
        $archivoPath = $tipo === 'dc3' ? $dc3Reconocimiento->dc3 : $dc3Reconocimiento->reconocimiento;

        if (!$archivoPath || !Storage::disk('public')->exists($archivoPath)) {
            abort(404, 'Archivo no disponible');
        }

        return response()->download(storage_path("app/public/{$archivoPath}"));
    }

    public function render()
  {
      // Filtramos los DC3 y Reconocimientos solo para la capacitación correspondiente
      $dc3Reconocimientos = Dc3Reconocimiento::where('grupocursos_capacitaciones_id', $this->capacitacion_id)
          ->where(function($query) {
              $query->whereNotNull('dc3')
                    ->orWhereNotNull('reconocimiento');
          })
          ->get();

      return view('livewire.portal-capacitacion.capacitaciones.cap-grupales.dc3-reconocimientos-admins.ver-archivos', 
          compact('dc3Reconocimientos'))
          ->layout("layouts.portal_capacitacion");
  }

}