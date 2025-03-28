<?php 

namespace App\Livewire\PortalCapacitacion\Evidencias\Grupales\AdminGeneral;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PortalCapacitacion\Evidencia;
use App\Models\PortalCapacitacion\Escaneardc;
use App\Models\PortalCapacitacion\GrupocursoCapacitacion;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AgregarEvidenciasGrupalesAdmin extends Component
{
    use WithFileUploads;

    public $evidencias = []; // Almacena los archivos seleccionados
    public $evidenciasPreview = []; // Almacena las URLs temporales para previsualización
    public $documento; // Para el archivo PDF
    public $documentoPreview; // URL temporal para previsualización
    public $caps_individuales_id;
    public $participanteSeleccionado; // Nuevo: Participante elegido
    public $participantes = []; // Lista de participantes disponibles

    public function mount($id)
    {
        $this->caps_individuales_id = Crypt::decrypt($id);
        $this->cargarParticipantes();
    }

    public function cargarParticipantes()
    {
        $this->participantes = DB::table('participante_user')
            ->join('users', 'participante_user.users_id', '=', 'users.id')
            ->where('participante_user.grupocursos_capacitaciones_id', $this->caps_individuales_id)
            ->select('users.id as user_id', 'users.name')
            ->get();
    }

    public function updatedEvidencias()
    {
        $this->evidenciasPreview = []; // Limpiar previsualización
        foreach ($this->evidencias as $file) {
            $this->evidenciasPreview[] = $file->temporaryUrl(); // Genera la vista previa
        }
    }

    public function removeImage($index)
    {
        unset($this->evidencias[$index]);
        unset($this->evidenciasPreview[$index]);

        $this->evidencias = array_values($this->evidencias);
        $this->evidenciasPreview = array_values($this->evidenciasPreview);

        $this->dispatch('refreshPreview');
    }

    public function save()
    {
        $this->validate([
            'evidencias' => 'array|nullable',
            'evidencias.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'documento' => 'nullable|file|mimes:pdf|max:5120',
            'participanteSeleccionado' => 'required', // Validar que se seleccionó un participante
        ]);
    
        // 📌 Obtener el ID del participante desde la tabla pivote `participante_user`
        $participanteId = DB::table('participante_user')
            ->where('users_id', $this->participanteSeleccionado) // Selecciona el participante basado en el user_id
            ->where('grupocursos_capacitaciones_id', $this->caps_individuales_id) // Asegurar que pertenece a la capacitación
            ->value('participantes_id'); 
    
        if (!$participanteId) {
            session()->flash('error', 'Error: El participante no está registrado en esta capacitación.');
            return;
        }
    
        // 📌 Guardar cada imagen de evidencia
        $evidencias = [];
        foreach ($this->evidencias as $imagen) {
            $path = $imagen->store('evidencias', 'public');
    
            // Crear evidencia
            $evidencia = Evidencia::create([
                'evidencias' => $path,
                'status' => 'pendiente',
            ]);
    
            // Insertar en la tabla pivote `participante_evidencia`
            DB::table('participante_evidencia')->insert([
                'participantes_id' => $participanteId,
                'grupocursos_capacitaciones_id' => $this->caps_individuales_id,
                'evidencias_id' => $evidencia->id,
            ]);
    
            $evidencias[] = $evidencia;
        }
    
        // 📌 Guardar el documento PDF si existe
        if ($this->documento) {
            $pdfPath = $this->documento->store('documentos', 'public');
    
            if (!empty($evidencias)) {
                Escaneardc::create([
                    'urlEsca' => $pdfPath,
                    'grupocursos_capacitaciones_id' => $this->caps_individuales_id,
                    'evidencia_id' => $evidencias[0]->id, // Vincular con la primera evidencia
                ]);
            }
        }
    
        session()->flash('message', 'Evidencias y documento agregados exitosamente.');
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.portal-capacitacion.evidencias.grupales.admin-general.agregar-evidencias-grupales-admin', [
            'participantes' => $this->participantes
        ])->layout("layouts.portal_capacitacion");
    }
}
