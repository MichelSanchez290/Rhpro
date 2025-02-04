<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmEmpresa extends Model
{
    use HasFactory;

    protected $table = 'crm_empresas';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre', 'tamano_empresa', 'pagina_web', 'logotipo'];

    public function leadscliente()
    {
        return $this->hasMany(leadscliente::class);
    }
}