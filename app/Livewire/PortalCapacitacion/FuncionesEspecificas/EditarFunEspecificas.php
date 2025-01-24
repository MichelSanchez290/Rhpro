<?php

namespace App\Livewire\PortalCapacitacion\FuncionesEspecificas;

use App\Models\PortalCapacitacion\FuncionEspecifica;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithFileUploads;

class EditarFunEspecificas extends Component
{
    use WithFileUploads;
    public $nombre, $funcion_esp_id;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $tem = FuncionEspecifica::findOrFail($id);

        $this->funcion_esp_id = $tem->id;
        $this->nombre = $tem->nombre;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
        ]);

        FuncionEspecifica::updateOrCreate(['id' => $this->funcion_esp_id],
        [
            'nombre' => $this->nombre,
        ]);
        $this->emit('edithSale', 'Actualización con exito');
        return redirect()->route('mostrarFuncionesEspecificas');
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.funciones-especificas.editar-fun-especificas')->layout("layouts.portal_capacitacion");
    }
}
