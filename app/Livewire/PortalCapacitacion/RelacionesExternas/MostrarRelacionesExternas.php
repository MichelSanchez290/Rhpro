<?php

namespace App\Livewire\PortalCapacitacion\RelacionesExternas;

use Livewire\Component;
use App\Models\PortalCapacitacion\RelacionExterna;
use Livewire\WithPagination;

class MostrarRelacionesExternas extends Component
{
    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search='';
    public $externa;

    public function redirigir(){
        return redirect()->route('agregarRelacionesExternas');
    }

    public function delete($id)
    {
        RelacionExterna::find($id)->delete();
        //$this->emit('eliminar','funcion-eliminada');
    }

    public function mount()
    {
        $this->search="";
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
        return view('livewire.portal-capacitacion.relaciones-externas.mostrar-relaciones-externas',[
            'externas'=> RelacionExterna::where('nombre','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}