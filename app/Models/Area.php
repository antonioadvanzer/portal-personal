<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{   
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'direccion'
    ];

    /**
     * Join each user to area.
     */
    public function getUsers()
    {
        return $this->hasMany('App\User','area');
    }

    /**
     * Join each permission to area.
     */
    public function getPermissionsArea()
    {
        return $this->hasMany('App\Models\Permisos_Area','area');
    }

    /**
     * Join each area to directions.
     */
    public function getDirectionAssociated()
    {
        return $this->belongsTo('App\Models\Direccion','direccion');
    }
}
