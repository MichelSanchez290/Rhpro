<?php

namespace App\Livewire\Dx035\Encuestas;

use Livewire\Component;

use App\Models\Dx035\Encuesta;
use App\Models\Dx035\GiaReferencia; // Si necesitas seleccionar un GIA en la encuesta

class AgregarEncuesta extends Component
{
    public $Clave, $Empresa, $RutaLogo, $FechaInicio, $Caducidad, $Estado, $NumeroEncuestas;
    public $Formato, $EncuestasContestadas, $Actividades, $Numero, $Dep, $Cerrable, $usuariosdx035_CorreoElectronico;
    public $FechaFinal, $giasreferencia_id;
    // $departamentosSeleccionados = []; // Para departamentos
    public $GiaActivo = false; // Control para GIA
    public $logo; // Para cargar la imagen del logo

    protected $rules = [
        'Clave' => 'required|string',
        'Empresa' => 'required|string',
        'FechaInicio' => 'required|date',
        'Caducidad' => 'required|date',
        'Estado' => 'required|integer',
        'NumeroEncuestas' => 'required|integer',
        'Formato' => 'required|string',
        'EncuestasContestadas' => 'required|string',
        'Actividades' => 'required|string',
        'Numero' => 'required|integer',
        'Dep' => 'required|string',
        'Cerrable' => 'required|boolean',
        'usuariosdx035_CorreoElectronico' => 'required|string',
        'FechaFinal' => 'nullable|date',
        'giasreferencia_id' => 'nullable|exists:gias_referencias,id',
        'logo' => 'nullable|image|max:1024', // Validación de logo
    ];

    public function submit()
    {
        $this->validate();

        // Subir logo
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
            'Dep' => $this->Dep,
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
       // $departamentos = Departamento::all(); // Suponiendo que tienes una tabla de departamentos

        return view('livewire.dx035.encuestas.agregar-encuesta', compact('giasReferencias'))
            ->layout('layouts.dx035');
    }
}
