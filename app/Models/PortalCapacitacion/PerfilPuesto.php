<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilPuesto extends Model
{
    use HasFactory;
    // Especificar la tabla en la base de datos
    protected $table = 'perfiles_puestos';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id', 
            'nombre_puesto',
            'area', 
            'proceso',
            'mision',
            'puesto_reporta',
            'puestos_que_le_reportan',
            'suplencia',
            'rango_toma_desicones',
            'desiciones_directas',
            'rango_edad_desable',
            'sexo_preferente',
            'estado_civil_deseable',
            'escolaridad',
            'idioma_requerido',
            'experiencia_requerida',
            'nivel_riesgo_fisico',
            'elaboro_nombre',
            'elaboro_puesto',
            'reviso_nombre',
            'reviso_puesto',
            'autorizo_nombre',
            'autorizo_puesto',
            'status',
    ];
}
