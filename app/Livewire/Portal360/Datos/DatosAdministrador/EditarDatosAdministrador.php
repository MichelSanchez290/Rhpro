<?php

namespace App\Livewire\Portal360\Datos\DatosAdministrador;

use App\Models\Encuestas360\Dato;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditarDatosAdministrador extends Component
{
    public $datoId;
    public $nombre;
    public $descripcion;
    
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
    ];
    
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.max' => 'El nombre no debe exceder los 255 caracteres.',
    ];
    
    public function mount($id)
    {
        $dato = Dato::findOrFail($id);
        $this->datoId = $dato->id;
        $this->nombre = $dato->nombre;
        $this->descripcion = $dato->descripcion;
    }
    
    public function update()
    {
        $this->validate();
        
        try {
            $dato = Dato::findOrFail($this->datoId);
            $dato->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            
            // session()->flash('success', 'Dato actualizado correctamente.');
            // return redirect()->route('mostrarDatosAdministrador');
            $this->dispatch('toastr-success', message: 'Datos actualizado correctamente.');
            return redirect()->route('portal360.datos.datos-administrador.mostrar-datos-administrador');
            
            
        } catch (\Exception $e) {
            Log::error('Error al actualizar dato: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error al actualizar el dato.');
        }
    }
    
    // public function cancelar()
    // {
    //     return redirect()->route('mostrarDatosAdministrador');
    // }
    
    public function render()
    {
        return view('livewire.portal360.datos.datos-administrador.editar-datos-administrador')->layout('layouts.portal360');
    }
 }

