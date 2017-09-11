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

            /*if($newRequisition['director'] == $newRequisition['partner_director']){
                $newRequisition['status'] = DB::table('estados_requisicion')->where('name', 'Enviada')->value('id');
            }else{
                $newRequisition['status'] = DB::table('estados_requisicion')->where('name', 'Aceptada')->value('id');
            }*/

            $idRequisition = Requisicion::create($newRequisition);

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        $data = array(
            'id' => $idRequisition->id,
            'usuario' => Auth::user()->name." ".Auth::user()->apellido_paterno
        );

        $data['subject'] = "Portal Personal - Nueva Requisición";
        $data['from'] = Auth::user()->email;

        // test mail ----
        //$data['to'] = "antonio.baez@advanzer.com";

        $data['to'] = User::find($newRequisition['director'])->email;

        try{
            PortalPersonal::sendMail($data, 'main.components.requisitions.email_layout.nueva_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }
        
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
        
        if($solicitud->status == DB::table('estados_requisicion')->where('name', 'En Proceso')->value('id')){
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

            'req_director' => $solicitud->director,
            'req_autorizador' => $solicitud->partner_director,
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

        $data = array(
            'id' => $requisition->id,
            'director' => $requisition->getDirectorAssociated()->first()->name." ".$requisition->getDirectorAssociated()->first()->apellido_paterno,
            'razon' => $requisition->razon_cancelacion
        );

        $data['subject'] = "Portal Personal - Requisición Rechazada";
        $data['from'] = User::find($requisition->director)->email;

        // test mail ----
        //$data['to'] = "antonio.baez@advanzer.com";

        $data['to'] = User::find($requisition->user)->email;

        try{
            PortalPersonal::sendMail($data, 'main.components.requisitions.email_layout.rechazar_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }

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

        $data = array(
            'id' => $requisition->id,
            'director' => $requisition->getDirectorAssociated()->first()->name." ".$requisition->getDirectorAssociated()->first()->apellido_paterno
        );

        $data['subject'] = "Portal Personal - Requisición Aceptada";
        $data['from'] = User::find($requisition->director)->email;

        // test mail ----
        //$data['to'] = "antonio.baez@advanzer.com";

        $data['to'] = User::find($requisition->partner_director)->email;

        try{
            PortalPersonal::sendMail($data, 'main.components.requisitions.email_layout.aceptar_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }
        
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

        $data1 = array(
            'id' => $requisition->id,
            'director' => $requisition->getDirectorAssociated()->first()->name." ".$requisition->getDirectorAssociated()->first()->apellido_paterno,
            'autorizador' => $requisition->getPartnerDirectorAssociated()->first()->name." ".$requisition->getPartnerDirectorAssociated()->first()->apellido_paterno,
        );

        $data1['subject'] = "Portal Personal - Requisición Autorizada";
        $data1['from'] = User::find($requisition->partner_director)->email;

        // test mail ----
        //$data['to'] = "antonio.baez@advanzer.com";

        $data1['to'] = User::find($requisition->user)->email;

        try{
            PortalPersonal::sendMail($data1, 'main.components.requisitions.email_layout.notificar_autorizar_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }

        // --------------------------

        $data2 = array(
            'id' => $requisition->id,
            'usuario' => $requisition->getEmployedAssociated->first()->name." ".$requisition->getEmployedAssociated->first()->apellido_paterno,
            'director' => $requisition->getDirectorAssociated()->first()->name." ".$requisition->getDirectorAssociated()->first()->apellido_paterno,
            'autorizador' => $requisition->getPartnerDirectorAssociated()->first()->name." ".$requisition->getPartnerDirectorAssociated()->first()->apellido_paterno,
        );

        $data2['subject'] = "Portal Personal - Requisición Autorizada";
        $data2['from'] = User::find($requisition->partner_director)->email;

        $data2['to'] = "capitalhumano@advanzer.com";

        try{
            PortalPersonal::sendMail($data2, 'main.components.requisitions.email_layout.autorizar_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }

        return "success";
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_allRequisitions()
    {
        return view('admin.components.requisitions.todas_las_requisiciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_canceledRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_canceladas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_sendedRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_enviadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_aceptedRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_aceptadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_authorizedRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_autorizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_rejectedRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_rechazadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_processingRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_en_proceso');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_completedRequisitions()
    {
        return view('admin.components.requisitions.requisiciones_completadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableAllRequisitions()
    {
        return view('admin.components.requisitions.tabla_todas_las_requisiciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableCanceledRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_canceladas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableSendedRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_enviadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableAceptedRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_aceptadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableAuthorizedRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_autorizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableRejectedRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_rechazadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableProcessingRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_en_proceso');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableCompletedRequisitions()
    {
        return view('admin.components.requisitions.tabla_requisiciones_completadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function admin_getAllRequisitions()
     {   
         return $this->admin_Requisitions();
     }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function admin_getCanceledRequisitions()
     {   
         return $this->admin_Requisitions(1);
     }
 
     /**
      * 
      *
      * @return \Illuminate\Http\Response
      */
     public function admin_getSendedRequisitions()
     {   
         return $this->admin_Requisitions(2);
     }
 
     /**
      * 
      *
      * @return \Illuminate\Http\Response
      */
     public function admin_getAceptedRequisitions()
     {   
         return $this->admin_Requisitions(3);
     }
 
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAuthorizedRequisitions()
    {   
        return $this->admin_Requisitions(4);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getRejectedRequisitions()
    {   
        return $this->admin_Requisitions(5);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getProcessingRequisitions()
    {   
        return $this->admin_Requisitions(6);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getCompletedRequisitions()
    {   
        return $this->admin_Requisitions(7);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_Requisitions($status = 0)
    { 
        $requests = array();
        
        if($status == 0){
            $requestModel = Requisicion::all();
        }else{
            $requestModel = Requisicion::where('status', $status)
            ->orderBy('id', 'desc')
            ->get();
        }

        foreach($requestModel as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "fecha" => $rm->fecha_solicitud,
                "solicita" => $rm->getEmployedAssociated()->first()->name,
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
    public function admin_showRequisition()
    {   
        return view('admin.components.requisitions.detalle_requisicion');
    }
    
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getRequisitionForm()
    {   
        return view('admin.components.requisitions.requisicion');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_proccessRequisition($id_requisition)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Requisicion::find($id_requisition);
            $solicitud->alert = 1;
            $solicitud->status = DB::table('estados_requisicion')->where('name', 'En Proceso')->value('id');
            $solicitud->save();

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();
        
        $data = array(
            'id' => $solicitud->id,
        );

        $data['subject'] = "Portal Personal - Requisición Atendida";
        $data['from'] = "capitalhumano@advanzer.com";

        $data['to'] = User::find($solicitud->user)->email;

        try{
            PortalPersonal::sendMail($data, 'main.components.requisitions.email_layout.atender_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }

        return "success"; 
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_completeRequisition($id_requisition)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Requisicion::find($id_requisition);
            //$solicitud->alert = 1;
            $solicitud->status = DB::table('estados_requisicion')->where('name', 'Completada')->value('id');
            $solicitud->save();

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();

        $data = array(
            'id' => $solicitud->id,
        );

        $data['subject'] = "Portal Personal - Requisición Cerrada";
        $data['from'] = "capitalhumano@advanzer.com";

        $data['to'] = User::find($solicitud->user)->email;

        try{
            PortalPersonal::sendMail($data, 'main.components.requisitions.email_layout.cerrar_requisicion');
        }catch(\Exception $e){
            echo $e;
            exit;
        }
        
        return "success"; 
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_cancelRequisition($id_requisition)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Requisicion::find($id_requisition);
            //$solicitud->alert = 1;
            $solicitud->status = DB::table('estados_requisicion')->where('name', 'Cancelada')->value('id');
            $solicitud->save();

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
    public function admin_getRequisition($id_requisition)
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
}
