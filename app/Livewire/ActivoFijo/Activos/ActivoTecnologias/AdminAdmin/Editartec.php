<?php

namespace App\Livewire\ActivoFijo\Activos\ActivoTecnologias\AdminAdmin;

use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Anioestimado;
use App\Models\ActivoFijo\Tipoactivo;
use App\Models\PortalRH\Empresa;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Editartec extends Component
{
    use WithFileUploads;
    public $activo; // Datos del activo a editar
    public $empresas, $sucursalesFiltradas;
    public $tipos = [], $anios = [];
    public $subirfoto1, $subirfoto2, $subirfoto3;
    public $foto1, $foto2, $foto3;
    public $empresaSeleccionada;

    protected $rules = [
        'activo.nombre' => 'required',
        'activo.descripcion' => 'required',
        'activo.num_serie' => 'required',
        'activo.num_activo' => 'required',
        'activo.ubicacion_fisica' => 'required',
        'activo.fecha_adquisicion' => 'required',
        'activo.fecha_baja' => 'nullable|date',
        'activo.tipo_activo_id' => 'required',
        'activo.precio_adquisicion' => 'required',
        'activo.aniosestimado_id' => 'required',
        'activo.empresa_id' => 'required',
        'activo.sucursal_id' => 'required',
    ];

    protected $messages = [
        'activo.nombre.required' => 'Nombre es requerido',
        'activo.descripcion.required' => 'Descripcion es requerido',
        'activo.num_serie.required' => 'Numero de serie es requerido',
        'activo.num_activo.required' => 'Numero activo es requerido',
        'activo.ubicacion_fisica.required' => 'Ubicacion es requerido',
        'activo.fecha_adquisicion.required' => 'Fecha es requerido',
        'activo.tipo_activo_id.required' => 'Tipo es requerido',
        'activo.precio_adquisicion.required' => 'Precio es requerido',
        'activo.aniosestimado_id.required' => 'Año es requerido',
        'activo.empresa_id.required' => 'La empresa es requerida',
        'activo.sucursal_id.required' => 'La sucursal es requerida',
    ];

    public function mount($id)
    {
        // Cargar el activo a editar
        $this->activo = ActivoTecnologia::findOrFail($id)->toArray();
        
        $this->foto1 = $this->activo['foto1'];
        $this->foto2 = $this->activo['foto2'];
        $this->foto3 = $this->activo['foto3'];

        // Cargar empresas y sucursales
        $this->empresas = Empresa::all();

        // Obtener las sucursales relacionadas con la empresa del activo
        $empresa = Empresa::find($this->activo['empresa_id']);
        $this->sucursalesFiltradas = $empresa ? $empresa->sucursales : collect();

        // Cargar tipos de activo y años estimados
        $this->tipos = Tipoactivo::pluck('nombre_activo', 'id')->toArray();
        $this->anios = Anioestimado::pluck('vida_util_año', 'id')->toArray();

        // Establecer la empresa seleccionada
        $this->empresaSeleccionada = $this->activo['empresa_id'];
    }

    public function updatedEmpresaSeleccionada($empresaId)
    {
        // Filtrar sucursales según la empresa seleccionada
        $empresa = Empresa::find($empresaId);
        $this->sucursalesFiltradas = $empresa ? $empresa->sucursales : collect();
    }

    public function editar()
    {
        $this->validate([
            'subirfoto1' => 'nullable|image|max:2048',
            'subirfoto2' => 'nullable|image|max:2048',
            'subirfoto3' => 'nullable|image|max:2048',
        ]);
        // Asignar la empresa seleccionada al activo
        $this->activo['empresa_id'] = $this->empresaSeleccionada;
        // Guardar imágenes si fueron subidas
        // Manejo de imágenes
        if ($this->subirfoto1) {
            // Eliminar la imagen anterior si existe
            if ($this->foto1 && Storage::disk('subirDocs')->exists($this->foto1)) {
                Storage::disk('subirDocs')->delete($this->foto1);
            }

            // Guardar la nueva imagen
            $this->subirfoto1->storeAs('ImagenTecnologia1', $this->activo['nombre'] . "-imagen1.png", 'subirDocs');
            $this->activo['foto1'] = "ImagenTecnologia1/" . $this->activo['nombre'] . "-imagen1.png";
        }

        if ($this->subirfoto2) {
            // Eliminar la imagen anterior si existe
            if ($this->foto2 && Storage::disk('subirDocs')->exists($this->foto2)) {
                Storage::disk('subirDocs')->delete($this->foto2);
            }

            // Guardar la nueva imagen
            $this->subirfoto2->storeAs('ImagenTecnologia2', $this->activo['nombre'] . "-imagen2.png", 'subirDocs');
            $this->activo['foto2'] = "ImagenTecnologia2/" . $this->activo['nombre'] . "-imagen2.png";
        }

        if ($this->subirfoto3) {
            // Eliminar la imagen anterior si existe
            if ($this->foto3 && Storage::disk('subirDocs')->exists($this->foto3)) {
                Storage::disk('subirDocs')->delete($this->foto3);
            }

            // Guardar la nueva imagen
            $this->subirfoto3->storeAs('ImagenTecnologia3', $this->activo['nombre'] . "-imagen3.png", 'subirDocs');
            $this->activo['foto3'] = "ImagenTecnologia3/" . $this->activo['nombre'] . "-imagen3.png";
        }
        // Crear una nueva instancia de Sale y asignar los valores
        ActivoTecnologia::find($this->activo['id'])->update($this->activo);

        // Redirigir a la vista de mostrar
        return redirect()->route('mostrartecad');
    }
    public function render()
    {
        return view('livewire.activo-fijo.activos.activo-tecnologias.admin-admin.editartec')->layout('layouts.navactivos');
    }
}
