<?php

namespace App\Livewire\PortalCapacitacion\RelacionesInternas;

use Livewire\Component;
use App\Models\PortalCapacitacion\RelacionInterna;
use Livewire\WithPagination;

class MostrarRelacionesInternas extends Component
{
    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search='';
    public $interna;

    public function redirigir(){
        return redirect()->route('agregarRelacionesInternas');
    }

    public function delete($id)
    {
        RelacionInterna::find($id)->delete();
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
        return view('livewire.portal-capacitacion.relaciones-internas.mostrar-relaciones-internas',[
            'internas'=> RelacionInterna::where('puesto','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}
