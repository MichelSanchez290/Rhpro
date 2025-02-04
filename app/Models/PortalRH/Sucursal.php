<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    //define que este modelo corresponde a la tabla xxx en la base de datos.
    protected $table = 'sucursales';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = [
        'id', 
        'clave_sucursal', 
        'nombre_sucursal',
        'zona_economica',
        'estado',
        'cuenta_contable',
        'rfc',
        'correo',
        'telefono',
        'status',
        'registro_patronal_id'
    ];

    public function departamentos()
    {
        return $this->belongsToMany(Departament::class, 'sucursal_departament', 'sucursal_id', 'departamento_id');
    }
    
    public function RepresentLeSucursal()
    {
        return $this->hasOne(RepresentLeSucursal::class);
    }

    public function RepresentTraSucursal()
    {
        return $this->hasOne(RepresentTraSucursal::class);
    }

    public function RegistrosPatronales()
    {
        return $this->belongsTo(RegistPatronal::class);
    }

    public function empresas()
    {
        return $this->belongsToMany(Empres::class);
    }

    

    

    public function trabajador()
    {
        return $this->hasMany(Trabajador::class);
    }

    public function becario()
    {
        return $this->hasMany(Becari::class);
    }

    public function practicantes()
    {
        return $this->hasMany(Practicant::class);
    }

    public function instructor()
    {
        return $this->hasMany(Instruct::class);
    }


    public function contactosSucursal()
    {
        return $this->belongsToMany(ContactSucursal::class);
    }
}
