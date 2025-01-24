<?php

namespace App\Livewire\PortalRh\Empres;

use App\Models\PortalRH\Empres;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;


class MostrarEmpres extends Component
{
    public function redirigir()
    {
        return redirect()->route('agregarempresa');
    }

    //Eliminar
    protected $listeners = ['deleteEmpres'];

    public function confirmDeleteEmpres($id)
    {
        $this->emit('confirmDeleteEmpres',$id);
    }

    public function deleteEmpres($data)
    {
        $id = $data['id'];

        $empres = Empres::find($id);

        if($empres)
        {
            $empres->delete();
            $this->emit('eliminar','Empresa eliminada korrektamenthe');
        }
        else
        {
            $this->emit('eliminar','Empresa no encontrada');
        }

        return redirect()->route('mostrarempresas');
    }

    public function render()
    {
        return view('livewire.portal-rh.empres.mostrar-empres')->layout('layouts.client');

    }
}
