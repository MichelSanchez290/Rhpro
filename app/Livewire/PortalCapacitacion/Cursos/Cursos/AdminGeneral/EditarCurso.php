<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Cursos\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\Curso;
use App\Models\PortalRh\Empresa;
use App\Models\PortalRh\Sucursal;
use Illuminate\Support\Facades\Crypt;

class EditarCurso extends Component
{
    public $curso; // Instancia del curso a editar
    public $nombre;
    public $horas;
    public $precio;
    public $tipoestatus;
    public $tematicas_id;
    public $tematicas;
    public $modalidad;
    public $empresa_id;
    public $sucursal_id;
    public $empresas = [], $sucursales = [];
    public $cursos_id;

    // Cargar los datos del curso a editar cuando se monta el componente
    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $curso = Curso::findOrFail($id);

        $this->cursos_id = $curso->id;
        $this->nombre = $curso->nombre;
        $this->horas = $curso->horas;
        $this->precio = $curso->precio;
        $this->tipoestatus = $curso->tipoestatus;
        $this->modalidad = $curso->modalidad;
        $this->empresa_id = $curso->empresa_id;

        $this->empresas = Empresa::all();

        // Cargar sucursales correspondientes a la empresa seleccionada
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];

        $this->sucursal_id = $curso->sucursal_id;
    }

    public function updatedEmpresaId()
    {
        // Obtener sucursales relacionadas a la empresa seleccionada
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        $this->sucursal_id = null; // Resetear selección de sucursal
    }

    // Método para actualizar el curso
    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'horas' => 'required',
            'precio' => 'required',
            'tipoestatus' => 'required',
            'modalidad' => 'required',
            'empresa_id' => 'required', // Verifica que el ID exista
            'sucursal_id' => 'required', // Verifica que el ID exista
        ]);

        $curso = Curso::findOrFail($this->cursos_id);
        $curso->update([
            'nombre' => $this->nombre,
            'horas' => $this->horas,
            'precio' => $this->precio,
            'tipoestatus' => $this->tipoestatus,
            'modalidad' => $this->modalidad,
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
        ]);

        // Opcional: Redirigir o mostrar un mensaje de éxito
        session()->flash('message', 'Curso actualizado con éxito.');
        return redirect()->route('verCursos'); // Cambia la ruta según sea necesario
    }

    // Método para renderizar la vista
    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.cursos.admin-general.editar-curso')->layout("layouts.portal_capacitacion");
    }
}
