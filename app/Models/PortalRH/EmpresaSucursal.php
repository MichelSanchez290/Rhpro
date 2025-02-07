<?php

namespace App\Models\PortalRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaSucursal extends Model
{
    use HasFactory;

    protected $table = 'empresa_sucursal';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'sucursal_id', 'empresa_id'];

    //estructura correcta segun laravel para hacer metodos de relaciones entre modelos
    //Modelo en singular
    //metodo en plural
    //estructura correcta segun laravel para hacer metodos de relaciones entre modelos
    //Modelo en singular
    //metodo en plural
    // public function empresas()
    // {
    //     return $this->belongsTo(Empresa::class, 'empresa_id');
    // }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

 

}
