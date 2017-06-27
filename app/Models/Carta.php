<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carta extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'letter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'receiver', 'sueldo', 'imss', 'rfc', 'curp', 'antiguedad', 'puesto', 'domicilio_particular', 'observations'
    ];

    /**
     * 
     */
    public function getEmployedAssociated()
    {
        return $this->belongsTo('App\User','user');
    }
}
