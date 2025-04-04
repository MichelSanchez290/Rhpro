<?php

namespace App\Livewire\PortalCapacitacion\Capacitaciones\CapGrupales\AdminGeneral;

use Livewire\Component;
use App\Models\PortalCapacitacion\GrupocursoCapacitacion;
use App\Models\PortalCapacitacion\Curso;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\EmpresaSucursal;
use Illuminate\Support\Facades\Session;
use App\Models\PortalCapacitacion\ComparacionPuesto;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class AgregarCapacitacionesGrupales extends Component
{
    public $nombreGrupo, $nombreCapacitacion, $fechaIni, $fechaFin, $cursos_id, $objetivo_capacitacion = [];
    public $cursos = [];
    public $ocupacion_especifica, $status;
    public $usuario_id;
    public $empresa_id;
    public $sucursal_id;
    public $empresas = [];
    public $sucursales = [];
    public $camposBloqueados = [];
    public $mostrarAlertaDuplicado = false;
    public $competenciaRequerida;
    public $capacitacionExistente = null; // Añadida esta propiedad

    public function mount($id = null, $competencia = null)
    {
        $this->empresas = Empresa::all();
        $this->sucursales = [];
        
        // Autorellenar campos si vienen parámetros
        if ($competencia) {
            $this->nombreCapacitacion = $competencia;
            $this->camposBloqueados['nombreCapacitacion'] = true;
        }
        
        // Si viene el ID del usuario, obtenemos sus datos
        if ($id) {
            $this->usuario_id = Crypt::decrypt($id);
            $user = User::find($this->usuario_id);
            
            if ($user) {
                // Autorellenar empresa y sucursal del usuario seleccionado
                $this->empresa_id = $user->empresa_id;
                $this->sucursal_id = $user->sucursal_id;
                $this->camposBloqueados['empresa_id'] = true;
                $this->camposBloqueados['sucursal_id'] = true;
                
                // Cargar las sucursales de la empresa del usuario
                $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
                
                // Cargar los cursos disponibles para esa empresa y sucursal
                if ($this->empresa_id && $this->sucursal_id) {
                    $this->cursos = Curso::where('empresa_id', $this->empresa_id)
                                       ->where('sucursal_id', $this->sucursal_id)
                                       ->get();
                }
            }
        }
    }

    public function updatedEmpresaId()
    {
        // Obtener las sucursales de la empresa seleccionada usando la tabla pivote
        $this->sucursales = Empresa::find($this->empresa_id)?->sucursales ?? [];
        // Resetear la sucursal seleccionada al cambiar de empresa
        $this->sucursal_id = null;
        $this->cursos = [];
    }

    public function updatedSucursalId()
    {
        if ($this->empresa_id && $this->sucursal_id) {
            $this->cursos = Curso::where('empresa_id', $this->empresa_id)
                                       ->where('sucursal_id', $this->sucursal_id)
                                       ->get();
        } else {
            $this->cursos = [];
        }
    }
    public function agregarCapacitacionGrupal($ignorarDuplicado = false)
    {
        $this->validate([
            'nombreGrupo' => 'required|string|max:255',
            'nombreCapacitacion' => 'required|string|max:255',
            'fechaIni' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaIni',
            'cursos_id' => 'required|exists:cursos,id',
            'objetivo_capacitacion' => 'required|string',
            'status' => 'required',
            'ocupacion_especifica' => 'required|string|max:255',
            'empresa_id' => 'required|exists:empresas,id',
            'sucursal_id' => 'required|exists:sucursales,id',
        ]);
    
        // Verificar duplicado solo si no estamos ignorando
        if (!$ignorarDuplicado) {
            $existente = GrupocursoCapacitacion::with(['empresa', 'sucursal', 'curso'])
                ->where('nombreCapacitacion', $this->nombreCapacitacion)
                ->where('empresa_id', $this->empresa_id)
                ->where('sucursal_id', $this->sucursal_id)
                ->first();
    
            if ($existente) {
                $this->capacitacionExistente = $existente;
                $this->mostrarAlertaDuplicado = true;
                return;
            }
        }
    
        // Crear la capacitación
        $capacitacion = GrupocursoCapacitacion::create([
            'nombreGrupo' => $this->nombreGrupo,
            'nombreCapacitacion' => $this->nombreCapacitacion,
            'fechaIni' => $this->fechaIni,
            'fechaFin' => $this->fechaFin,
            'cursos_id' => $this->cursos_id,
            'objetivo_capacitacion' => $this->objetivo_capacitacion,
            'ocupacion_especifica' => $this->ocupacion_especifica,
            'status' => $this->status,
            'empresa_id' => $this->empresa_id,
            'sucursal_id' => $this->sucursal_id,
        ]);
    
        // Asignar los cursos (si hay una relación muchos a muchos)
        if (method_exists($capacitacion, 'cursos')) {
            $capacitacion->cursos()->sync($this->cursos_id);
        }
    
        // Actualizar `capacitacion_asignada` en ComparacionPuesto
       $comparacion = ComparacionPuesto::where('competencias_requeridas', $this->nombreCapacitacion)
                                ->where('users_id', $this->usuario_id)
                                ->first();

        if ($comparacion) {
            $comparacion->capacitacion_asignada = 1;
            $comparacion->save();
        }

    
        // Limpiar y mostrar mensaje
        $this->reset([
            'nombreGrupo', 'nombreCapacitacion', 'fechaIni', 'fechaFin', 
            'cursos_id', 'objetivo_capacitacion', 'ocupacion_especifica', 
            'status', 'empresa_id', 'sucursal_id', 'mostrarAlertaDuplicado', 
            'capacitacionExistente'
        ]);
    
        Session::flash('success', 'Capacitación grupal creada correctamente.');
    }
    
    public function continuarConRegistro()
    {
        $this->mostrarAlertaDuplicado = false;
        $this->agregarCapacitacionGrupal(true); // Pasamos true para ignorar duplicados
    }

    public function render()
    {
        return view('livewire.portal-capacitacion.capacitaciones.cap-grupales.admin-general.agregar-capacitaciones-grupales', [
            'cursos' => $this->cursos,
            'empresas' => $this->empresas,
            'sucursales' => $this->sucursales,
        ])->layout("layouts.portal_capacitacion");
    }
}
