<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permisos_Posicion extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos_posicion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permiso', 'posicion'
    ];

    /**
     * 
     */
    public function getPermissionAssociated()
    {
        return $this->belongsTo('App\Models\Permiso','permiso');
    }

    /**
     * 
     */
    public function getPositionAssociated()
    {
        return $this->belongsTo('App\Models\Posicion','posicion');
    }
}
