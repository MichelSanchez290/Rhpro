<?php

namespace App\Livewire\Portal360\Relaciones\RelacionesAdministrador;

use App\Models\Encuestas360\Relacion;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarRelacionAdministrador extends Component
{

    public $relacionId, $nombre;

    public function mount($id){
        try{
            $this->relacionId = Crypt::decrypt($id);

            $tem = Relacion::findOrFail($this->relacionId);

            $this->nombre = $tem->nombre;
        }catch(\Exception $e){
            $this->dispatch('error', 'Error al cargar las Relaciones: ' . $e->getMessage());
        }
    }

    public function editarRelacionesAdministrador(){
        try {
            $this->validate([
                'nombre' => 'required|min:3',
            ], [
                'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            ]);
    
            Relacion::updateOrCreate(['id' => $this->relacionId], [
                'nombre' => $this->nombre,
            ]);
    
            // Notificación de éxito
            $this->dispatch('toastr-success', message: 'Relación Editada Correctamente.');
    
            // Redireccionar a la lista de relaciones
            return redirect()->route('portal360.relaciones.relaciones-administrador.mostrar-relacion-administrador');
    
        } catch (\Exception $e) {
            // Notificación de error
            $this->dispatch('toastr-error', message: 'Error al editar la relación: ' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.portal360.relaciones.relaciones-administrador.editar-relacion-administrador')->layout('layouts.portal360');
    }
    
    // public function render()
    // {
    //     return view('livewire.portal360.relaciones.relaciones-administrador.editar-relacion-administrador');
    // }
}
