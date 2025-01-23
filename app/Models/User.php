<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    ];

    /**
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


    
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function cambioSalario()
    {
        //un user peertence a un becario
        return $this->belongsToMany(Becari::class);
    }

    public function incidencias()
    {
        //un becario pertenece a un user
        return $this->belongsToMany(Incidenci::class);
    }

    public function documentos()
    {
        //un user peertence a un becario
        return $this->belongsToMany(Document::class);
    }

    public function bajas()
    {
        //un user tiene una baja
        return $this->hasMany(Baja::class);
    }

    public function infonavitCreditos()
    {
        //un user peertence a un becario
        return $this->hasMany(Practicant::class);
    }

    public function retardos()
    {
        //un becario pertenece a un user
        return $this->belongsToMany(Retard::class);
    }

    public function incapacidades()
    {
        //un becario pertenece a un user
        return $this->belongsToMany(Incapacidad::class);
    }

    public function regPatronales()
    {
        //cada trabajador pertenece a 
        return $this->hasMany(RegisPatronal::class);
    }

    public function departamentos()
    {
        return $this->belongsTo(Departament::class);
    }

    public function puesto()
    {
        return $this->belongsTo(Puest::class);
    }

    public function trabajador()
    {
        //un user peertence a un becario
        return $this->hasMany(Trabajador::class);
    }

    public function becario()
    {
        //un user peertence a un becario
        return $this->hasMany(Becari::class);
    }

    public function practicantes()
    {
        //un user peertence a un becario
        return $this->hasMany(Practicant::class);
    }

    */
}
