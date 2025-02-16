<?php
namespace App\Livewire\Crm\DatosFiscale\Eliminar;
use App\Models\Crm\DatosFiscale;
use Livewire\Component;
class EliminarDatosFisc extends Component
{
    public $showModal = false;
    public $datoToDelete = false;
    protected $listeners = [
        'datoconfirmDelete'=> 'datoconfirmDelete',
    ];
    public function datoconfirmDelete($id)
    {
        $this -> datoToDelete = $id;
        $this -> showModal = true;
    }
    public function deleteDato()
    {
        if($this->datoToDelete)
        {
            DatosFiscale::find($this->datoToDelete)->delete();
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        $this->datoToDelete = null;
        $this->showModal = false;
        return redirect()->route('mostrarDatosFiscales');
    }
    public function render()
    {
        return view('livewire.crm.datos-fiscale.eliminar.eliminar-datos-fisc');
    }
}