<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Asignacion;
use App\Models\Encuestas360\Encuesta360;
use App\Models\Encuestas360\Relacion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;

class AgregarAsignacion extends Component
{
    public $calificador_id;
    public $calificado_id;
    public $relacion_id;
    public $encuesta_id;
    public $realizada;

    public $usuarios;
    public $relaciones;
    public $encuestas;

    protected $rules = [
        'calificador_id' => 'required|exists:users,id',
        'calificado_id' => 'required|exists:users,id',
        'relacion_id' => 'required|exists:relaciones,id',
        'encuesta_id' => 'required|exists:360_encuestas,id',
        'realizada' => 'required|date'
    ];

    public function mount()
    {
        $this->usuarios = User::all();
        $this->relaciones = Relacion::all();
        $this->encuestas = Encuesta360::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveAsignacion()
    {
        $this->validate();

        try {
            Asignacion::create([
                'calificador_id' => $this->calificador_id,
                'calificado_id' => $this->calificado_id,
                'relaciones_id' => $this->relacion_id,
                '360_encuestas_id' => $this->encuesta_id,
                'realizada' => 0,
                'fecha' => Carbon::parse($this->realizada)
            ]);

            $this->dispatch('toastr-success', message: 'Asignación creada correctamente.');

            // session()->flash('success', '');
            return redirect()->route('portal360.mostrarAsignacion');
        } catch (\Exception $e) {
            logger($e->getMessage());
            $this->dispatch('toastr-error', message: 'Error al guardar la Asignacion: ' . $e->getMessage());
            // session()->flash('error', 'Error al crear la asignación: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.portal360.agregar-asignacion')->layout('layouts.portal360');
    }


    // public function render()
    // {
    //     return view('livewire.portal360.agregar-asignacion');
    // }
}
