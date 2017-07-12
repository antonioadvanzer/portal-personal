<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motivos_Ausencia extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'motivos_ausencia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','days' 
    ];

    /**
     * 
     */
    public function getSolicitudes()
    {
        return $this->hasMany('App\Models\Solicitud','motivo');
    }
}
