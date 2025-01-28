<?php

namespace App\Livewire\PortalCapacitacion\HabilidadesHumanas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FormacionHabilidadHumana;
use Livewire\WithPagination;

class MostrarHabilidadesHumanas extends Component
{

    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search='';

    public function redirigir(){
        return redirect()->route('agregarHabilidadesHumanas');
    }

    public function delete($id)
    {
        FormacionHabilidadHumana::find($id)->delete();
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
        return view('livewire.portal-capacitacion.habilidades-humanas.mostrar-habilidades-humanas',[
            'humanas'=> FormacionHabilidadHumana::where('descripcion','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}