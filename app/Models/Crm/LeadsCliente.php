<?php

namespace App\Models\Crm;

use App\Models\User;
use App\Models\Crm\DatosFiscale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsCliente extends Model
{
    use HasFactory;

    protected $table = 'leads_clientes';

    //Define la clave primaria
    protected $primaryKey = 'id';

    //especifica las columnas
    protected $fillable = ['id', 'nombre_contacto', 'users_id','numero_cliente', 'fecha', 'hora', 'datos_id', 'puesto', 'correo','telefono','tipo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function datosfiscales()
    {
        return $this->belongsTo(DatosFiscale::class);
    }

    public function headlevantamientospedido()
    {
        return $this->hasMany(HeadLevantamientosPedido::class);
    }

    public function serviciosespecializado()
    {
        return $this->hasMany(ServiciosEspecializado::class);
    }

    public function traininglevantamiento()
    {
        return $this->hasMany(TrainingLevantamiento::class);
    }
}
