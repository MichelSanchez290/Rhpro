<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa el modelo User

class Puest extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'puestos';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'nombre_puesto'
    ];

    public function departamentos()
    {
        return $this->belongsToMany(Departament::class, 'departament_puest');
    }

    //alcanze con el modelo User
    /* public function usuarios()
    {
        return $this->hasMany(User::class);
    } */

    
}
