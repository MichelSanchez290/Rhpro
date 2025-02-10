<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ActivoFijo\Activos\ActivoMobiliario;
use App\Models\ActivoFijo\Activos\ActivoOficina;
use App\Models\ActivoFijo\Activos\ActivoPapeleria;
use App\Models\ActivoFijo\Activos\ActivoSouvenir;
use App\Models\ActivoFijo\Activos\ActivoTecnologia;
use App\Models\ActivoFijo\Activos\ActivoUniforme;
use App\Models\Encuestas360\Asignacion;
use App\Models\PortalCapacitacion\PerfilPuesto;
use App\Models\PortalRH\Becari;
use App\Models\PortalRH\Becario;
use App\Models\PortalRH\Empres;
use App\Models\PortalRH\Empresa;
use App\Models\PortalRH\Sucursal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password',
        'empresa_id',
        'sucursal_id',
        'tipo_user'
    ];

    /**sucursal_id
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function becarios()
    {
        return $this->hasMany(Becario::class);
    }

    
    public function activomoviliario()
    {
        return $this->belongsToMany(ActivoMobiliario::class);
    }
    public function activooficina()
    {
        return $this->belongsToMany(ActivoOficina::class);
    }
    public function activopapeleria()
    {
        return $this->belongsToMany(ActivoPapeleria::class);
    }
    public function activosouvenir()
    {
        return $this->belongsToMany(ActivoSouvenir::class);
    }
    public function activotecnologias()
    {
        return $this->belongsToMany(ActivoTecnologia::class);
    }
    public function activouniformes()
    {
        return $this->belongsToMany(ActivoUniforme::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class); // Una venta pertenece a un cliente
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class); // Una venta pertenece a un cliente
    }

    public function perfiles_puestos()
    {
        return $this->belongsToMany(PerfilPuesto::class, 'perfil_puesto_user', 'users_id', 'perfiles_puestos_id'); // Modelo relacionado
    }


    public function asignacion()
    {
        //un user peertence a un becario
        return $this->hasMany(Asignacion::class);
    }

}
