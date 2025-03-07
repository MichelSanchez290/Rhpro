<?php

namespace App\Livewire\PortalRh\Departament;

use Livewire\Component;
use App\Models\PortalRH\Departamento;
use Illuminate\Support\Facades\Crypt;


class EditarDepartament extends Component
{
    public $departament_id, $nombre_departamento;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $departament = Departamento::findOrFail($id);

        $this->departament_id = $id;
        $this->nombre_departamento = $departament->nombre_departamento;
    }

    public function actualizarDepartament()
    {
        $this->validate([
            'nombre_departamento' => 'required',
        ]);

        Departamento::updateOrCreate(['id' => $this->departament_id], [
            'nombre_departamento' => $this->nombre_departamento,
        ]);

        //$this->emit('editBann', 'Departamento editado correctamente');
        return redirect()->route('mostrardepa');
    }

    public function redirigir()
    {
        return redirect()->route('mostrardepa');
    }

    public function render()
    {
        return view('livewire.portal-rh.departament.editar-departament')->layout('layouts.client');
    }
}
