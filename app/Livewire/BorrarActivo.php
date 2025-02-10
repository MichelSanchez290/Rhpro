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
            'mostraracttec' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostraractofi' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostraractuni' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostraractpape' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',
            'mostraractmob' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostraractsou' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',
            'mostrartipoactivo' => 'App\\Models\\ActivoFijo\\Tipoactivo', // Para el de TipoActivo
        ];

        // Verificar si la vista tiene un modelo asignado
        if (!array_key_exists($this->vista, $modelos)) {
            return;
        }

        $modeloClase = $modelos[$this->vista];

        // Verificar si la clase del modelo existe
        if (class_exists($modeloClase)) {
            $activo = $modeloClase::find($this->activo_id);
            
            if ($activo) {
                $activo->delete();
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
