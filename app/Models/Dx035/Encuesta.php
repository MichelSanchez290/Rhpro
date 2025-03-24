<?php

namespace App\Models\Dx035;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PortalRH\SucursalDepartament;
use App\Models\PortalRH\SucursalDepartamento;
use App\Models\Dx035\Sucursal;

class Encuesta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Especificar que la clave primaria es 'Clave'
    protected $table = 'encuestas';

    // public $incrementing = false;   // Indicar que no es autoincremental
    //protected $keyType = 'string';  // Especificar el tipo de la clave primaria

     // Especificar los campos de fecha
    protected $dates = [
        'FechaInicio',
        'FechaFinal',
        'Caducidad',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id',
        'Clave',
        'Empresa',
        'sucursal_departament_id',
        'RutaLogo',
        'FechaInicio',
        'FechaFinal',
        'Caducidad',
        'Estado',
        'NumeroEncuestas',
        'cuestionario_id', // Agregar el campo cuestionario_id
        'EncuestasContestadas',
        'Actividades',
        'Numero',
        'Dep',
        'Cerrable',
        'usuariosdx035_CorreoElectronico',
    ];

    // Relación con SucursalDepartament
    // public function sucursalDepartament()
    // {
    //     return $this->belongsTo(SucursalDepartament::class, 'sucursal_departament_id');
    // }

    // Relación con Cuestionario
    public function cuestionarios()
    {
        return $this->belongsToMany(Cuestionario::class, 'encuesta_cuestionario', 'encuesta_id', 'cuestionario_id');
    }

    // Método para calcular el avance de la encuesta
    public function calcularAvance()
    {
        if ($this->NumeroEncuestas > 0) {
            return ($this->EncuestasContestadas / $this->NumeroEncuestas) * 100;
        }
        return 0;
    }

    // Relación con Departament
    public function departamento()
    {
        return $this->belongsTo(Departament::class, 'Dep', 'id');
    }

    // Relación con TrabajadorEncuesta
    public function datoTrabajadores()
    {
        return $this->hasMany(DatoTrabajador::class, 'encuestas_id');
    }

    // Relación con la empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    // Relación con la sucursal
    public function sucursalDepartamento()
    {
        return $this->belongsTo(SucursalDepartamento::class, 'sucursal_departament_id');
    }

    public function sucursal()
    {
        return $this->hasOneThrough(
            Sucursal::class,
            SucursalDepartamento::class,
            'id', // Foreign key on SucursalDepartamento table
            'id', // Foreign key on Sucursal table
            'sucursal_departament_id', // Local key on Encuesta table
            'sucursal_id' // Local key on SucursalDepartamento table
        );
    }

}
