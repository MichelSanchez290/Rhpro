<?php

namespace App\Livewire\Crm\CrmEmpresa\Eliminar;

use App\Models\Crm\CrmEmpresa;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EliminarEmpresa extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $empresaToDelete = false;

    protected $listeners = [
        'confirmDelete'=> 'confirmDelete',
    ];

    public function confirmDelete($id)
    {
        $this -> empresaToDelete = $id;
        $this -> showModal = true;
    }

    public function deleteEmpresa()
    {
        if($this->empresaToDelete)
        {
            CrmEmpresa::find($this->empresaToDelete)->delete();
            session()->flash('message', 'Empresa eliminada exitosamente');
        }
        $this->empresaToDelete = null;
        $this->showModal = false;
        return redirect()->route('mostrarEmpresaCrm');
        // return redirect()->route('mostrarDatosFiscales');
    }

    public function render()
    {
        return view('livewire.crm.crm-empresa.eliminar.eliminar-empresa')->layout('layouts.crm');
    }
}