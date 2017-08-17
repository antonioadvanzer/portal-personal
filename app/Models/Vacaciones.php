<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacaciones extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vacaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'type', 'accumulated_days', 'increased_days', 'corresponding_days', 'start_date', 'close_date', 'expiration_date', 'year', 'status'
    ];

    /**
     * Join each area to directions.
     */
    public function getUserAssociated()
    {
        return $this->belongsTo('App\User','user');
    }

    /**
     * Join each area to directions.
     */
    public function getTypeDayAssociated()
    {
        return $this->belongsTo('App\Models\Tipo_Dia','type');
    }
}
