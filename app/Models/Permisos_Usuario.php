<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permisos_Usuario extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permiso', 'usuario'
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
    public function getUsuarioAssociated()
    {
        return $this->belongsTo('App\User','usuario');
    }
}
