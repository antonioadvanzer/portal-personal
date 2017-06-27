<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellido_paterno', 'apellido_materno', 'photo', 'email', 'password', 'status', 'nomina', 'plaza', 'area', 'posicion_track', 'company', 'fecha_ingreso', 'fecha_baja', 'tipo_baja', 'motivo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 
     */
    public function getPermissionsUser()
    {
        return $this->hasMany('App\Models\Permisos_Usuario','usuario');
    }

    /**
     * 
     */
    public function getCompanyAssociated()
    {
        return $this->belongsTo('App\Models\Company','company');
    }

    /**
     * 
     */
    public function getAreaAssociated()
    {
        return $this->belongsTo('App\Models\Area','area');
    }

    /**
     * 
     */
    public function getPositionTrackAssociated()
    {
        return $this->belongsTo('App\Models\Posicion_Track','posicion_track');
    }
}
