<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estados_Requisicion extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estados_requisicion';
     
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'description', 
    ];

    /**
     * 
     */
     public function getRequisiciones()
     {
         return $this->hasMany('App\Models\Requisicion','status');
     }
}
