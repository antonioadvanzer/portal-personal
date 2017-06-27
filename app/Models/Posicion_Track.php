<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posicion_Track extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posiciones_tracks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'track', 'posicion'
    ];

    /**
     * 
     */
    public function getUsers()
    {
        return $this->hasMany('App\User','posicion_track');
    }

    /**
     * 
     */
    public function getTrackAssociated()
    {
        return $this->belongsTo('App\Models\Track','track');
    }

    /**
     * 
     */
    public function getPosicionAssociated()
    {
        return $this->belongsTo('App\Models\Posicion','posicion');
    }
}
