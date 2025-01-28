<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Dx035\Encuesta;
use App\Models\Dx035\GiaReferencia;
use App\Models\PortalRH\Departament;

class AgregarEncuesta extends Component
{
    use WithFileUploads;

    public $Clave, $Empresa, $RutaLogo, $FechaInicio, $Caducidad, $Estado, $NumeroEncuestas;
    public $Formato, $EncuestasContestadas, $Actividades, $Numero, $Dep, $Cerrable, $usuariosdx035_CorreoElectronico;
    public $FechaFinal, $giasreferencia_id, $departamentosSeleccionados = [];
    public $GiaActivo = false;
    public $logo;

    protected $rules = [
        'Clave' => 'required|string|unique:encuestas,Clave',
        'Empresa' => 'required|string',
        'FechaInicio' => 'required|date',
        'Caducidad' => 'required|date|after_or_equal:FechaInicio',
        'Estado' => 'required|integer',
        'NumeroEncuestas' => 'required|integer|min:1',
        'Formato' => 'required|string',
        'EncuestasContestadas' => 'nullable|string',
        'Actividades' => 'nullable|string',
        'Numero' => 'nullable|integer',
        'Dep' => 'nullable|string',
        'Cerrable' => 'required|boolean',
        'usuariosdx035_CorreoElectronico' => 'required|email',
        'FechaFinal' => 'nullable|date|after_or_equal:FechaInicio',
        'giasreferencia_id' => 'nullable|exists:gias_referencias,id',
        'departamentosSeleccionados' => 'required|array|min:1',
        'departamentosSeleccionados.*' => 'exists:departamentos,id',
        'logo' => 'nullable|image|max:1024',
    ];

    public $cuestionariosSeleccionados = [
        1 => true,  // El primer cuestionario está activado por defecto
        2 => false,
        3 => false
    ];

    public function submit()
    {
        $this->validate();

        if ($this->logo) {
            $this->RutaLogo = $this->logo->store('logos', 'public');
        }

        Encuesta::create([
            'Clave' => $this->Clave,
            'Empresa' => $this->Empresa,
            'RutaLogo' => $this->RutaLogo,
            'FechaInicio' => $this->FechaInicio,
            'Caducidad' => $this->Caducidad,
            'Estado' => $this->Estado,
            'NumeroEncuestas' => $this->NumeroEncuestas,
            'Formato' => $this->Formato,
            'EncuestasContestadas' => $this->EncuestasContestadas,
            'Actividades' => $this->Actividades,
            'Numero' => $this->Numero,
            'Dep' => implode(',', $this->departamentosSeleccionados),
            'Cerrable' => $this->Cerrable,
            'usuariosdx035_CorreoElectronico' => $this->usuariosdx035_CorreoElectronico,
            'FechaFinal' => $this->FechaFinal,
            'giasreferencia_id' => $this->GiaActivo ? $this->giasreferencia_id : null,
        ]);

        session()->flash('message', 'Encuesta agregada correctamente.');
        return redirect()->route('encuesta.index');
    }

    public function render()
    {
        $giasReferencias = GiaReferencia::all();
        $departamentos = Departament::all();

        return view('livewire.dx035.encuestas.agregar-encuesta', compact('giasReferencias', 'departamentos'))
            ->layout('layouts.dx035');
    }
}
