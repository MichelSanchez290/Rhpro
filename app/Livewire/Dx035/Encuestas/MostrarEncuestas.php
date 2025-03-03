<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dx035\Encuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitacionEncuesta;

class MostrarEncuestas extends Component
{
    use WithPagination;

    public $showModal = false;
    public $encuestaToDelete;
    public $search = '';
    public $emails;
    public $mensaje;
    public $avances = [];
    // $user = Auth::user();
    // $nombreEmpresa = $user->empresa->nombre; // Obtén el nombre de la empresa

    protected $listeners = [
        'confirmDelete' => 'confirmDelete',
        'copiarClave' => 'copiarClave',
        'compartirEnlace' => 'compartirEnlace',
    ];

    public function confirmDelete($id)
    {
        $this->encuestaToDelete = $id;
        $this->showModal = true;
    }

    public function calcularAvance($encuesta)
    {
        return ($encuesta->EncuestasContestadas / $encuesta->NumeroEncuestas) * 100;
    }

    public function deleteEncuesta()
    {
        if ($this->encuestaToDelete) {
            $encuesta = Encuesta::findOrFail($this->encuestaToDelete);
            $encuesta->delete();
            session()->flash('message', 'Encuesta eliminada correctamente.');
        }

        $this->encuestaToDelete = null;
        $this->showModal = false;
        return redirect()->route('encuesta.index');
    }

    public function copiarClave($clave)
    {
        $this->dispatchBrowserEvent('copiar-clave', ['clave' => $clave]);
    }

    public function compartirEnlace($clave)
    {
        $enlace = route('survey.show', ['key' => $clave]);
        $this->dispatchBrowserEvent('compartir-enlace', ['enlace' => $enlace]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function enviarInvitacion()
    {
        $emails = array_map('trim', explode(',', $this->emails));

        foreach ($emails as $email) {
            Mail::to($email)->send(new InvitacionEncuesta($this->mensaje, $this->encuestaToShare));
        }

        session()->flash('message', 'Invitaciones enviadas correctamente.');
        return redirect()->route('encuesta.index');
    }


    public function render()
    {
        $user = Auth::user();
        $query = Encuesta::query();

        if ($user->hasRole('GoldenAdmin')) {
            // GoldenAdmin puede ver todas las encuestas
            $query->where(function($q) {
                $q->where('Empresa', 'like', '%' . $this->search . '%')
                  ->orWhere('id', 'like', '%' . $this->search . '%');
            });
        } elseif ($user->hasRole('EmpresaAdmin')) {
            // EmpresaAdmin solo puede ver las encuestas de su empresa
            if ($user->empresa) {
                $nombreEmpresa = trim($user->empresa->nombre); // Normaliza el nombre de la empresa
                logger('Filtrando por empresa: ' . $nombreEmpresa); // Depuración

                // Comparación insensible a mayúsculas/minúsculas
                $query->whereRaw('LOWER(Empresa) = ?', [strtolower($nombreEmpresa)])
                      ->where(function($q) {
                          $q->where('Empresa', 'like', '%' . $this->search . '%')
                            ->orWhere('id', 'like', '%' . $this->search . '%');
                      });
            } else {
                // Si no hay empresa asignada, no mostrar encuestas
                $query->where('id', -1); // Filtro que no devuelve resultados
            }
        } elseif ($user->hasRole('SucursalAdmin')) {
            // SucursalAdmin solo puede ver las encuestas de su sucursal
            $query->where('Sucursal', $user->sucursal_id)
                  ->where(function($q) {
                      $q->where('Empresa', 'like', '%' . $this->search . '%')
                        ->orWhere('id', 'like', '%' . $this->search . '%');
                  });
        } elseif ($user->hasRole('Trabajador NOM035')) {
            // Trabajador NOM035 solo puede ver la encuesta que debe contestar
            $query->where('id', $user->encuesta_id);
        }

        $encuestas = $query->orderBy('id', 'asc')->paginate(10);
        logger('Encuestas encontradas: ' . $encuestas->count()); // Depuración

        foreach ($encuestas as $encuesta) {
            $this->avances[$encuesta->id] = $this->calcularAvance($encuesta);
        }

        return view('livewire.dx035.encuestas.mostrar-encuestas', [
            'encuestas' => $encuestas,
            'avances' => $this->avances,
        ])->layout('layouts.dx035');
    }
}
