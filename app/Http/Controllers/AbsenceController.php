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

class AbsenceController extends Controller
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

    // permissions
    private $mainOcacions = array( 
                ['id' => 0,'name' => 'MATRIMONIO','dias' => 2],
                ['id' => 1,'name' => 'NACIMIENTO DE HIJOS','dias' => 5],
                ['id' => 2,'name' => 'FALLECIMIENTO DE CÓNYUGE','dias' => 2],
                ['id' => 3,'name' => 'FALLECIMIENTO DE HERMANOS','dias' => 2],
                ['id' => 4,'name' => 'FALLECIMIENTO DE HIJOS','dias' => 3],
                ['id' => 5,'name' => 'FALLECIMIENTO DE PADRES','dias' => 3],
                ['id' => 6,'name' => 'FALLECIMIENTO DE PADRES POLÍTICOS','dias' => 2],
                ['id' => 7,'name' => 'ENFERMEDAD','dias' => 0],
                ['id' => 8,'name' => 'OTRO','dias' => 0]
             );

    private $urlVoucher = "assets/img/app/permisos_de_ausencia/vouchers";

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_information()
    {
        return view('main.components.absences.information');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaOcacion()
    {
        return view('main.components.absences.tabla_ocacion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewAbsence()
    {
        return view('main.components.absences.solicitar_permiso_de_ausencia');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getAbsenceForm()
    {
        return view('main.components.absences.solicitar');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_solicitudes()
    {
        return view('main.components.absences.solicitudes');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaSolicitudesRealizadas()
    {
        return view('main.components.absences.tabla_solicitudes_realizadas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaSolicitudesRecibidas()
    {
        return view('main.components.absences.tabla_solicitudes_recibidas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOcacions()
    {   
        $motivos = array();

        $motivosModel = Motivos_Ausencia::all();

        foreach($motivosModel as $mm){
            array_push($motivos,[
                "id" => $mm->id,
                "name" => $mm->name,
                "dias" => $mm->days
                ]);
        }

        //return json_encode($this->mainOcacions);
        return json_encode($motivos);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequests()
    {   
        $requests = array();

        $requestModel = Solicitud::where('user',Auth::user()->id)
                        ->where('type', DB::table('tipo_solicitud')->where('name', 'Ausencia')->value('id'))
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
                        ->where('type', DB::table('tipo_solicitud')->where('name', 'Ausencia')->value('id'))
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
    public function main_storeNewAbsence(Request $request)
    {   
        DB::beginTransaction();

        $newAbsence = array();
        $idAbsence = 0;
        $ocacionJustificada = true;

        try{

            /*$fecha_inicio = date_create($request->input('abs_date_start'));
            date_add($fecha_inicio, date_interval_create_from_date_string($request->input('abs_days').' days'));
            $fecha_fin = date_format($fecha, 'Y-m-d');*/

            /*'fecha_fin' => $request->input('abs_date_end'),
            'fecha_regreso' => $request->input('abs_date_return'),*/

            $newAbsence = [
                'user' => Auth::user()->id,
                'authorizer' => $request->input('abs_boss'),
                'fecha_inicio' => $request->input('abs_date_start'),
                'fecha_fin' => $request->input('abs_date_end'),
                'fecha_regreso' => $request->input('abs_date_return'),
                'observations' => $request->input('abs_observations') | " ",
                'dias' => $request->input('abs_days'),
                'type' => DB::table('tipo_solicitud')->where('name', 'Ausencia')->value('id'),
                'motivo' => $request->input('abs_ocacion')
            ];
            //echo $request->input('abs_required_auth');
            if($request->input('abs_required_auth') == 0){
                $newAbsence['status'] = DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id');
                $newAbsence['auth_boss'] = 1;
                $newAbsence['auth_ch'] = 1;
                $ocacionJustificada = false;
            }else{
                $newAbsence['status'] = DB::table('estados_solicitud')->where('name', 'Enviada')->value('id');
            }

            if($request->input('abs_has_file') == "Y"){

                $voucher = $request->file('abs_file');
                $filename = $voucher->getClientOriginalName();
                $upload_success = $voucher->move($this->urlVoucher, $filename);

                $newAbsence['voucher'] = $filename;
            }

            $idAbsence = Solicitud::create($newAbsence);
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();
        
        $data = array(
            'id' => $idAbsence->id,
            'usuario' => Auth::user()->name." ".Auth::user()->apellido_paterno,
            'dias' => $newAbsence['dias'],
            'desde' => $newAbsence['fecha_inicio'],
            'hasta' => $newAbsence['fecha_fin'],
            'motivo' => DB::table('motivos_ausencia')->where('id', $newAbsence['motivo'])->value('name')
        );

        $data['subject'] = "Portal Personal - Nueva Solicitud";
        $data['from'] = Auth::user()->email;
        
        // test mail ----
        $data['to'] = "antonio.baez@advanzer.com";
        //$data['to'] = User::find($newAbsence['authorizer'])->email;

        $mail_cc = array();

        if($ocacionJustificada){
            $mail_admins = PortalPersonal::getAdminstratorsArray();
            foreach($mail_admins as $mb){
                array_push($mail_cc, $mb['email']);
            }
        }
        
        // $data['cc'] = $mail_cc;
        $data['cc'] = array();

        try{
            PortalPersonal::sendMail($data, $ocacionJustificada ? 'main.components.absences.nueva_solicitud' : 'main.components.absences.notificacion_ausencia');
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
        return view('main.components.absences.permiso_de_ausencia_recibido');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_showOwnRequest()
    {   
        return view('main.components.absences.permiso_de_ausencia_propio');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestReceivedForm()
    {   
        return view('main.components.absences.detalle_recibido');
    }
    
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequestForm()
    {   
        return view('main.components.absences.detalle_propia');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getOwnRequest($id_absence)
    {   
        $solicitud = Solicitud::find($id_absence);

        if($solicitud->status == DB::table('estados_solicitud')->where('name', 'Autorizada')->value('id')){
            $solicitud->alert = 0;
            $solicitud->save();
        }

        $solicitudPropia = [
                'id' => $id_absence,
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
    public function main_getRequestReceived($id_absence)
    {   
        $solicitud = Solicitud::find($id_absence);
        $solicitud->alert = 0;
        $solicitud->save();

        //$solicitud = Solicitud::where('id', $id_absence)->first();

        $solicitudRecibida = [
                'id' => $id_absence,
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
    public function main_rejectAbsence(Request $request)
    {   
        DB::beginTransaction();
        
        $absence = null;
        
        try{

            $absence = Solicitud::find($request->input('abs_id'));
            
            $absence->alert = 1;
            $absence->razon_cancelacion = $request->input('abs_motivo_cancelacion');
            $absence->status = DB::table('estados_solicitud')->where('name', 'Rechazada')->value('id');

            $absence->save();
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();

        $data = array(
            'id' => $absence->id,
            'autorizador' => $absence->getAuthorizerAssociated()->first()->name." ".$absence->getAuthorizerAssociated()->first()->apellido_paterno,
            'dias' => $absence->dias,
            'razon' => $absence->razon_cancelacion
        );

        $data['subject'] = "Portal Personal - Solicitud Rechazada";
        $data['from'] = User::find($absence->authorizer)->email;
        
        // test mail ----
        $data['to'] = "antonio.baez@advanzer.com";
        //$data['to'] = User::find($absence->user)->email;
        $data['cc'] = array();

        try{
            PortalPersonal::sendMail($data, 'main.components.absences.rechazar_solicitud');
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
    public function main_acceptAbsence($id_absence)
    {   
        DB::beginTransaction();
        
        $solicitud = null;
        
        try{

            $solicitud = Solicitud::find($id_absence);
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

        $data['subject'] = "Portal Personal - Solicitud Aceptada";
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
            PortalPersonal::sendMail($data, 'main.components.absences.aceptar_solicitud');
        }catch(\Exception $e){
            echo $e;
            exit;
        }
        
        return "success"; 
    }

    /**
     * Modal View Comprobante
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getComprobanteModal($id_absence)
    {   
        $solicitud = Solicitud::find($id_absence);

        $voucher = URL::to($this->urlVoucher+"/"+$solicitud->voucher);
        
        return view('theme.components.comprobanteMedico', ["file" => $voucher]);
    }

}
