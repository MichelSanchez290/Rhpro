<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsCliente extends Model
{
    use HasFactory;

    protected $table = 'leads_clientes';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre_contacto', 'numero_cliente', 'fecha', 'hora', 'datos_id', 'puesto', 'correo','telefono','crmEmpresas_id','tipo'];

    public function datosfiscales()
    {
        return $this->belongsTo(DatosFiscale::class);
    }

    public function crmempresas()
    {
        return $this->belongsTo(CrmEmpresa::class);
    }

    public function headlevantamientopedido()
    {
        return $this->hasMany(headlevantamientopedido::class);
    }

    public function serviciosespecializado()
    {
        return $this->hasMany(serviciosespecializado::class);
    }

    public function traininglevantamiento()
    {
        return $this->hasMany(traininglevantamiento::class);
    }
}
