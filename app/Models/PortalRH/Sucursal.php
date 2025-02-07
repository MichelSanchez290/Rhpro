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
        return $this->belongsToMany(Departamento::class, 'sucursal_departament', 'sucursal_id', 'departamento_id');
    }

    public function RepresentLeSucursal()
    {
        return $this->hasOne(RepresentanteLeSucursal::class);
    }

    public function RepresentTraSucursal()
    {
        return $this->hasOne(RepresentanteTraSucursal::class);
    }

    public function RegistrosPatronales()
    {
        return $this->belongsTo(RegistroPatronal::class);
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class);
    }





    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class);
    }

    public function becarios()
    {
        return $this->hasMany(Becario::class);
    }

    public function practicantes()
    {
        return $this->hasMany(Practicante::class);
    }

    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }


    public function contactosSucursal()
    {
        return $this->belongsToMany(ContactoSucursal::class);
    }
}
