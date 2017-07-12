<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jefe extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bosses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'boss', 'employed'
    ];

    /**
     * 
     */
    public function getBossAssociated()
    {
        return $this->belongsTo('App\User','boss');
    }

    /**
     * 
     */
    public function getEmployedAssociated()
    {
        return $this->belongsTo('App\User','employed');
    }
}
