<?php

namespace App\Livewire\PortalRh\Sucursal;

use App\Models\PortalRH\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarSucursal extends Component
{
    use WithPagination; // Para paginación con Livewire

    public $porpagina = 5; // Número de sucursales por página
    public $search = ''; // Variable de búsqueda
    public $showModal = false; // Control para ventana emergente
    public $sucursalToDelete; // ID de la sucursal a eliminar

    // Resetea la página cuando cambia la búsqueda
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Resetea la página cuando cambia el número de resultados por página
    public function updatedPorpagina()
    {
        $this->resetPage();
    }

    // Redirigir a una vista para agregar sucursales
    public function redirigir()
    {
        return redirect()->route('agregarsucursal');
    }

    
    
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento
    ]; 
    
    public function confirmDelete($id)
    {
        $this->sucursalToDelete = $id;
        $this->showModal = true;
    }
    
    public function deleteSucursal()
    {
        /*
        if ($this->sucursalToDelete) {
            $sucursal = Sucursal::find($this->sucursalToDelete);

            if ($sucursal) {
                $sucursal->delete();
                session()->flash('message', 'Sucursal eliminada exitosamente.');
            } else {
                session()->flash('message', 'La sucursal no existe o ya fue eliminada.');
            }
        } else {
            session()->flash('message', 'No se proporcionó ninguna sucursal para eliminar.');
        }

        $this->sucursalToDelete = null;
        $this->showModal = false; */


        
        if ($this->sucursalToDelete) {
            Sucursal::find($this->sucursalToDelete)->delete();
            session()->flash('message', 'Sucursal eliminada exitosamente.');
        }

        $this->sucursalToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarsucursal');
    }

    public function render()
    {
        return view('livewire.portal-rh.sucursal.mostrar-sucursal', [
            'sucursales' => Sucursal::where('nombre_sucursal', 'LIKE', "%{$this->search}%")
                ->orWhere('clave_sucursal', 'LIKE', "%{$this->search}%")
                ->orderBy('nombre_sucursal', 'ASC')
                ->paginate($this->porpagina),
        ])->layout('layouts.client');
    }
}
