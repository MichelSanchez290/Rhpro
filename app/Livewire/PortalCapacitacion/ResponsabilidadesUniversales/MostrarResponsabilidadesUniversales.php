<?php

namespace App\Livewire\PortalCapacitacion\ResponsabilidadesUniversales;

use Livewire\Component;
use App\Models\PortalCapacitacion\ResponsabilidadUniversal;
use Livewire\WithPagination;

class MostrarResponsabilidadesUniversales extends Component
{
    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search='';
    public $universal;

    public function redirigir(){
        return redirect()->route('agregarResponsabilidadesUniversales');
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
        return view('livewire.portal-capacitacion.responsabilidad-universal.mostrar-responsabilidades-universales',[
            'universales'=> ResponsabilidadUniversal::where('sistema','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}