<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use Livewire\WithPagination;
// use Livewire\WithDispatch; 
use App\Models\Dx035\Encuesta;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvitacionEncuesta;

class MostrarEncuestas extends Component
{
    use WithPagination; // WithDispatch;

    public $showModal = false; // Control para ventana emergente
    public $encuestaToDelete;  // Clave de la encuesta a eliminar
    public $search = '';       // Propiedad para la búsqueda

    public $emails;
    public $mensaje;

    // Escuchar los eventos
    protected $listeners = [
        'confirmDelete' => 'confirmDelete', // Captura el evento de eliminar
        'copiarClave' => 'copiarClave',     // Captura el evento de copiar
        'compartirEnlace' => 'compartirEnlace', // Captura el evento de compartir
    ];

    // Método para confirmar la eliminación
    public function confirmDelete($id)
    {
        $this->encuestaToDelete = $id;
        $this->showModal = true; // Mostrar el modal de confirmación
    }

    // Método para eliminar la encuesta
    public function deleteEncuesta()
    {
        if ($this->encuestaToDelete) {
            // Buscar la encuesta por su clave
            $encuesta = Encuesta::findOrFail($this->encuestaToDelete);

            // Eliminar el logo si existe
            // if ($encuesta->RutaLogo) {
            //     Storage::disk('public')->delete($encuesta->RutaLogo);
            // }

            // Eliminar la encuesta
            $encuesta->delete();

            // Mostrar mensaje de éxito
            session()->flash('message', 'Encuesta eliminada correctamente.');
        }

        // Cerrar el modal y reiniciar la variable
        $this->encuestaToDelete = null;
        $this->showModal = false;

        // Redirigir a la página de índice de encuestas
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

    // Método para manejar la búsqueda
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
        // Filtrar las encuestas según la búsqueda
        $encuestas = Encuesta::where('Empresa', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.dx035.encuestas.mostrar-encuestas', [
            'encuestas' => $encuestas,
        ])->layout('layouts.dx035');
    }
}