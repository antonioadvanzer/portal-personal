<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posicion extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posiciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nivel'
    ];

    /**
     * 
     */
    public function getPosicionTracks()
    {
        return $this->hasMany('App\Models\Posicion_Track','posicion');
    }

    /**
     * 
     */
    public function getPermissionsPositions()
    {
        return $this->hasMany('App\Models\Permisos_Posicion','posicion');
    }

    /**
     * 
     */
    public function getLevelAssociated()
    {
        return $this->belongsTo('App\Models\Nivel','nivel');
    }
}
