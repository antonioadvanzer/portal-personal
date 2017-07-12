<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'access'
    ];

    /**
     * 
     */
    public function getPermissionsByArea()
    {
        return $this->hasMany('App\Permisos_Area','permiso');
    }

    /**
     * 
     */
    public function getPermissionsByPosition()
    {
        return $this->hasMany('App\Permisos_Posicion','permiso');
    }

    /**
     * 
     */
    public function getPermissionsByUser()
    {
        return $this->hasMany('App\Permisos_Usuario','permiso');
    }
}
