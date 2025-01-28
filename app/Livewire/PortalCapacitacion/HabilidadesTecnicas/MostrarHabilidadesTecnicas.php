<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesTecnicas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FormacionHabilidadTecnica;
use Livewire\WithPagination;

class MostrarHabilidadesTecnicas extends Component
{
    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search='';

    public function redirigir(){
        return redirect()->route('agregarHabilidadesHumanas');
    }

    public function delete($id)
    {
        FormacionHabilidadTecnica::find($id)->delete();
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
        return view('livewire.portal-capacitacion.habilidades-tecnicas.mostrar-habilidades-tecnicas',[
            'tecnicas'=> FormacionHabilidadTecnica::where('descripcion','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}
