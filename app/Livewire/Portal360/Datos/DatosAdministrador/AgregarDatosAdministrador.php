<?php

namespace App\Livewire\Portal360\Datos\DatosAdministrador;

use App\Models\Encuestas360\Dato;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AgregarDatosAdministrador extends Component
{

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
    
    public function save()
    {
        $this->validate();
        
        try {
            Dato::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            
            // session()->flash('success', 'Dato agregado correctamente.');
            $this->dispatch('toastr-success', message: 'Datos agregado correctamente.');
            return redirect()->route('portal360.datos.datos-administrador.mostrar-datos-administrador');
            
        } catch (\Exception $e) {
            Log::error('Error al guardar dato: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error al guardar el dato.');
        }
    }
    
    // public function cancelar()
    // {
    //     return redirect()->route('mostrarDatosAdministrador');
    // }
    public function render()
    {
        return view('livewire.portal360.datos.datos-administrador.agregar-datos-administrador')->layout('layouts.portal360');
    }
}
