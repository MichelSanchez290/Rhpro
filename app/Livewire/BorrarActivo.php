<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class BorrarActivo extends ModalComponent
{
    public $activo_id;
    public $vista;

    public function mount($vista, $activo_id)
    {
        $this->vista = $vista;
        $this->activo_id = $activo_id;
    }

    public function delete()
    {
        // Definir qué modelo usar basado en la vista
        $modelos = [
            // Sucursal
            'mostraractte' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostraractofi' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostraractuni' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostraractpape' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',
            'mostraractmob' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostraractsou' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',

            //Empresa
            'mostrartec' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostrarofi' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostraruni' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostrarpape' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',
            'mostrarmob' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostrarsou' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',
            'mostrartipoactivo' => 'App\\Models\\ActivoFijo\\Tipoactivo',

            //Admin
            'mostrarmobad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostrartecad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostraruniad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostrarsouad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',
            'mostrarofiad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostrarpapead' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',

            'mostrarpapead' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',
            'mostrarnotaem' => 'App\\Models\\ActivoFijo\\Notas\\Mostrarnotaem',

            'asignaciones-tec' => null,
            'asignaciones-mob' => null,
            'asignaciones-uni' => null,
            'asignaciones-ofi' => null,
            'asignaciones-pape' => null,
            'asignaciones-sou' => null,

            'asignaciones-tec-empresa' => null,
            'asignaciones-uni-empresa' => null,
            'asignaciones-ofi-empresa' => null,
            'asignaciones-pape-empresa' => null,
            'asignaciones-sou-empresa' => null,
            'asignaciones-mob-empresa' => null,

        ];

        // Verificar si la vista tiene un modelo asignado
        if (!array_key_exists($this->vista, $modelos)) {
            return;
        }

        $modeloClase = $modelos[$this->vista];

        // Verificar si la clase del modelo existe
        if (is_null($modeloClase)) {
            // Generar el nombre del evento basado en la vista
            $evento = 'deleteAsignacion' . ucfirst(str_replace('asignaciones-', '', $this->vista));
            $this->dispatch($evento, ['rowId' => $this->activo_id]);
        } else {
            // Lógica existente para modelos Eloquent
            if (class_exists($modeloClase)) {
                $activo = $modeloClase::find($this->activo_id);
                if ($activo) {
                    $activo->delete();
                }
            }
        }

        // Cerrar el modal después de eliminar
        $this->closeModal();

        // Emitir un evento para actualizar la tabla
        $this->dispatch('refreshPowerGrid');
    }

    public function render()
    {
        return view('livewire.borrar-activo');
    }
}
