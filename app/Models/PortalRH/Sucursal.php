<?php

namespace App\Models\PortalRH;

use App\Models\User;
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

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class)->withPivot('empresa_id', 'sucursal_id', 'status');
    }

    public function departamentos() //, 'sucursal_departament', 'sucursal_id', 'departamento_id'
    {
        return $this->belongsToMany(Departamento::class,'sucursal_departament','sucursal_id','departamento_id')->withPivot('sucursal_id', 'departamento_id', 'status');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function representeLeSucursal()
    {
        return $this->hasOne(RepresentanteLeSucursal::class);
    }

    public function representeTraSucursal()
    {
        return $this->hasOne(RepresentanteTraSucursal::class);
    }

    public function RegistroPatronal()
    {
        return $this->belongsTo(RegistroPatronal::class);
    }

    public function trabajador()
    {
        return $this->hasMany(Trabajador::class);
    }

    public function becario()
    {
        return $this->hasMany(Becario::class);
    }

    public function practicante()
    {
        return $this->hasMany(Practicante::class);
    }

    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }


    public function contactoSucursal()
    {
        return $this->belongsToMany(ContactoSucursal::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    
}
