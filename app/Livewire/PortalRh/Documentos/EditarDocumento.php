<?php

namespace App\Livewire\PortalRh\Documentos;

use Livewire\Component;
use App\Models\User;
use App\Models\PortalRH\Documento;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditarDocumento extends Component
{
    use WithFileUploads;
    public $documento_id, $archivo, $fecha_subida, $status, $numero, 
    $original, $comentarios, $tipo_documento, $nombre_usuario, $subirPdf, $user_id;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $documento = Documento::findOrFail($id);

        $this->documento_id = $id;
        $this->archivo = $documento->archivo;
        $this->fecha_subida = $documento->fecha_subida;
        $this->status = $documento->status;
        $this->numero = $documento->numero;
        $this->original = $documento->original;
        $this->comentarios = $documento->comentarios;
        $this->tipo_documento = $documento->tipo_documento;
        
        // Obtener el usuario vinculado y su ID
        if ($documento->users->isNotEmpty()) {
            $user = $documento->users->first();
            $this->nombre_usuario = $user->name;
            $this->user_id = $user->id; // Guardamos el ID para el nombre del archivo
        } else {
            $this->nombre_usuario = 'No asignado';
        }
    }

    public function actualizarDocumento()
    {
        $this->validate([
            'fecha_subida' => 'required|date',
            'status' => 'required', 
            'numero' => 'required',
            'original' => 'required',
            'comentarios' => 'required',
            'tipo_documento' => 'required',
            'subirPdf'     => 'nullable|file|mimes:pdf', // Permitir actualizar sin cambiar el archivo
        ]);

        // si se subio un nuevo archivo PDF
        if ($this->subirPdf) {
            // eliminar el archivo PDF anterior si existe
            if ($this->archivo && Storage::disk('subirDocs')->exists($this->archivo)) {
                Storage::disk('subirDocs')->delete($this->archivo);
            }

            // Generar nombre único para el archivo
            $nombreArchivo = $this->user_id . '_' . time() . '_' . $this->tipo_documento . '.pdf';
            
            // Guardar el nuevo archivo PDF
            $this->subirPdf->storeAs('PortalRH/Documentos', $nombreArchivo, 'subirDocs');
            $this->archivo = "PortalRH/Documentos/" . $nombreArchivo;
        }
        
        Documento::updateOrCreate(['id' => $this->documento_id], [
            'archivo'         => $this->archivo,
            'fecha_subida'    => $this->fecha_subida,
            'status'          => $this->status,
            'numero'          => $this->numero,
            'original'        => $this->original,
            'comentarios'     => $this->comentarios,
            'tipo_documento' => $this->tipo_documento,
        ]);

        session()->flash('message', 'Documento Actualizado.');
    }

    public function render()
    {
        return view('livewire.portal-rh.documentos.editar-documento')->layout('layouts.client');
    }
}
