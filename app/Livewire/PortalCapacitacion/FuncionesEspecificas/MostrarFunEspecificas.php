<?php

namespace App\Livewire\PortalCapacitacion\FuncionesEspecificas;

use Livewire\Component;
use App\Models\PortalCapacitacion\FuncionEspecifica;
use Livewire\WithPagination;

class MostrarFunEspecificas extends Component
{
    use WithPagination;
    public $porpagina=5; //numero de productos a  mostrar por pagina
    public $search; //buscar
    public $funcion;

    //metodo para redirreccion a una vista
    public function redirigir()
    {
        return redirect()->route('agregarFuncionesEspecificas');
    }

    public function delete($id)
    {
        FuncionEspecifica::find($id)->delete();
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
        return view('livewire.portal-capacitacion.funciones-especificas.mostrar-fun-especificas',[
            'funciones'=> FuncionEspecifica::where('nombre','LIKE',"%{$this->search}%")
            ->paginate($this->porpagina),
        ])->layout("layouts.portal_capacitacion");
    }
}
