<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Relacion;
use Livewire\Component;
use Livewire\WithPagination;



class MostrarRelaciones extends Component
{
   
    //use WithPagination;
    use WithPagination;

    public $porpagina = 5;
    public $search;

    // Método para redireccionar a la vista de agregar Usuario 
    public function redirigirRelaciones()
    {
        return redirect()->route('agregarRealacion');
    }

    // Inicialización del componente
    public function mountRelaciones()
    {
        $this->search = "";
    }

    public function updatedSearchRelaciones()
    {
        $this->resetPage();
    }

    public function updatedPorpaginaRelaciones()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.portal360.mostrar-relaciones', [
            'relacionesuser' => Relacion::where('nombre', 'LIKE', "%{$this->search}%")
                ->orderBy('nombre', 'ASC')
                ->paginate($this->porpagina),
        ])->layout('layouts.portal360');
    }

    public function deleteRelaciones($id)
    {
        Relacion::find($id)?->delete(); 
        $this->dispatch('eliminarRelaciones', 'Relaciones eliminado correctamente');
    }



    // public function render()
    // {
    //     return view('livewire.portal360.mostrar-relaciones');
    // }
}
