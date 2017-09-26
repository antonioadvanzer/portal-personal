<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitud extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'authorizer', 'fecha_solicitud', 'fecha_inicio', 'fecha_fin', 'fecha_regreso', 'voucher', 'observations', 'razon_cancelacion', 'status', 'dias', 'type', 'motivo', 'auth_boss', 'auth_ch', 'alert', 'used'
    ];

    /**
     * 
     */
    public function getEmployedAssociated()
    {
        return $this->belongsTo('App\User','user');
    }

    /**
     * 
     */
    public function getAuthorizerAssociated()
    {
        return $this->belongsTo('App\User','authorizer');
    }

    /**
     * 
     */
    public function getStatusAssociated()
    {
        return $this->belongsTo('App\Models\Estados_Solicitud','status');
    }

    /**
     * 
     */
    public function getTypeAssociated()
    {
        return $this->belongsTo('App\Models\Tipo_Solicitud','type');
    }

    /**
     * 
     */
    public function getMotivoAssociated()
    {
        return $this->belongsTo('App\Models\Motivos_Ausencia','motivo');
    }
}
