<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisicion;
use App\User;
use Auth;
use DB;
use File;
use Mail;
use URL;
use PortalPersonal;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
     }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_information()
    {
        return view('main.components.requisitions.information');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewRequisition()
    {
        return view('main.components.requisitions.solicitar_requisicion');
    }
 
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequisitionForm()
    {
         return view('main.components.requisitions.solicitar');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_requisicionesRealizadas()
    {
        return view('main.components.requisitions.solicitudes_realizadas');
    }
 
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_requisicionesRecibidas()
    {
        return view('main.components.requisitions.solicitudes_recibidas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaRequisicionesRealizadas()
    {
        return view('main.components.requisitions.tabla_solicitudes_realizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaRequisicionesRecibidas()
    {
        return view('main.components.requisitions.tabla_solicitudes_recibidas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequests()
    { 
        $requests = array();
        
        $requestModel = Requisicion::where('user', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->get();

        foreach($requestModel as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "fecha" => $rm->fecha_solicitud,
                "director" => $rm->getDirectorAssociated()->first()->name,
                "autorizador" => $rm->getPartnerDirectorAssociated()->first()->name,
                "proyecto" => $rm->proyecto,
                "track" => $rm->getTrackAssociated()->first()->name,
                "posicion" => $rm->getPosicionAssociated()->first()->name,
                "area" => $rm->getAreaAssociated()->first()->name,
                "empresa" => $rm->getCompanyAssociated()->first()->name,
                "estado" => $rm->getStatusAssociated()->first()->name,
                "aleta" => $rm->alert,

                "status" => $rm->status
            ]);
        }

        return json_encode($requests);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestsReceived()
    { 
        $requests = array();
        
        $requestModel1 = Requisicion::where('director', Auth::user()->id)
                        ->where('status', DB::table('estados_requisicion')->where('name', 'Enviada')->value('id'))
                        ->orderBy('id', 'desc')
                        ->get();

        $requestModel2 = Requisicion::where('partner_director', Auth::user()->id)
                        ->where('status', DB::table('estados_requisicion')->where('name', 'Aceptada')->value('id'))
                        ->orderBy('id', 'desc')
                        ->get();

        foreach($requestModel1 as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "fecha" => $rm->fecha_solicitud,
                "solicita" => $rm->getEmployedAssociated()->first()->name,
                "proyecto" => $rm->proyecto,
                "track" => $rm->getTrackAssociated()->first()->name,
                "posicion" => $rm->getPosicionAssociated()->first()->name,
                "area" => $rm->getAreaAssociated()->first()->name,
                "empresa" => $rm->getCompanyAssociated()->first()->name,
                "estado" => $rm->getStatusAssociated()->first()->name,
                "alerta" => $rm->alert
            ]);
        }

        foreach($requestModel2 as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "fecha" => $rm->fecha_solicitud,
                "solicita" => $rm->getEmployedAssociated()->first()->name,
                "proyecto" => $rm->proyecto,
                "track" => $rm->getTrackAssociated()->first()->name,
                "posicion" => $rm->getPosicionAssociated()->first()->name,
                "area" => $rm->getAreaAssociated()->first()->name,
                "empresa" => $rm->getCompanyAssociated()->first()->name,
                "estado" => $rm->getStatusAssociated()->first()->name,
                "alerta" => $rm->alert
            ]);
        }

        return json_encode($requests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function main_storeNewRequestRequisition(Request $request)
    {  
        DB::beginTransaction();

        $newRequisition = array();

        try{

            $newRequisition = [
                'user' => Auth::user()->id, 
                'director' => $request->input('req_boss'), 
                'partner_director' => $request->input('req_authorizer'), 
                'fecha_solicitud' => date("Y-m-d"), 
                'fecha_estimada_ingreso' => $request->input('req_fecha_ingreso'), 
                'fecha_aceptacion' => null, 
                'fecha_autorizacion' => null, 
                'area' => $request->input('req_area'), 
                'track' => $request->input('req_track'), 
                'posicion' => $request->input('req_posicion'), 
                'company' => $request->input('req_empresa'), 
                'tipo_posicion' => $request->input('req_tipo_posicion'), 
                'sustituye_a' => $request->input('req_tipo_posicion') == 2 ? $request->input('req_sustituye_a') : null, 
                'costo_maximo' => $request->input('req_costo_maximo'), 
                'proyecto' => $request->input('req_proyecto'), 
                'clave_proyecto' => $request->input('req_clave_proyecto'), 
                'residencia' => $request->input('req_residencia'), 
                'lugar_trabajo' => $request->input('req_lugar_trabajo'), 
                'domicilio_cliente' => $request->input('req_lugar_trabajo') == 3 ? $request->input('req_domicilio_cliente') : null, 
                'contratacion' => $request->input('req_contratacion'), 
                'evaluador_tecnico' => $request->input('req_evaluador_tecnico'), 
                'disponibilidad_viajar' => $request->input('req_disponiblidad_viajar'), 
                'edad_uno' => $request->input('req_edad_uno'), 
                'edad_dos' => $request->input('req_edad_dos'), 
                'sexo' => $request->input('req_sexo'), 
                'nivel_estudios' => $request->input('req_nivel_estudios'), 
                'carrera' => $request->input('req_carrera'), 
                'ingles_oral' => $request->input('req_ingles_oral'), 
                'ingles_lectura' => $request->input('req_ingles_lectura'), 
                'ingles_escritura' => $request->input('req_ingles_escritura'), 
                'conocimientos' => $request->input('req_conocimientos'), 
                'habilidades' => $request->input('req_habilidades'), 
                'funciones' => $request->input('req_funciones'), 
                'observaciones' => $request->input('req_observaciones'), 
                'razon_cancelacion' => null, 
                'status' => DB::table('estados_requisicion')->where('name', 'Enviada')->value('id'), 
                //'auth_boss', 
                //'auth_director', 
                //'alert'
            ];

            Requisicion::create($newRequisition);

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();
        
        //return json_encode($newRequisition);
        return "success";
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function main_showRequestReceived()
     {   
         return view('main.components.requisitions.requisicion_recibida');
     }
 
     /**
      * 
      *
      * @return \Illuminate\Http\Response
      */
     public function main_showOwnRequest()
     {   
         return view('main.components.requisitions.requisicion_propia');
     }
 
     /**
      * 
      *
      * @return \Illuminate\Http\Response
      */
     public function main_getRequestReceivedForm()
     {   
         return view('main.components.requisitions.detalle_recibida');
     }
     
     /**
      * 
      *
      * @return \Illuminate\Http\Response
      */
     public function main_getOwnRequestForm()
     {   
         return view('main.components.requisitions.detalle_propia');
     }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequest($id_requisition)
    {
        $solicitud = Requisicion::find($id_requisition);
        
        if($solicitud->status == DB::table('estados_requisicion')->where('name', 'Autorizada')->value('id')){
            $solicitud->alert = 0;
            $solicitud->save();
        }

        $solicitudPropia = [
            'id' => $id_requisition,
            'colaborador' => $solicitud->getEmployedAssociated()->first()->name." ".$solicitud->getEmployedAssociated()->first()->apellido_paterno,
            'director' => $solicitud->getDirectorAssociated()->first()->name." ".$solicitud->getDirectorAssociated()->first()->apellido_paterno,
            'autorizador' => $solicitud->getPartnerDirectorAssociated()->first()->name." ".$solicitud->getPartnerDirectorAssociated()->first()->apellido_paterno,
            'fecha_solicitud' => $solicitud->fecha_solicitud,
            'fecha_ingreso' => $solicitud->fecha_estimada_ingreso,
            'area' => $solicitud->getAreaAssociated()->first()->name,
            'track' => $solicitud->getTrackAssociated()->first()->name,
            'posicion' => $solicitud->getPosicionAssociated()->first()->name,
            'empresa' => $solicitud->getCompanyAssociated()->first()->name,
            'tipo_posicion' => $solicitud->tipo_posicion,
            'sustituye_a' => $solicitud->sustituye_a,
            'costo_maximo' => $solicitud->costo_maximo,
            'proyecto' => $solicitud->proyecto,
            'clave_proyecto' => $solicitud->clave_proyecto,
            'residencia' => $solicitud->residencia,
            'lugar_trabajo' => $solicitud->lugar_trabajo,
            'domicilio_cliente' => $solicitud->domicilio_cliente,
            'contratacion' => $solicitud->contratacion,
            'evaluador_tecnico' => $solicitud->evaluador_tecnico,
            'disponiblidad_viajar' => $solicitud->disponibilidad_viajar,
            'edad_de' => $solicitud->edad_uno,
            'a' => $solicitud->edad_dos,
            'sexo' => $solicitud->sexo,
            'nivel_estudios' => $solicitud->nivel_estudios,
            'carrera' => $solicitud->carrera,
            'ingles_oral' => $solicitud->ingles_oral,
            'ingles_lectura' => $solicitud->ingles_lectura,
            'ingles_escritura' => $solicitud->ingles_escritura,
            'experiencia' => $solicitud->conocimientos,
            'caracteristicas' => $solicitud->habilidades,
            'funciones' => $solicitud->funciones,
            'observaciones' => $solicitud->observaciones,
            'razon_cancelacion' => $solicitud->razon_cancelacion,
            'estado' => $solicitud->getStatusAssociated()->first()->name,
            'status' => $solicitud->status,
        ];

        return json_encode($solicitudPropia);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestReceived($id_requisition)
    { 
        $solicitud = Requisicion::find($id_requisition);
        $solicitud->alert = 0;
        $solicitud->save();

        $solicitudRecibida = [
            'id' => $id_requisition,
            'colaborador' => $solicitud->getEmployedAssociated()->first()->name." ".$solicitud->getEmployedAssociated()->first()->apellido_paterno,
            'director' => $solicitud->getDirectorAssociated()->first()->name." ".$solicitud->getDirectorAssociated()->first()->apellido_paterno,
            'autorizador' => $solicitud->getPartnerDirectorAssociated()->first()->name." ".$solicitud->getPartnerDirectorAssociated()->first()->apellido_paterno,
            'fecha_solicitud' => $solicitud->fecha_solicitud,
            'fecha_ingreso' => $solicitud->fecha_estimada_ingreso,
            'area' => $solicitud->getAreaAssociated()->first()->name,
            'track' => $solicitud->getTrackAssociated()->first()->name,
            'posicion' => $solicitud->getPosicionAssociated()->first()->name,
            'empresa' => $solicitud->getCompanyAssociated()->first()->name,
            'tipo_posicion' => $solicitud->tipo_posicion,
            'sustituye_a' => $solicitud->sustituye_a,
            'costo_maximo' => $solicitud->costo_maximo,
            'proyecto' => $solicitud->proyecto,
            'clave_proyecto' => $solicitud->clave_proyecto,
            'residencia' => $solicitud->residencia,
            'lugar_trabajo' => $solicitud->lugar_trabajo,
            'domicilio_cliente' => $solicitud->domicilio_cliente,
            'contratacion' => $solicitud->contratacion,
            'evaluador_tecnico' => $solicitud->evaluador_tecnico,
            'disponiblidad_viajar' => $solicitud->disponibilidad_viajar,
            'edad_de' => $solicitud->edad_uno,
            'a' => $solicitud->edad_dos,
            'sexo' => $solicitud->sexo,
            'nivel_estudios' => $solicitud->nivel_estudios,
            'carrera' => $solicitud->carrera,
            'ingles_oral' => $solicitud->ingles_oral,
            'ingles_lectura' => $solicitud->ingles_lectura,
            'ingles_escritura' => $solicitud->ingles_escritura,
            'experiencia' => $solicitud->conocimientos,
            'caracteristicas' => $solicitud->habilidades,
            'funciones' => $solicitud->funciones,
            'observaciones' => $solicitud->observaciones,
            'estado' => $solicitud->getStatusAssociated()->first()->name,
            'status' => $solicitud->status,
        ];

        return json_encode($solicitudRecibida);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function main_rejectRequisition(Request $request)
    {   
        DB::beginTransaction();

        $requisition = null;

        try{

            $requisition = Requisicion::find($request->input('req_id'));
            
            $requisition->alert = 1;
            $requisition->razon_cancelacion = $request->input('req_motivo_cancelacion');
            $requisition->status = DB::table('estados_requisicion')->where('name', 'Rechazada')->value('id');

            $requisition->save();

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        return "success";
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_acceptRequisition($id_requisition)
    {
        DB::beginTransaction();
        
        $requisition = null;

        try{
            
            $requisition = Requisicion::find($id_requisition);
            $requisition->alert = 1;
            $requisition->auth_boss = 1;
            $requisition->status = DB::table('estados_requisicion')->where('name', 'Aceptada')->value('id');

            $requisition->save();

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();
        
        return "success";
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function main_authRequisition($id_requisition)
     {  
        DB::beginTransaction();
        
        $requisition = null;

        try{
            
            $requisition = Requisicion::find($id_requisition);
            $requisition->alert = 1;
            $requisition->auth_boss = 1;
            $requisition->status = DB::table('estados_requisicion')->where('name', 'Autorizada')->value('id');

            $requisition->save();

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        return "success";
     }
}
