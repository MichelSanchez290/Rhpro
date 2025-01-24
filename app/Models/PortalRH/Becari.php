<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa el modelo User

class Becari extends Model
{
    use HasFactory;

    use HasFactory;
    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'becarios';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'clave_becario', 
        'numero_seguridad_social',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'estado',
        'codigo_postal',
        'ocupacion',
        'sexo',
        'curp',
        'rfc',
        'numero_celular',
        'fecha_ingreso',
        'status',
        'calle',
        'colonia',
        'user_id',
        'sucursal_id',
        'departamento_id'
    ];

    //alcanze con el modelo 
    public function usuarios()
    {
        //un becario pertenece a un user
        return $this->belongsTo(User::class);
    }

    public function sucursales()
    {
        //cada trabajador pertenece a 
        return $this->belongsTo(Sucursal::class);
    }

    public function departamentos()
    {
        //cada trabajador pertenece a 
        return $this->belongsTo(Departament::class);
    }
}
