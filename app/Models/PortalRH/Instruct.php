<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa el modelo User

class Instruct extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'instructores';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'telefono1', 
        'telefono2',
        'registroStps',
        'rfc',
        'regimen',
        'estado',
        'municipio',
        'codigopostal',
        'colonia',
        'calle',
        'numero',
        'honorarios',
        'status',
        'dc5',
        'cuentabancaria',
        'ine',
        'curp',
        'sat',
        'domicilio',
        'tipoinstructor',
        'nombre_empresa',
        'rfc_empre',
        'calle_empre',
        'numero_empre',
        'colonia_empre',
        'municipio_empre',
        'estado_empre',
        'postal_empre',
        'regimen_empre',
        'user_id',
        'sucursal_id',
        'departamento_id',
    ];

    //alcanze con el modelo 
    public function usuarios()
    {
        //cada trabajador pertenece a 
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
