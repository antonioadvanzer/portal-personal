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
use Mail;
use DB;

class VacationController extends Controller
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
        return view('main.components.vacations.information');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaDiasPorAnio()
    {
        return view('main.components.vacations.days');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaDiasDisponibles()
    {
        return view('main.components.vacations.available');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewVacationRequestLetter()
    {
        return view('main.components.vacations.solicitar_vacaciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewVacationRequestLetterForm()
    {
        return view('main.components.vacations.solicitar');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_solicitudes()
    {
        return view('main.components.vacations.solicitudes');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaSolicitudesRealizadas()
    {
        return view('main.components.vacations.tabla_solicitudes_realizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaSolicitudesRecibidas()
    {
        return view('main.components.vacations.tabla_solicitudes_recibidas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequests()
    {   
        $requests = array();

        $requestModel = Solicitud::where('user', Auth::user()->id)
                        ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                        ->orderBy('id', 'desc')
                        ->get();
        
        foreach($requestModel as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "tipo" => $rm->getTypeAssociated()->first()->name,
                "fecha" => $rm['created_at']->toDateTimeString(),
                "autorizador" => $rm->getAuthorizerAssociated()->first()->name,
                "dias" => $rm->dias,
                "desde" => $rm->fecha_inicio,
                "hasta" => $rm->fecha_fin,
                "estado" => $rm->getStatusAssociated()->first()->name,
                "alerta" => $rm->alert,

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

        $requestModel = Solicitud::where('authorizer', Auth::user()->id)
                        ->where('status', DB::table('estados_solicitud')
                        ->where('name', 'Enviada')->value('id'))
                        ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                        ->orderBy('id', 'desc')
                        ->get();
                        
        foreach($requestModel as $rm){
            array_push($requests,[
                "id" => $rm->id,
                "folio" => $rm->id,
                "tipo" => $rm->getTypeAssociated()->first()->name,
                "fecha" => $rm['created_at']->toDateTimeString(),
                "colaborador" => $rm->getEmployedAssociated()->first()->name,
                "dias" => $rm->dias,
                "desde" => $rm->fecha_inicio,
                "hasta" => $rm->fecha_fin,
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
    public function main_storeNewVacationRequestLetter(Request $request)
    {   
        DB::beginTransaction();

        $newVacationRequest = array();
        $idRequest = 0;

        try{

            $newVacationRequest = [
                'user' => Auth::user()->id,
                'authorizer' => $request->input('vr_boss'),
                'fecha_inicio' => $request->input('vr_date_start'),
                'fecha_fin' => $request->input('vr_date_end'),
                'fecha_regreso' => $request->input('vr_date_return'),
                'observations' => $request->input('vr_observations') | " ",
                'dias' => $request->input('vr_days'),
                'type' => DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'),
                'status' => DB::table('estados_solicitud')->where('name', 'Enviada')->value('id'),
                'motivo' => DB::table('motivos_ausencia')->where('name', 'OTRO')->value('id')
            ];

            $idRequest = Solicitud::create($newVacationRequest);
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();

        $data = array(
            'id' => $idRequest->id,
            'usuario' => Auth::user()->name." ".Auth::user()->apellido_paterno,
            'dias' => $newVacationRequest['dias'],
            'desde' => $newVacationRequest['fecha_inicio'],
            'hasta' => $newVacationRequest['fecha_fin'],
            'motivo' => $newVacationRequest['motivo']
        );

        $data['subject'] = "Portal Personal - Nueva Solicitud";
        $data['from'] = Auth::user()->email;
        
        // test mail ----
        $data['to'] = "antonio.baez@advanzer.com";
        //$data['to'] = User::find($newVacationRequest['authorizer'])->email;

        $mail_cc = array();

        /*$mail_admins = $this->advanzer_getAdminstratorsArray();
        foreach($mail_admins as $mb){
            array_push($mail_cc, $mb['email']);
        }*/
        
        // $data['cc'] = $mail_cc;
        $data['cc'] = array();

        try{
            $this->main_sendMail($data, 'main.components.vacations.nueva_solicitud');
        }catch(\Exception $e){
            echo $e;
        }

        return "success"; 
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_showRequestReceived()
    {   
        return view('main.components.vacations.solicitud_recibida');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_showOwnRequest()
    {   
        return view('main.components.vacations.solicitud_propia');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestReceivedForm()
    {   
        return view('main.components.vacations.detalle_recibido');
    }
    
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequestForm()
    {   
        return view('main.components.vacations.detalle_propia');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequest($id_request)
    {   
        $solicitud = Solicitud::find($id_request);

        if($solicitud->status == DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id')){
            $solicitud->alert = 0;
            $solicitud->save();
        }

        $solicitudPropia = [
                'id' => $id_request,
                'colaborador' => $solicitud->getEmployedAssociated()->first()->name,
                'autorizador' => $solicitud->getAuthorizerAssociated()->first()->name,
                'dias' => $solicitud->dias,
                'estado' => $solicitud->getStatusAssociated()->first()->name,
                'motivo' => $solicitud->getMotivoAssociated()->first()->name,
                'desde' => $solicitud->fecha_inicio,
                'hasta' => $solicitud->fecha_fin,
                'regresa' => $solicitud->fecha_regreso,
                'observaciones' => $solicitud->observations,
                'aut_jefe' => $solicitud->auth_boss,
                'aut_ch' => $solicitud->auth_ch,
                'razon_cancelacion' => $solicitud->razon_cancelacion,
                'ocacion' => $solicitud->motivo,
                'status' => $solicitud->status
            ];

        return json_encode($solicitudPropia);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestReceived($id_request)
    {   
        $solicitud = Solicitud::find($id_request);
        $solicitud->alert = 0;
        $solicitud->save();

        $solicitudRecibida = [
                'id' => $id_request,
                'colaborador' => $solicitud->getEmployedAssociated()->first()->name,
                'autorizador' => $solicitud->getAuthorizerAssociated()->first()->name,
                'dias' => $solicitud->dias,
                'estado' => $solicitud->getStatusAssociated()->first()->name,
                'motivo' => $solicitud->getMotivoAssociated()->first()->name,
                'desde' => $solicitud->fecha_inicio,
                'hasta' => $solicitud->fecha_fin,
                'regresa' => $solicitud->fecha_regreso,
                'observaciones' => $solicitud->observations,
                'aut_jefe' => $solicitud->auth_boss,
                'aut_ch' => $solicitud->auth_ch,

                'ocacion' => $solicitud->motivo,
                'status' => $solicitud->status
            ];

        return json_encode($solicitudRecibida);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function main_rejectRequest(Request $request)
    {   
        DB::beginTransaction();

        try{

            $solicitud = Solicitud::find($request->input('vr_id'));
            
            $solicitud->razon_cancelacion = $request->input('vr_motivo_cancelacion');
            $solicitud->status = DB::table('estados_solicitud')->where('name', 'Rechazada')->value('id');

            $solicitud->save();
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();

        $data = array(
            'id' => $solicitud->id,
            'autorizador' => $solicitud->getAuthorizerAssociated()->first()->name." ".$solicitud->getAuthorizerAssociated()->first()->apellido_paterno,
            'dias' => $solicitud->dias,
            'razon' => $solicitud->razon_cancelacion
        );

        $data['subject'] = "Portal Personal - Solicitud Rechazada";
        $data['from'] = User::find($solicitud->authorizer)->email;
        
        // test mail ----
        $data['to'] = "antonio.baez@advanzer.com";
        //$data['to'] = User::find($absence->user)->email;
        $data['cc'] = array();

        try{
            $this->main_sendMail($data, 'main.components.absences.rechazar_solicitud');
        }catch(\Exception $e){
            echo $e;
        }

        return "success"; 
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_acceptRequest($id_request)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Solicitud::find($id_request);
            $solicitud->alert = 1;
            $solicitud->auth_boss = 1;
            $solicitud->status = DB::table('estados_solicitud')->where('name', 'Aceptada')->value('id');
            $solicitud->save();

        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();

        $data = array(
            'id' => $solicitud->id,
            'autorizador' => $solicitud->getAuthorizerAssociated()->first()->name." ".$solicitud->getAuthorizerAssociated()->first()->apellido_paterno,
            'usuario' => $solicitud->getEmployedAssociated->first()->name." ".$solicitud->getEmployedAssociated->first()->apellido_paterno,
            'dias' => $solicitud->dias,
            'desde' => $solicitud->fecha_inicio,
            'hasta' => $solicitud->fecha_fin,
            'motivo' => $solicitud->getMotivoAssociated()->first()->name
        );

        $data['subject'] = "Portal Personal - Solicitud Cancelada";
        $data['from'] = User::find($solicitud->authorizer)->email;
        
        // test mail ----
        $data['to'] = "antonio.baez@advanzer.com";
        //$data['to'] = "capitalhumano@advanzer.com";
        
        $mail_cc = array();
        //$mail_admins = Permisos::find(DB::table('permisos')->where('name', 'Administración')->value('id'))->getPermissionsByUser()->get();
        $mail_admins = $this->advanzer_getAdminstratorsArray();
        foreach($mail_admins as $mb){
            array_push($mail_cc, $mb['email']);
        }

        // $data['cc'] = $mail_cc;
        $data['cc'] = array();
        //var_dump($mail_cc);

        try{
            $this->main_sendMail($data, 'main.components.absences.aceptar_solicitud');
        }catch(\Exception $e){
            echo $e;
        }

        return "success"; 
    }

    /**
     * Allow create a email format to send.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    private function main_sendMail($data, $format){
        
        Mail::send($format, ['data' => $data], function ($message) use ($data) {
            $message->from($data['from'], 'Portal Personal');
            $message->to($data['to']);
            $message->cc($data['cc']);
            $message->subject($data['subject']);
        });

    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    private function advanzer_getAdminstratorsArray()
    {   
        $admins = array();

        $userModel = User::all();
        
        foreach($userModel as $um){
            
            $pu = $um->getPermissionsUser()->get();
            $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
            $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
            
            if($this->advanzer_checkPermission(DB::table('permisos')->where('name', 'Administración')->value('access'), $pu) 
                or $this->advanzer_checkPermission(DB::table('permisos')->where('name', 'Administración')->value('access'), $pa) 
                or $this->advanzer_checkPermission(DB::table('permisos')->where('name', 'Administración')->value('access'), $pp)){
                array_push($admins,[
                    "id" => $um->id,
                    "name" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                    "email" => $um->email,
                ]);
            }
        }
        
        //return json_encode($admins);
        return $admins;
    }

    /**
     * 
     *
     * @return Boolean
     */
    private function advanzer_checkPermission($permission, $permissions)
    {  
        $valid = false;
        
        foreach($permissions as $p){
            if($p->getPermissionAssociated()->first()->access == $permission){
                $valid = true;
                break;
            }
        }

        return $valid;
    }
}
