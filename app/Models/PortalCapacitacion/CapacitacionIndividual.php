<?php

namespace App\Models\PortalCapacitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PortalCapacitacion\Curso;
use App\Models\PortalCapacitacion\Evidencia;
use App\Models\User;

class CapacitacionIndividual extends Model
{
    use HasFactory;
    
    // Especificar la tabla en la base de datos
    protected $table = 'caps_individuales';

    // Definir la clave primaria
    protected $primaryKey = 'id';

    // Columnas asignables masivamente
    protected $fillable = ['id','fechaIni', 'fechaFin', 'nombreCapacitacion', 'objetivoCapacitacion', 'cursos_id'];

    public function curso()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function evidencias()
    {
        return $this->belongsToMany(Evidencia::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'cap_individual_user', 'caps_individuales_id', 'users_id');
    }


}
