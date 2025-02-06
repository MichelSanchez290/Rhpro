<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosFiscale extends Model
{
    use HasFactory;
    protected $table = 'datos_fiscales';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'razonSocial', 'rfc', 'calle', 'numeroExterior', 'numeroInterior', 'colonia', 'municipio', 'localidad', 'estado', 'pais', 'codigoPostal'];

    public function leadcliente()
    {
        return $this->hasMany(leadcliente::class);
    }
}