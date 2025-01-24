<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use App\Models\Dx035\Encuesta;

class MostrarEncuestas extends Component
{
    public $search = '';

    public function delete($id)
    {
        Encuesta::find($id)->delete();
        session()->flash('message', 'Encuesta eliminada correctamente.');
    }

    public function render()
    {
        $encuestas = Encuesta::query()
            ->when($this->search, function ($query) {
                $query->where('Clave', 'like', '%' . $this->search . '%')
                    ->orWhere('Empresa', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.dx035.encuestas.mostrar-encuestas', [
            'encuestas' => $encuestas,
        ])->layout('layouts.dx035'); 
    }
}
