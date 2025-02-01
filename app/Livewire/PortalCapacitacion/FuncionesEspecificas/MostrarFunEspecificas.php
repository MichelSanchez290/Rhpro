<?php

namespace App\Livewire\PortalCapacitacion\FuncionesEspecificas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FuncionEspecifica;
use Livewire\WithPagination;

class MostrarFunEspecificas extends Component
{
    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search = ''; //buscar
    public $showModal = false; // Control para ventana emergente
    public $sucursalToDelete;

    //metodo para redirreccion a una vista
    public function redirigir()
    {
        return redirect()->route('agregarFuncionesEspecificas');
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
        if ($this->sucursalToDelete) {
            FuncionEspecifica::find($this->sucursalToDelete)->delete();
            session()->flash('message', 'Sucursal eliminada exitosamente.');
        }

        $this->sucursalToDelete = null;
        $this->showModal = false;

        return redirect()->route('mostrarFuncionesEspecificas');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedPorpagina()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.funciones-especificas.mostrar-fun-especificas',[
            'funciones'=> FuncionEspecifica::where('nombre','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}
