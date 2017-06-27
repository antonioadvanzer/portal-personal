<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permisos_Area extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos_area';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permiso', 'area'
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
    public function getAreaAssociated()
    {
        return $this->belongsTo('App\Models\Area','area');
    }
}
