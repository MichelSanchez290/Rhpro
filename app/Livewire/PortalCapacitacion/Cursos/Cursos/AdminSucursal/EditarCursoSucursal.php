<?php

namespace App\Livewire\PortalCapacitacion\Cursos\Cursos\AdminSucursal;

use Livewire\Component;
use App\Models\PortalCapacitacion\Curso;
use App\Models\PortalRh\Empresa;
use App\Models\PortalRh\Sucursal;
use Illuminate\Support\Facades\Crypt;
use App\Models\PortalCapacitacion\Tematica;
use Illuminate\Support\Facades\Auth;

class EditarCursoSucursal extends Component
{
    public $nombre, $horas, $precio, $tipoestatus, $modalidad;
    public $empresa_id,  $sucursal_id, $tematicas_id;
    public $empresas = [], $sucursales = [], $tematicas = [];
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
        $this->tematicas_id = $curso->tematicas_id;

        $this->empresa_id = $curso->empresa_id;
    
        // Obtener la empresa del usuario autenticado
        $user = Auth::user();
        $this->empresa_id = $user->empresa_id;
        $this->sucursal_id = $user->sucursal_id;
    
        // Cargar las sucursales correspondientes a la empresa seleccionada
        $empresa = Empresa::find($this->empresa_id);
        $this->sucursales = $empresa ? $empresa->sucursales : [];
    
        // Cargar temáticas basadas en la empresa y sucursal del usuario
        $this->cargarTematicas();
    }


    public function updatedEmpresaId()
    {
        // Obtener sucursales relacionadas a la empresa seleccionada
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        $this->sucursal_id = null; // Resetear selección de sucursal
    }

    public function cargarTematicas()
    {
        if ($this->empresa_id && $this->sucursal_id) {
            $this->tematicas = Tematica::where('empresa_id', $this->empresa_id)
                                    ->where('sucursal_id', $this->sucursal_id)
                                    ->get();
        } else {
            $this->tematicas = [];
        }
    }

    public function updatedSucursalId()
    {
        $this->cargarTematicas();
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
            'tematicas_id' => 'required',
            'empresa_id' => 'required', // Verifica que el ID exista
            'sucursal_id' => 'required', // Verifica que el ID exista
        ]);

        Curso::updateOrCreate(['id' => $this->cursos_id], [
            'nombre' => $this->nombre,
            'horas' => $this->horas,
            'precio' => $this->precio,
            'tipoestatus' => $this->tipoestatus,
            'modalidad' => $this->modalidad,
            'tematicas_id' => $this->tematicas_id,
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
        ]);

        // Opcional: Redirigir o mostrar un mensaje de éxito
        session()->flash('message', 'Curso actualizado con éxito.');
        return redirect()->route('verCursosSucursal'); // Cambia la ruta según sea necesario
    }

    // Método para renderizar la vista
    public function render()
    {
        return view('livewire.portal-capacitacion.cursos.cursos.admin-sucursal.editar-curso-sucursal')->layout("layouts.portal_capacitacion");
    }
}
