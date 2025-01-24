<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Relacion;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EditarRelaciones extends Component
{

    public $id, $nombre;

    public function mount($id){
        try{
            $id = Crypt::decrypt($id);

            $tem = Relacion::findOrFail($id);

            $this->id = $id;
            $this->nombre = $tem->nombre;
        }catch(\Exception $e){
            $this->dispatch('error', 'Error al cargar las Relaciones: ' . $e->getMessage());
        }
    }

    public function editarRelaciones(){
        try{
            $this->validate([
                'nombre' => 'required|min:3',
            ],[
                    'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            ]);

            Relacion::updateOrCreate(['id' => $this->id],[
                'nombre' => $this->nombre,
            ]);

            $this->dispatch('showAnimatedToast', 'Relaciones editado');
            return redirect()->route('portal360.mostrarUser')
        }
    }
    public function render()
    {
        return view('livewire.portal360.editar-relaciones');
    }
}
