<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Tipo_Solicitud;
use App\Models\Estados_Solicitud;
use App\Models\Motivos_Ausencia;
use App\Models\Permiso;
use App\User;
use Auth;
use DB;
use File;
use Mail;
use URL;
use PortalPersonal;


class RequestController extends Controller
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

    private $urlVoucher = "assets/img/app/permisos_de_ausencia/vouchers";

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_allRequests()
    {
        return view('admin.components.requests.todas_las_solicitudes');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_canceledRequests()
    {
        return view('admin.components.requests.solicitudes_canceladas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_sendedRequests()
    {
        return view('admin.components.requests.solicitudes_enviadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_aceptedRequests()
    {
        return view('admin.components.requests.solicitudes_aceptadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_rejectedRequests()
    {
        return view('admin.components.requests.solicitudes_rechazadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_authorizedRequests()
    {
        return view('admin.components.requests.solicitudes_autorizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableAllRequests()
    {
        return view('admin.components.requests.tabla_todas_las_solicitudes');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableCanceledRequests()
    {
        return view('admin.components.requests.tabla_solicitudes_canceladas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableSendedRequests()
    {
        return view('admin.components.requests.tabla_solicitudes_enviadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableAceptedRequests()
    {
        return view('admin.components.requests.tabla_solicitudes_aceptadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableRejectedRequests()
    {
        return view('admin.components.requests.tabla_solicitudes_rechazadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tableAuthorizedRequests()
    {
        return view('admin.components.requests.tabla_solicitudes_autorizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAllRequests()
    {   
        return $this->admin_Requests();
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getCanceledRequests()
    {   
        return $this->admin_Requests(1);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getSendedRequests()
    {   
        return $this->admin_Requests(2);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAceptedRequests()
    {   
        return $this->admin_Requests(3);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getRejectedRequests()
    {   
        return $this->admin_Requests(4);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAuthorizedRequests()
    {   
        return $this->admin_Requests(5);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_showRequest()
    {   
        return view('admin.components.requests.detalle_solicitud');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getRequestForm()
    {   
        return view('admin.components.requests.solicitud');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getRequest($id_request)
    {   
        $solicitud = Solicitud::find($id_request);
        
        if($solicitud->status == DB::table('estados_solicitud')->where('name', 'Aceptada')->value('id')){
            $solicitud->alert = 0;
        }

        $solicitud->save();

        $solicitudAuth = [
                'id' => $id_request,
                'colaborador' => $solicitud->getEmployedAssociated()->first()->name,
                'autorizador' => $solicitud->getAuthorizerAssociated()->first()->name,
                'dias' => $solicitud->dias,
                'tipo' => $solicitud->getTypeAssociated()->first()->name,
                'estado' => $solicitud->getStatusAssociated()->first()->name,
                'motivo' => $solicitud->getMotivoAssociated()->first()->name,
                'desde' => $solicitud->fecha_inicio,
                'hasta' => $solicitud->fecha_fin,
                'regresa' => $solicitud->fecha_regreso,
                'observaciones' => $solicitud->observations,
                'aut_jefe' => $solicitud->auth_boss,
                'aut_ch' => $solicitud->auth_ch,
                'razon_cancelacion' => $solicitud->razon_cancelacion,
                
                "nombre_colaborador" => explode(" ",$solicitud->getEmployedAssociated()->first()->name)[0]." ".$solicitud->getEmployedAssociated()->first()->apellido_paterno,
                "nombre_autorizador" => explode(" ",$solicitud->getAuthorizerAssociated()->first()->name)[0]." ".$solicitud->getAuthorizerAssociated()->first()->apellido_paterno,
                'ocacion' => $solicitud->motivo,
                'status' => $solicitud->status,
                'type' => $solicitud->type
            ];

        return json_encode($solicitudAuth);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_authRequest($id_request)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Solicitud::find($id_request);
            $solicitud->alert = 1;
            $solicitud->auth_ch = 1;
            $solicitud->status = DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_rejectRequest(Request $request)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Solicitud::find($request->input('r_id'));
            
            $solicitud->alert = 1;
            $solicitud->razon_cancelacion = $request->input('r_motivo_cancelacion');
            $solicitud->status = DB::table('estados_solicitud')->where('name', 'Rechazada')->value('id');

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_cancelRequest($id_request)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Solicitud::find($id_request);
            $solicitud->alert = 1;
            $solicitud->status = DB::table('estados_solicitud')->where('name', 'Cancelada')->value('id');
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
    private function admin_Requests($status = 0)
    {   
        $requests = array();

        if($status == 0){
            $requestModel = Solicitud::all();
        }else{
            $requestModel = Solicitud::where('status',$status)->get();
        }
        foreach($requestModel as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "tipo" => $rm->getTypeAssociated()->first()->name,
                "fecha" => $rm['created_at']->toDateTimeString(),
                "colaborador" => $rm->getEmployedAssociated()->first()->name,
                "autorizador" => $rm->getAuthorizerAssociated()->first()->name,
                "dias" => $rm->dias,
                "desde" => $rm->fecha_inicio,
                "hasta" => $rm->fecha_fin,
                "estado" => $rm->getStatusAssociated()->first()->name,
                "status" => $rm->status,
                "alerta" => $rm->alert
                 ]);
        }
        
        return json_encode($requests);
    }
}
