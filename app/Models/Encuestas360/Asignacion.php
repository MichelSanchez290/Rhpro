<?php

namespace App\Models\Encuestas360;

use App\Models\PortalRH\Empres;
use App\Models\PortalRH\Sucursal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'calificador_id',
        'calificado_id',
        'relaciones_id',
        '360_encuestas_id',
        'realizada',
        'fecha',
        'empresa_id',   // Agregar si tienes esta columna en la tabla
        'sucursal_id',   // Agregar si tienes esta columna en la tabla

    ];

    public function calificador()
    {
        return $this->belongsTo(User::class, 'calificador_id');
    }

    public function calificado()
    {
        return $this->belongsTo(User::class, 'calificado_id');
    }

    public function relacion()
    {
        return $this->belongsTo(Relacion::class, 'relaciones_id');
    }

    public function encuesta()
    {
        return $this->belongsTo(Encuesta360::class, '360_encuestas_id');
    }

     // Nueva relación directa con Empresa
     public function empresa()
     {
         return $this->belongsTo(Empres::class, 'empresa_id');
     }
 
     // Nueva relación directa con Sucursal
     public function sucursal()
     {
         return $this->belongsTo(Sucursal::class, 'sucursal_id');
     }
 
     // Relación con Empresa a través del calificador
     public function empresaCalificador()
     {
         return $this->hasOneThrough(
             Empres::class,
             User::class,
             'id',
             'id',
             'calificador_id',
             'empresa_id'
         );
     }
 
     // Relación con Sucursal a través del calificador
     public function sucursalCalificador()
     {
         return $this->hasOneThrough(
             Sucursal::class,
             User::class,
             'id',
             'id',
             'calificador_id',
             'sucursal_id'
         );
     }
 
    
}

