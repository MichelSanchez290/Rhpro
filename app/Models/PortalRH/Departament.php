<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa el modelo User

class Departament extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla departmtos en la base de datos.
    protected $table = 'departamentos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre_departamento'];




    public function sucursal()
    {
        return $this->belongsToMany(Sucursal::class, 'sucursal_departament', 'departamento_id', 'sucursal_id');
    }


    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function becario()
    {
        return $this->hasMany(Becari::class);
    }

    public function trabajador()
    {
        return $this->hasMany(Trabajador::class);
    }

    public function practicantes()
    {
        return $this->hasMany(Practicant::class);
    }

    public function instructor()
    {
        return $this->hasMany(Instruct::class);
    }


    public function puestos()
    {
        return $this->belongsToMany(Puest::class, 'departament_puest');
    }
    
}
