<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

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
        //dd($this->vista, $this->activo_id, $modelos[$this->vista]);
        // Definir qué modelo o tabla usar basado en la vista
        $modelos = [
            // Sucursal
            'mostraractte' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostraractofi' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostraractuni' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostraractpape' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',
            'mostraractmob' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostraractsou' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',
            'mostrarnotassu' => 'App\\Models\\ActivoFijo\\Notatecno',

            // Empresa
            'mostrartec' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostrarofi' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostraruni' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostrarpape' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',
            'mostrarmob' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostrarsou' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',
            'mostrartipoactivo' => 'App\\Models\\ActivoFijo\\Tipoactivo',
            'mostrarnotasem' => 'App\\Models\\ActivoFijo\\Notatecno',

            // Admin
            'mostrarmobad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoMobiliario',
            'mostrartecad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoTecnologia',
            'mostraruniad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoUniforme',
            'mostrarsouad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoSouvenir',
            'mostrarofiad' => 'App\\Models\\ActivoFijo\\Activos\\ActivoOficina',
            'mostrarpapead' => 'App\\Models\\ActivoFijo\\Activos\\ActivoPapeleria',

            'mostrarnotasad' => 'App\\Models\\ActivoFijo\\Notatecno',

            // Asignaciones (tablas pivote)
            'asignaciones-tec' => 'activos_tecnologia_user',
            'asignaciones-mob' => 'activos_mobiliario_user',
            'asignaciones-uni' => 'activos_uniforme_user',
            'asignaciones-ofi' => 'activos_oficina_user',
            'asignaciones-pape' => 'activos_papeleria_user',
            'asignaciones-sou' => 'activos_souvenir_user',

            'asignaciones-tec-empresa' => 'activos_tecnologia_user',
            'asignaciones-uni-empresa' => 'activos_uniforme_user',
            'asignaciones-ofi-empresa' => 'activos_oficina_user',
            'asignaciones-pape-empresa' => 'activos_papeleria_user',
            'asignaciones-sou-empresa' => 'activos_souvenir_user',
            'asignaciones-mob-empresa' => 'activos_mobiliario_user',
            
            'asignaciones-tec-sucursal' => 'activos_tecnologia_user',
            'asignaciones-uni-sucursal' => 'activos_uniforme_user',
            'asignaciones-ofi-sucursal' => 'activos_oficina_user',
            'asignaciones-pape-sucursal' => 'activos_papeleria_user',
            'asignaciones-sou-sucursal' => 'activos_souvenir_user',
            'asignaciones-mob-sucursal' => 'activos_mobiliario_user',

            'asignaciones-tec-usuario' => 'activos_tecnologia_user',
        ];

        // Verificar si la vista existe en el arreglo
        if (!array_key_exists($this->vista, $modelos)) {
            return;
        }

        $modeloOTabla = $modelos[$this->vista];

        // Si es un modelo Eloquent (activos)
        if (class_exists($modeloOTabla)) {
            $activo = $modeloOTabla::find($this->activo_id);
            if ($activo) {
                $activo->delete();
            }
        }
        // Si es una tabla pivote (asignaciones)
        else {
            DB::table($modeloOTabla)
                ->where('id', $this->activo_id)
                ->delete();
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