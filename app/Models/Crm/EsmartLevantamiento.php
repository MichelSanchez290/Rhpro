<?php

namespace App\Models\Crm;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsmartLevantamiento extends Model
{
    use HasFactory;

    protected $table = 'esmart_levantamientos';
    protected $primaryKey = 'id';

    protected $fillable = 
    ['id','fecha', 'hora', 'numero_pedido', 
    ];

    public function leadscliente()
    {
        return $this->belongsTo(LeadCliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

