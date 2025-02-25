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
            

            'mostrarnotas' =>' App\\Models\\ActivoFijo\\Notatecno'
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
