<?php

namespace App\Livewire\PortalRh\CambioSalario;

use Livewire\Component;
use App\Models\User;
use App\Models\PortalRH\Instructor;
use App\Models\PortalRH\Trabajador;
use App\Models\PortalRH\CambioSalario;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class EditarCambioSalario extends Component
{
    use WithFileUploads;
    public $salario_id, $fecha_cambio, $salario_anterior, $salario_nuevo,
        $motivo, $documento, $observaciones, $subirPdf, $nombre_usuario, $user_id
    ;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $cambio_salario = CambioSalario::findOrFail($id);
        
        $this->salario_id = $id;
        $this->fecha_cambio = $cambio_salario->fecha_cambio;
        $this->salario_anterior = $cambio_salario->salario_anterior;
        $this->salario_nuevo = $cambio_salario->salario_nuevo;
        $this->motivo = $cambio_salario->motivo;
        $this->observaciones = $cambio_salario->observaciones;
        $this->documento = $cambio_salario->documento;

        // Obtener el usuario asignado 
        if ($cambio_salario->users->isNotEmpty()) {
            $user = $cambio_salario->users->first();
            $this->nombre_usuario = $user->name;
            $this->user_id = $user->id; // Guardamos el user_id para usarlo después
        } else {
            $this->nombre_usuario = 'No asignado';
        }
    }

    public function actualizarSalario()
    {
        $this->validate([
            'fecha_cambio' => 'required',
            'salario_anterior' => 'required',
            'salario_nuevo' => 'required',
            'motivo' => 'required',
            'observaciones' => 'required',
            'subirPdf' => 'nullable|file|mimes:pdf',
        ]);

        // si se subio un nuevo archivo PDF
        if ($this->subirPdf) {
            // eliminar el archivo PDF anterior si existe
            if ($this->documento && Storage::disk('subirDocs')->exists($this->documento)) {
                Storage::disk('subirDocs')->delete($this->documento);
            }

            // Generar nombre único para el archivo
            $nombreArchivo = $this->user_id . '_' . time() . '_' . Str::slug($this->motivo) . '.pdf';
            
            // Guardar el nuevo archivo PDF
            $this->subirPdf->storeAs('PortalRH/CambioSalario', $nombreArchivo, 'subirDocs');
            $this->documento = "PortalRH/CambioSalario/" . $nombreArchivo;
        }

        CambioSalario::updateOrCreate(['id' => $this->salario_id], [
            'fecha_cambio' => $this->fecha_cambio,
            'salario_anterior' => $this->salario_anterior,
            'salario_nuevo' => $this->salario_nuevo,
            'motivo' => $this->motivo,
            'observaciones' => $this->observaciones,
            'documento' => $this->documento,
        ]);

        // Si hay un user_id, actualizar el salario en la tabla correspondiente
        if ($this->user_id) {
            $instructor = Instructor::where('user_id', $this->user_id)->first();
            $trabajador = Trabajador::where('user_id', $this->user_id)->first();

            if ($instructor) {
                $instructor->update(['honorarios' => $this->salario_nuevo]);
            } elseif ($trabajador) {
                $trabajador->update(['sueldo' => $this->salario_nuevo]);
            }
        }
        
        
        session()->flash('message', 'Cambio de Salario Actualizado.');
    }
    
    public function render()
    {
        return view('livewire.portal-rh.cambio-salario.editar-cambio-salario')->layout('layouts.client');
    }
}
