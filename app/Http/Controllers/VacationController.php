<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Vacaciones;
use App\Models\Tipo_Solicitud;
use App\Models\Estados_Solicitud;
use App\Models\Motivos_Ausencia;
use App\Models\Permiso;
use App\User;
use Auth;
use Mail;
use DB;
use DateTime;
use PortalPersonal;

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
    public function admin_tableAccumulatedDays()
    {
        return view('admin.components.users.table_vacations');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaDiasDeVacaciones()
    {
        return view('admin.components.users.vacations.table_report_vacations');
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
    public function main_solicitudesRealizadas()
    {
        return view('main.components.vacations.solicitudes_realizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function main_solicitudesRecibidas()
     {
         return view('main.components.vacations.solicitudes_recibidas');
     }

    /**
     * Vista para relación de solicitudes propias
     *
     * @return \Illuminate\Http\Response
     */
    public function main_viewSolicitudesRealizadas()
    {
        return view('main.components.vacations.tables.vista_solicitudes_realizadas');
    }

    /**
     * Vista para relación de solicitudes recibidas
     *
     * @return \Illuminate\Http\Response
     */
     public function main_viewSolicitudesRecibidas()
     {
         return view('main.components.vacations.tables.vista_solicitudes_recibidas');
     }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getCountRequestSended()
    { 
        $vacations1 = DB::table('solicitudes')
                ->select(DB::raw('count(*) as vacations_count'))
                ->where('user', Auth::user()->id)
                ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                ->where('status', DB::table('estados_solicitud')->where('name', 'Cancelada')->value('id'))
                ->where('alert', 1)
                ->first();

        $vacations2 = DB::table('solicitudes')
                ->select(DB::raw('count(*) as vacations_count'))
                ->where('user', Auth::user()->id)
                ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                ->where('status', DB::table('estados_solicitud')->where('name', 'Rechazada')->value('id'))
                ->where('alert', 1)
                ->first();

        $vacations3 = DB::table('solicitudes')
                ->select(DB::raw('count(*) as vacations_count'))
                ->where('user', Auth::user()->id)
                ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                ->where('status', DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id'))
                ->where('alert', 1)
                ->first();

        $vacations = $vacations1->vacations_count + $vacations2->vacations_count + $vacations3->vacations_count;

        return $vacations;
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getCountRequestReceived()
    { 
        $vacations = DB::table('solicitudes')
                ->select(DB::raw('count(*) as vacations_count'))
                ->where('authorizer', Auth::user()->id)
                ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                ->where('status', DB::table('estados_solicitud')->where('name', 'Enviada')->value('id'))
                ->where('alert', 1)
                ->first();

        return $vacations->vacations_count;
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getCountRequestReceived()
    { 
        $vacations = DB::table('solicitudes')
                ->select(DB::raw('count(*) as vacations_count'))
                //->where('authorizer', Auth::user()->id)
                ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
                ->where('status', DB::table('estados_solicitud')->where('name', 'Aceptada')->value('id'))
                ->where('alert', 1)
                ->first();

        return $vacations->vacations_count;
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
     * Tabla de solicitudes realizadas
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tableSolicitudesRealizadas()
    {   
        $requestModel = Solicitud::where('user', Auth::user()->id)
            ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
            ->orderBy('id', 'desc')
            ->get();

        return view('main.components.vacations.tables.tabla_solicitudes_realizadas',["solicitudes" => $requestModel]);
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
     * Tabla de solicitudes recibidas
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tableSolicitudesRecibidas()
    {   
        $requestModel = Solicitud::where('authorizer', Auth::user()->id)
            ->where('status', DB::table('estados_solicitud')
            ->where('name', 'Enviada')->value('id'))
            ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
            ->orderBy('id', 'desc')
            ->get();

        return view('main.components.vacations.tables.tabla_solicitudes_recibidas',["solicitudes" => $requestModel]);
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
    public function main_storeNewVacationRequest(Request $request)
    {   //echo date('Y-m-d');
        //exit;
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
                'fecha_solicitud' => date('Y-m-d'),
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
            'motivo' => DB::table('motivos_ausencia')->where('id', $newVacationRequest['motivo'])->value('id')
        );

        $data['subject'] = "Portal Personal - Nueva Solicitud";
        $data['from'] = Auth::user()->email;
        
        // test mail ----
        //$data['to'] = "antonio.baez@advanzer.com";
        
        $data['to'] = User::find($newVacationRequest['authorizer'])->email;

        /*$mail_cc = array();

        $mail_admins = PortalPersonal::getAdminstratorsArray();
        foreach($mail_admins as $mb){
            array_push($mail_cc, $mb['email']);
        }
        
         $data['cc'] = $mail_cc;*/
        //$data['cc'] = array();
        //var_dump($data);

        try{
            PortalPersonal::sendMail($data, 'main.components.vacations.email_layout.nueva_solicitud');
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

        if(($solicitud->status == DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id')) || ($solicitud->status == DB::table('estados_solicitud')->where('name', 'Rechazada')->value('id')) || ($solicitud->status == DB::table('estados_solicitud')->where('name', 'Cancelada')->value('id'))){
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
            $solicitud->alert = 1;
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
        //$data['to'] = "antonio.baez@advanzer.com";
        
        $data['to'] = User::find($solicitud->user)->email;

        try{
            PortalPersonal::sendMail($data, 'main.components.vacations.email_layout.rechazar_solicitud');
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
            //'usuario' => $solicitud->getEmployedAssociated->first()->name." ".$solicitud->getEmployedAssociated->first()->apellido_paterno,
            'usuario' => User::find($solicitud->user)->name." ".User::find($solicitud->user)->apellido_paterno,
            'dias' => $solicitud->dias,
            'desde' => $solicitud->fecha_inicio,
            'hasta' => $solicitud->fecha_fin,
            'motivo' => $solicitud->getMotivoAssociated()->first()->name
        );

        $data['subject'] = "Portal Personal - Solicitud Aprobada";
        $data['from'] = User::find($solicitud->authorizer)->email;
        
        // test mail ----
        //$data['to'] = "antonio.baez@advanzer.com";
        
        $data['to'] = "capitalhumano@advanzer.com";
        
        $mail_cc = array();

        $mail_admins = PortalPersonal::getAdminstratorsArray();
        
        foreach($mail_admins as $mb){
            array_push($mail_cc, $mb['email']);
        }
        
        $data['cc'] = $mail_cc;
        //$data['cc'] = array();
        //var_dump($mail_cc);

        try{
            PortalPersonal::sendMail($data, 'main.components.vacations.email_layout.aceptar_solicitud');
        }catch(\Exception $e){
            echo $e;
            exit;
        }

        return "success"; 
    }

    /**
     * Reporte para el usuario y para el modo administrador
     *
     * @return \Illuminate\Http\Response
     */
     public function main_getOwnResportDaysVacations()
     {
         return $this->admin_getResportDaysVacationsByUser(Auth::user()->id);
     }

    /**
     * Reporte para el usuario y para el modo administrador
     *
     * @return \Illuminate\Http\Response
     */
     public function admin_getResportDaysVacationsByUser($id_user)
     {
        $user_vacation = User::find($id_user);
        
        $diasVacaciones = $user_vacation->getVacations()->get();

        $regs_days = array();
        $cal_regs_days = array();
        
        
        # Se guardan los registros de vacaciones
        foreach($diasVacaciones as $dv){
            
            $cal_regs_days[] = [
                'close_date' => $dv->close_date,
                'expiration_date' => $dv->expiration_date,
                'increased_days' => $dv->increased_days,
                'accumulated_days' => $dv->accumulated_days,
                'status' => "Vigentes" 
            ];

        }

        $days_in_requests = PortalPersonal::getDaysInRequests($id_user);
        //dd($days_in_requests);
        if($days_in_requests > 0){

            foreach($cal_regs_days as $rs => $dv){
                
                if($days_in_requests > intval($dv["accumulated_days"])){

                    $days_in_requests -= intval($dv["accumulated_days"]);
                    $cal_regs_days[$rs]["accumulated_days"] = 0;
                    $cal_regs_days[$rs]["status"] = "Disfrutados";
                
                }else{
                    
                    $cal_regs_days[$rs]["accumulated_days"] = intval($dv["accumulated_days"]) - $days_in_requests;
                    
                    if($cal_regs_days[$rs]["accumulated_days"] == 0){
                        $cal_regs_days[$rs]["status"] = "Disfrutados";
                    }

                    break;
                
                }

            }

        }
        //dd($cal_regs_days);
        $saldo_acumulado = 0;

        # Se almacenan los datos de vacaciones en el arreglo
        foreach($cal_regs_days as $dv){

            # Calculamos los dias que se han tomado
            $dias_difrutados = ($dv['increased_days'] - $dv['accumulated_days']);

            # Se calcula los dias totales
            $saldo_acumulado += $dv['accumulated_days'];

            $regs_days[] = ['fecha' => $dv['close_date'], 'dias' => $dv['increased_days'], 'vencen' => $dv['expiration_date'], 'disfrutados' => $dias_difrutados, 'saldo' => $saldo_acumulado, 'status' => $dv['status'] ];
            
            unset($dias_difrutados);
        }

        unset($saldo_acumulado);

        return json_encode($regs_days);
     }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAccumulatedDaysByUser($id_user)
    {
        $user_vacation = User::find($id_user);

        $diasVacaciones = $user_vacation->getVacations()->get();

        $regs_days = array();

        if($diasVacaciones->count() > 2){
            $regs_days[] = ["type" => "Próximo Vencimiento", "days" => 0, "expire" => ""];
        }

        $regs_days[] = ["type" => "Recién Generadas", "days" => 0, "expire" => ""];
        $regs_days[] = ["type" => "Proporcionales", "days" => 0, "expire" => ""];

        $an = 0;

        # Se acoplaron los registros de dias acumulados y disponibles
        foreach($diasVacaciones as $dv){
            $regs_days[$an]["days"] = $dv->accumulated_days;
            $regs_days[$an]["expire"] = $dv->expiration_date;
            $an++;
        }

        # Se hace la busqueda de solicitudes de vacaciones, con el estado de activo
        $total_days = DB::table('solicitudes')
             ->select(DB::raw("SUM(dias) as total_days"))
             ->where('user', $id_user)
             ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
             ->where('used', 1)
             ->whereIn('status',[
                    DB::table('estados_solicitud')->where('name', 'Enviada')->value('id'),
                    DB::table('estados_solicitud')->where('name', 'Aceptada')->value('id'),
                    DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id')
                ])
             //->first();
             ->value('total_days');

        //$total_days;

        # Si existe solicitudes activas, se prodecedera a descontar los dias tomados
        if($total_days > 0){

            # Se realiza los calculos correspondientes para descontar dias de los almacenes
            foreach($regs_days as $rs => $dv){

                if($total_days > intval($dv["days"])){
                    $total_days -= intval($dv["days"]);
                    $regs_days[$rs]["days"] = 0;
                    $regs_days[$rs]["expire"] = " ";
                }else{
                    $regs_days[$rs]["days"] = intval($dv["days"]) - $total_days;
                    break;
                }
            }

        }

        return json_encode($regs_days);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getTotalDays()
    {
        $total_days = DB::table('vacaciones')
             ->select(DB::raw("SUM(accumulated_days) as total_days"))
             ->where('user', Auth::user()->id)
             //->where('expiration_date', '<',date('Y-m-d'))
             ->where('status', 1)
             //->get();
             ->value('total_days');

        //return json_encode($total_days);
        return $total_days;
    }
    
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getVacationsToExpirate()
    {
        $date = DB::table('vacaciones')
             ->where('user', Auth::user()->id)
             ->where('status', 1)
             ->where('type', DB::table('tipos_dias')->where('name', 'Acumulados')->value('id'))
             ->first();
        
        $dates = "";
        
        if($date){
            $dates =["dias" => $date->accumulated_days, "fecha" => $date->expiration_date];
        }else{
            $dates =["dias" => 0, "fecha" => " "];
        }

        return json_encode($dates);
        //return $date;
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function get_getDaysInRequests()
    {
        $total_days = DB::table('solicitudes')
             ->select(DB::raw("SUM(dias) as total_days"))
             ->where('user', Auth::user()->id)
             ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
             ->where('used', 1)
             ->whereIn('status',[
                    DB::table('estados_solicitud')->where('name', 'Enviada')->value('id'),
                    DB::table('estados_solicitud')->where('name', 'Aceptada')->value('id'),
                    DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id')
                ])
             //->first();
             ->value('total_days');

        return $total_days;
    }

    /**
     * http://localhost:8000/advanzer/service/refresh_vacations
     *
     * @return \Illuminate\Http\Response
     */
    public function service_calculateVacations()
    {   

        $userModel = User::all();

        foreach($userModel as $um){
            echo "-------------------------------------------------------------------------------------------<br>";
            echo $um->name." ".$um->apellido_paterno;
            $this->admin_actualizaVacaciones($um);
            echo "-------------------------------------------------------------------------------------------";
            echo "<br> <br>";
        }

        return "Exito";
    }

    /**
     * http://localhost:8000/advanzer/service/consume_days
     *
     * @return \Illuminate\Http\Response
     */
    public function service_removeDaysVacations()
    {   
        $userModel = User::all();

        foreach($userModel as $um){
            echo "-------------------------------------------------------------------------------------------<br>";
            echo $um->name." ".$um->apellido_paterno;
            $this->admin_utilizaDiasDeVacaciones($um);
            echo "-------------------------------------------------------------------------------------------";
            echo "<br> <br>";
        }

        return "Exito";
    }

    /**
     * http://localhost:8000/admin-theme/modules/vacations/calcular_fechas/{date}
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_calculaFechas($fecha)
    {
        //$fecha = date('Y-m-j');

        echo "PASADO : <br><br>";

        $date = $fecha;
        $nuevafecha1 = strtotime ( '-18 month' , strtotime ( $date ) ) ;
        $nuevafecha1 = date ( 'Y-m-d' , $nuevafecha1 );

        $nuevafecha2 = strtotime ( '-12 month' , strtotime ( $nuevafecha1 ) ) ;
        $nuevafecha2 = date ( 'Y-m-d' , $nuevafecha2 );
        
        echo "Fecha Ingresada : ".$fecha."<br>";
        echo "Fecha Inicio : ".$nuevafecha2."<br>";
        echo "Fecha Cierre : ".$nuevafecha1."<br>";

        echo " <br>-------------------------------------------------------------------------------<br> <br>";

        echo "FUTURO : <br><br>";

        $date = $fecha;
        $nuevafecha3 = strtotime ( '+12 month' , strtotime ( $date ) ) ;
        $nuevafecha3 = date ( 'Y-m-d' , $nuevafecha3 );

        $nuevafecha4 = strtotime ( '+18 month' , strtotime ( $nuevafecha3 ) ) ;
        $nuevafecha4 = date ( 'Y-m-d' , $nuevafecha4 );
        
        echo "Fecha Ingresada : ".$fecha."<br>";
        echo "Fecha Cierre : ".$nuevafecha3."<br>";
        echo "Fecha Expiración : ".$nuevafecha4."<br>";

        echo " <br>-------------------------------------------------------------------------------<br> <br>";

        echo "Años trabajando : <br><br>";

        $vd = date_diff(date_create($fecha), date_create(date('Y-m-d')))->format('%y Años %m Meses %d Días');

        echo "Fecha Actual : ".date('Y-m-d')."<br>";
        echo "Antiguedad : ".$vd."<br>";

        echo " <br>-------------------------------------------------------------------------------<br> <br>";

        echo "Dias proporcionales : <br><br>";

        $mf = date_diff(date_create($fecha), date_create(date('Y-m-d')))->format('%m');
        $mf= intval($mf);

        $yf = date_diff(date_create($fecha), date_create(date('Y-m-d')))->format('%y');
        $yf= intval($yf)+1;
        
        $dias = 0;
        
        switch($yf){
			case 1:
				$dias=6;
				break;
			case 2:
				$dias=8;
				break;
			case 3:
				$dias=10;
				break;
			case 4: 
				$dias=12;
				break;
			case 5: case 6: case 7: case 8: case 9:
				$dias=14;
				break;
			case 10: case 11: case 12: case 13: case 14:
				$dias=16;
				break;
			case 15: case 16: case 17: case 18: case 19: 
				$dias=18;
				break;
            case 20: case 21: case 22: case 23: case 24:
                $dias=20;
                break;
            case 25: case 26:
                $dias=22;
                break;
			default:
				$dias=22;
				break;
		}

        $dg = floor(($dias/12) * $mf);

        echo "Dias generados: ".$dg." para el año ".$yf."<br>";
    }

    /**
     * http://localhost:8000/admin-theme/modules/vacations/insertar_dias
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_insertarVacaciones()
    {    
        $vr1 = [
            'user' => 125,
            'type' => 2,
            'accumulated_days' => 2, 
            'increased_days' => 6, 
            'corresponding_days' => 6, 
            'start_date' => '2017-03-01', 
            'close_date' => '2018-03-01', 
            'expiration_date' => '2019-09-01', 
            'year' => 1, 
            'status'=> 1
            ];

        $vr2 = [
            'user' => 108,
            'type' => 2,
            'accumulated_days' => 0, 
            'increased_days' => 0, 
            'corresponding_days' => 8, 
            'start_date' => '2017-07-19', 
            'close_date' => '2018-07-19', 
            'expiration_date' => '2020-01-19',
            'year' => 2, 
            'status'=> 1
            ];

        $vr3 = [
            'user' => 77,
            'type' => 2,
            'accumulated_days' => 0, 
            'increased_days' => 0, 
            'corresponding_days' => 10, 
            'start_date' => '2017-07-01', 
            'close_date' => '2018-07-01', 
            'expiration_date' => '2020-01-01', 
            'year' => 3, 
            'status'=> 1
            ];

        $id_vr1 = Vacaciones::create($vr1);
        //$id_vr2 = Vacaciones::create($vr2);
        //$id_vr3 = Vacaciones::create($vr3);

        //echo "Hecho ID's : ".$id_vr1->id."   ".$id_vr2->id."   ".$id_vr3->id;
        //echo "Hecho ID's : ".$id_vr1->id."   ".$id_vr2->id;
        //echo "Hecho ID's : ".$id_vr2->id."   ".$id_vr3->id;
        echo "Hecho ID's : ".$id_vr1->id;
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_revisarVacaciones($user)
    {
        
        $userVacations = $user->getVacations()->get();
        echo "<br>";
        if($userVacations->count()){
            //echo dd($userVacations);
            echo "<br>";
            foreach($userVacations as $uv){
                echo " ID: ".$uv->id." Dias: ".$uv->accumulated_days." Expiración: ".$uv->expiration_date." Tipo: ".$uv->getTypeDayAssociated()->first()->name."<br>";
            }
        }
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_actualizaVacaciones($user)
    {
        
        //$userVacations = $user->getVacations()->get();

        $idUser = $user->id;

        $uv = Vacaciones::where('user', $idUser)
                    ->where('type',DB::table('tipos_dias')->where('name', 'Proporcionales')->value('id'))
                    ->first();

        echo "<br>";

        if($uv){
            
            $id_vac = $uv->id;
            
            //echo " ID: ".$uv->id." Dias: ".$uv->accumulated_days." Expiración: ".$uv->expiration_date." Tipo: ".$uv->getTypeDayAssociated()->first()->name."<br>";
            
            echo "Año: ".$uv->year."<br>";
            echo "Dias Correspondientes: ".$uv->corresponding_days."<br>";
            echo "Dias Acumulados: ".$uv->accumulated_days."<br>";
            echo "<br>";

            echo "Fecha Inicio: ".$uv->start_date."<br>";
            echo "Fecha Cierre: ".$uv->close_date."<br>";
            echo "Fecha Expiración: ".$uv->expiration_date."<br>";           
            echo "<br>";

            /*$mf = strtotime(date('Y-m-d')) >= strtotime($uv->close_date) ? 12 : date_diff(date_create($uv->start_date), date_create(date('Y-m-d')))->format('%m');
                $mf= intval($mf);
                
                $dg = floor((intval($uv->corresponding_days)/12) * $mf);

                echo "Dias Incrementados Actuales: ".$uv->increased_days."<br>";
                echo "Dias Incrementados Calculados: ".$dg."<br>";         
                echo "<br>";

                if($dg > $uv->increased_days){
                    echo "Se debe insertar un dia";
                    echo "<br>";

                    if($dg == $uv->corresponding_days){
                        echo "Se convierten a dias acumulados";
                    }else{
                        echo "Se mantienen proporcionales";
                    }
                    echo "<br>";

                }else{
                    echo "No hay dias nuevos";
            }*/
            
            echo "++++++++++++++++++++++++++++++++++++++++++++++++";
            
            echo "<br>";
            
            //$meses_transturridos = 0;
            //$dias_incrementados = 0;
            $dias_calculados = 0;

            $dias_acumulados = $uv->accumulated_days;
            $dias_incrementados = $uv->increased_days;
            $dias_correspondientes = $uv->corresponding_days;
            $fecha_inicio = $uv->start_date;
            $tipo_dias = 0;
            
            if(strtotime(date('Y-m-d')) >= strtotime($uv->close_date)){
                
                echo "Se convierten a acumulados";
                echo "<br>";
                echo "<br>";

                $meses_transturridos = 12;
                $dias_calculados = PortalPersonal::calculaIntervaloDeDias($dias_correspondientes,$meses_transturridos);
                $tipo_dias = DB::table('tipos_dias')->where('name', 'Acumulados')->value('id');


                // Conversion P -> A

                //echo "Accion : ".($dias_calculados == $dias_correspondientes ? "Alcanzados":"Superados")."<br>";

                echo "Dias Incrementados Actuales: ".$dias_incrementados."<br>";
                echo "Dias Incrementados Calculados: ".$dias_calculados."<br>"; 
                
                echo "************************************";
                echo "<br>";

                $dias_acumulados = $dias_acumulados + ($dias_calculados - $dias_incrementados);
                $dias_incrementados = $dias_calculados;

                echo "Dias Acumulados: ".$dias_acumulados."<br>";
                echo "Dias Incrementados Actuales: ".$dias_incrementados."<br>";

                // Código para crea nuevo registro ...
                $v_user = $uv->user;
                $v_type = DB::table('tipos_dias')->where('name', 'Proporcionales')->value('id');
                
                $v_year = $uv->year+1;
                $v_status = 1;

                $v_start_date = $uv->close_date;
                $v_close_date = PortalPersonal::calculaFechaCierre($v_start_date, 12);
                $v_expiration_date = PortalPersonal::calculaFechaCierre($v_close_date, 18);
                
                $im = PortalPersonal::calculaIntervaloDeMeses($fecha_inicio, date('Y-m-d'));
                $dp = PortalPersonal::calculaIntervaloDeDias($dias_correspondientes, $im);

                $v_accumulated_days = $dp;
                $v_increased_days = $dp;
                $v_corresponding_days = PortalPersonal::calculaDiasPorAnio($v_year);


                $newVacation = [
                    'user' => $v_user, 
                    'type' => $v_type, 
                    'accumulated_days' => $v_accumulated_days, 
                    'increased_days' => $v_increased_days, 
                    'corresponding_days' => $v_corresponding_days, 
                    'start_date' => $v_start_date, 
                    'close_date' => $v_close_date, 
                    'expiration_date' => $v_expiration_date, 
                    'year' => $v_year, 
                    'status' => $v_status
                ];
                echo "......................................................";
                echo "<br>";
                var_dump($newVacation);
                echo "<br>";
                echo "......................................................";
                echo "<br>";
                Vacaciones::create($newVacation);
              
            }else{

                echo "Se mantienen proporcionales";
                
                echo "<br>";
                echo "<br>";
                
                $meses_transturridos = PortalPersonal::calculaIntervaloDeMeses($fecha_inicio,date('Y-m-d'));
                $dias_calculados = PortalPersonal::calculaIntervaloDeDias($dias_correspondientes,$meses_transturridos);
                $tipo_dias = DB::table('tipos_dias')->where('name', 'Proporcionales')->value('id');

                if($dias_calculados > $dias_incrementados){

                    echo "Dias Incrementados Actuales: ".$dias_incrementados."<br>";
                    echo "Dias Incrementados Calculados: ".$dias_calculados."<br>"; 
                    
                    echo "************************************";
                    echo "<br>";

                    $dias_acumulados = $dias_acumulados + ($dias_calculados - $dias_incrementados);
                    $dias_incrementados = $dias_calculados;
                
                    echo "Dias Acumulados: ".$dias_acumulados."<br>";
                    echo "Dias Incrementados Actuales: ".$dias_incrementados."<br>"; 
                    
                    echo "<br>";

                    // Código para actualizar ...

                }else{
                    echo "No hay incremeto";
                    echo "<br>";
                }
            
            }
            
            // Actualización de dias de vacaciones -------

            $vacaciones = Vacaciones::find($id_vac);

            $vacaciones->accumulated_days = $dias_acumulados;
            $vacaciones->increased_days = $dias_incrementados;
            $vacaciones->type = $tipo_dias;

            $vacaciones->save();
            
            //--------------------------------------------

            echo "++++++++++++++++++++++++++++++++++++++++++++++++";
            echo "<br>";

        }
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_utilizaDiasDeVacaciones($user)
    {
        $diasVacaciones = $user->getVacations()->get();
        
        echo "<br>";
        echo "----------------------------------------------";
        echo "<br>";

        $an = 0;
        $regs = array();
        //$regs_result = array();

        # Se divide los registros que almacenan los dias acumulados
        foreach($diasVacaciones as $dv){

            # Si el usuario tiene almacenados dias, se imprimen en consola
            echo "Registro ".(++$an);
            echo "<br>";
            echo "Id Reg : ".$dv->id;
            echo "<br>";
            echo " Tipo : ".$dv->getTypeDayAssociated()->first()->name;
            echo "<br>";
            echo " Dias : ".$dv->accumulated_days;
            echo "<br>";
            echo " Status : ".$dv->status;
            echo "<br>";
            echo "..................................";
            echo "<br>";

            array_push($regs,["Reg" => $an, "id_v" => $dv->id, "Tipo" => $dv->getTypeDayAssociated()->first()->name, "Dias" => $dv->accumulated_days, "Status" => $dv->status]);
        }

        # Se hace la busqueda de solicitudes de vacaciones, cuya fecha de inicio ya fue superada por el dia de hoy
        $solicitud_proxima = DB::table('solicitudes')
             ->where('user', $user->id)
             ->where('type', DB::table('tipo_solicitud')->where('name', 'Vacaciones')->value('id'))
             ->whereDate('fecha_inicio', '<=', date('Y-m-d'))
             ->where('used', 1)
             ->whereIn('status',[
                    //DB::table('estados_solicitud')->where('name', 'Enviada')->value('id'),
                    //DB::table('estados_solicitud')->where('name', 'Aceptada')->value('id'),
                    DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id')
                ])
             ->first();
        
        echo "<br>";
        echo "+++++++++++++++++++++++++++++";
        echo "<br>";

        # Si existe una solicitud con la fecha alcanzada, se prodecedera a descontar los dias tomados
        if($solicitud_proxima){

            # Impresión de datos de solicitud
            echo "Dias al aplicar solicitud: <br>";
            echo "<br>";
            echo "Solicitud No. ".$solicitud_proxima->id;
            echo "<br>";
            echo "Dias solicitados ".$solicitud_proxima->dias;
            echo "<br>";
            echo "<br>";
            
            $id_solicitud = $solicitud_proxima->id;
            $dias_solicitados = intval($solicitud_proxima->dias);
            
            # Se realiza los calculos correspondientes para descontar dias de los almacenes
            foreach($regs as $rs => $dv){

                if($dias_solicitados > intval($dv["Dias"])){
                    $dias_solicitados -= intval($dv["Dias"]);
                    $regs[$rs]["Dias"] = 0;
                    $regs[$rs]["Status"] = 0;
                }else{
                    $regs[$rs]["Dias"] = intval($dv["Dias"]) - $dias_solicitados;
                    break;
                }
            }
            echo "<br>";
            
            # Se imprimen de nuevo los registros de almacen ya con el cambio o descuento de dias tomados
            foreach($regs as $dv){
                
                echo "Registro ".$dv["Reg"];
                echo "<br>";
                echo "Id Reg : ".$dv["id_v"];
                echo "<br>";
                echo "Tipo : ".$dv["Tipo"];
                echo "<br>";
                echo "Dias : ".$dv["Dias"];
                echo "<br>";
                echo "Estaus : ".$dv["Status"];
                echo "<br>";
                echo "..................................";
                echo "<br>";
                
                # Se guarda el cambio en el registro de la tabla fisica
                $registro_vacaciones = Vacaciones::find($dv["id_v"]);
                $registro_vacaciones->accumulated_days = $dv["Dias"];
                $registro_vacaciones->status = $dv["Status"];
                $registro_vacaciones->save();
                if($dv["Status"] == 0){
                    $registro_vacaciones->delete();
                }
                
            }
            
            # Se procede a cambiar el estado de la solicitud a "Utilizada"
            $registro_solicitud = Solicitud::find($id_solicitud);
            $registro_solicitud->used = 0;
            $registro_solicitud->save();

            echo "+++++++++++++++++++++++++++++";
            echo "<br>";

            echo "<br>";
        }
        
        echo "<br>";
        
        echo "----------------------------------------------";
        echo "<br>";

        unset($diasVacaciones);
    }
}
