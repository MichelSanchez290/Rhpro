<?php

namespace App\Livewire\PortalRh\Incapacidad;

use Livewire\Component;
use App\Models\PortalRH\Incapacidad;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditarIncapacidad extends Component
{
    use WithFileUploads;

    public $incapacidad_id, $tipo, $motivo, $fecha_inicio, $fecha_final, 
    $status, $documento, $observaciones, $nombre_usuario, $subirPdf, $user_id;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $incapacidad = Incapacidad::findOrFail($id);

        $this->incapacidad_id = $id;
        $this->tipo = $incapacidad->tipo;
        $this->motivo = $incapacidad->motivo;
        $this->fecha_inicio = $incapacidad->fecha_inicio;
        $this->fecha_final = $incapacidad->fecha_final;
        $this->status = $incapacidad->status;
        $this->documento = $incapacidad->documento;
        $this->observaciones = $incapacidad->observaciones;
        
        // Obtener el primer usuario vinculado (si existe) y asignar su nombre
        if ($incapacidad->users->isNotEmpty()) {
            $this->nombre_usuario = $incapacidad->users->first()->name;
        } else {
            $this->nombre_usuario = 'No asignado';
        }

        if ($incapacidad->users->isNotEmpty()) {
            $user = $incapacidad->users->first();
            $this->nombre_usuario = $user->name;
            $this->user_id = $user->id; // Guardamos el ID del usuario para el nombre del archivo
        } else {
            $this->nombre_usuario = 'No asignado';
        }
    }

    public function actualizarIncapacidad()
    {
        $this->validate([
            'tipo'          => 'required',
            'motivo'        => 'required',
            'fecha_inicio'  => 'required|date',
            'fecha_final'   => 'required|date|after_or_equal:fecha_inicio',
            'status'        => 'required',
            'subirPdf'     => 'nullable|file|mimes:pdf', // Permitir actualizar sin cambiar el archivo
            'observaciones' => 'nullable',
        ]);

        // si se subio un nuevo archivo PDF
        if ($this->subirPdf) {
            // eliminar el archivo PDF anterior si existe
            if ($this->documento && Storage::disk('subirDocs')->exists($this->documento)) {
                Storage::disk('subirDocs')->delete($this->documento);
            }

            // Generar nombre único para el archivo
            $nombreArchivo = $this->user_id . '_' . time() . '_' . Str::slug($this->tipo) . '.pdf';
            
            // Guardar el nuevo archivo PDF
            $this->subirPdf->storeAs('PortalRH/Incapacidades', $nombreArchivo, 'subirDocs');
            $this->documento = "PortalRH/Incapacidades/" . $nombreArchivo;
        }
        
        Incapacidad::updateOrCreate(['id' => $this->incapacidad_id], [
            'tipo'          => $this->tipo,
            'motivo'        => $this->motivo,
            'fecha_inicio'  => $this->fecha_inicio,
            'fecha_final'   => $this->fecha_final,
            'status'        => $this->status,
            'documento'     => $this->documento,
            'observaciones' => $this->observaciones,
        ]);

        session()->flash('message', 'Incapacidad actualizada.');
    }

    public function render()
    {
        return view('livewire.portal-rh.incapacidad.editar-incapacidad')->layout('layouts.client');
    }
}
