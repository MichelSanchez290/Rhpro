<?php

namespace App\Livewire\PortalRh\Instructor;

use Livewire\Component;
use App\Models\PortalRH\Instructor;
use App\Models\User;
use App\Models\PortalRH\RegistroPatronal;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use App\Models\PortalRH\Departamento;
use App\Models\PortalRH\Puesto;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class CardInstructor extends Component
{
    public $instructor, $usuario, $empresa, $sucursal, $departamento,
    $puesto, $registro_patronal, $incapacidades, $incidencias, $retardos, 
    $cambio_salarios, $documentos, $infonavit_creditos;

    public function mount($id)
    {
        $id = Crypt::decrypt($id);
        $this->instructor = Instructor::findOrFail($id);
        $this->usuario = User::find($this->instructor->user_id);
        $this->empresa = Empresa::find($this->usuario->empresa_id);
        $this->sucursal = Sucursal::find($this->usuario->sucursal_id);
        $this->departamento = Departamento::find($this->usuario->departamento_id);
        $this->puesto = Puesto::find($this->usuario->puesto_id);
        $this->registro_patronal = RegistroPatronal::find($this->instructor->registro_patronal_id);
        $this->incapacidades = $this->usuario->incapacidades()->with('users')->get();
        $this->incidencias = $this->usuario->incidencias()->with('users')->get();
        $this->retardos = $this->usuario->retardos()->with('users')->get();
        $this->cambio_salarios = $this->usuario->cambioSalario()->with('users')->get();
        $this->documentos = $this->usuario->documentos()->with('users')->get();
        $this->infonavit_creditos = $this->usuario->infonavit()->with('user')->get();
    } 

    public function generatePDF($id)
    {
        // Obtener el becario
        $instructor = Instructor::findOrFail($id);

        // Obtener las relaciones
        $usuario = User::find($instructor->user_id);
        $empresa = Empresa::find($usuario->empresa_id);
        $sucursal = Sucursal::find($usuario->sucursal_id);
        $departamento = Departamento::find($usuario->departamento_id);
        $puesto = Puesto::find($usuario->puesto_id);
        $registro_patronal = RegistroPatronal::find($instructor->registro_patronal_id);
        $incapacidades = $this->usuario->incapacidades()->with('users')->get();
        $incidencias = $this->usuario->incidencias()->with('users')->get();
        $retardos = $this->usuario->retardos()->with('users')->get();
        $cambio_salarios = $this->usuario->cambioSalario()->with('users')->get();
        $documentos = $this->usuario->documentos()->with('users')->get();
        $infonavit_creditos = $this->usuario->infonavit()->with('user')->get();

        // Generar el PDF con todos los datos
        $pdf = Pdf::setPaper('letter')
            ->setOptions([
                'dpi' => 150,
                'isRemoteEnabled' => true,
            ])
            ->loadView('livewire.portal-rh.instructor.reporte-instructor', [
                'instructor' => $instructor,
                'usuario' => $usuario,
                'empresa' => $empresa,
                'sucursal' => $sucursal,
                'departamento' => $departamento,
                'puesto' => $puesto,
                'registro_patronal' => $registro_patronal,
                'incapacidades' => $incapacidades,
                'incidencias' => $incidencias,
                'retardos' => $retardos,
                'cambio_salarios' => $cambio_salarios,
                'infonavit_creditos' => $infonavit_creditos,
            ]);

        return Response::stream(
            function () use ($pdf) {
                echo $pdf->output();
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=Reporte_' . $usuario->name . '.pdf',
            ]
        );

        return redirect()->refresh();
    }

    public function render()
    {
        return view('livewire.portal-rh.instructor.card-instructor')->layout('layouts.client');
    }
}
