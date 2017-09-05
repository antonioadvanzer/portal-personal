<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisicion extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requisiciones';
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'director', 'partner_director', 'fecha_solicitud', 'fecha_estimada_ingreso', 'fecha_aceptacion', 'fecha_autorizacion', 'area', 'track', 'posicion', 'company', 'tipo_posicion', 'sustituye_a', 'costo_maximo', 'proyecto', 'clave_proyecto', 'residencia', 'lugar_trabajo', 'domicilio_cliente', 'contratacion', 'evaluador_tecnico', 'disponibilidad_viajar', 'edad_uno', 'edad_dos', 'sexo', 'nivel_estudios', 'carrera', 'ingles_oral', 'ingles_lectura', 'ingles_escritura', 'conocimientos', 'habilidades', 'funciones', 'observaciones', 'razon_cancelacion', 'status', 'auth_boss', 'auth_director', 'alert'
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
    public function getDirectorAssociated()
    {
        return $this->belongsTo('App\User','director');
    }

    /**
     * 
     */
    public function getPartnerDirectorAssociated()
    {
        return $this->belongsTo('App\User','partner_director');
    }

    /**
     * 
     */
    public function getAreaAssociated()
    {
        return $this->belongsTo('App\Models\Area','area');
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

    /**
     * 
     */
    public function getStatusAssociated()
    {
        return $this->belongsTo('App\Models\Estados_Requisicion','status');
    }

    /**
     * 
     */
    public function getCompanyAssociated()
    {
        return $this->belongsTo('App\Models\Company','company');
    }
}
