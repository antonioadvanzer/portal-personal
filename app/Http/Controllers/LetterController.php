<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use Mail;
use Auth;
use DB;
use PortalPersonal;

class LetterController extends Controller
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
        return view('main.components.letter.information');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewLetter()
    {
        return view('main.components.letter.solicitar_carta');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewLetterForm()
    {
        return view('main.components.letter.solicitar');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_cartas()
    {
        return view('main.components.letter.cartas');
    }

    /**
     * Vista para relación de solicitudes propias
     *
     * @return \Illuminate\Http\Response
     */
    public function main_viewCartas()
    {
        return view('main.components.letter.tables.vista_cartas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_tablaCartas()
    {
        return view('main.components.letter.tabla_cartas_realizadas');
    }

    /**
     * Tabla de solicitudes realizadas
     *
     * @return \Illuminate\Http\Response
     */
     public function main_tableCartas()
     {   
        $letterModel = Carta::where('user', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();
 
         return view('main.components.letter.tables.tabla_cartas',["solicitudes" => $letterModel]);
     }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestsLetter()
    {   
        $letter = array();

        $letterModel = Carta::where('user', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->get();
        
        foreach($letterModel as $lm){
            array_push($letter,[
                "id" => $lm->id,
                "folio" => $lm->id,
                "dirigido" => $lm->receiver,
                "observaciones" => $lm->observations
                 ]);
        }

        return json_encode($letter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function main_storeNewLetter(Request $request)
    {   
        DB::beginTransaction();
        
        $newLetter = array();
        
        try{

            $newLetter = [
                'user' => Auth::user()->id,
                'receiver' => $request->input('rl_dirigido_a'),
                'sueldo' => $request->input('rl_sueldo')=="true"?1:0,
                'imss' => $request->input('rl_imss')=="true"?1:0,
                'rfc' => $request->input('rl_rfc')=="true"?1:0,
                'curp' => $request->input('rl_curp')=="true"?1:0,
                'antiguedad' => $request->input('rl_antiguedad')=="true"?1:0,
                'puesto' => $request->input('rl_puesto')=="true"?1:0,
                'domicilio_particular' => $request->input('rl_domicilio')=="true"?1:0,
                'observations' => $request->input('rl_observaciones')
            ];

            Carta::create($newLetter);
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }
        
        DB::commit();

        $data = array(
            'nombre' => Auth::user()->name." ".Auth::user()->apellido_paterno." ".Auth::user()->apellido_materno,
            'persona' => $newLetter['receiver'],
            'sueldo' => $newLetter['sueldo'],
            'imss' => $newLetter['imss'],
            'rfc' => $newLetter['rfc'],
            'curp' => $newLetter['curp'],
            'antiguedad' => $newLetter['antiguedad'],
            'puesto' => $newLetter['puesto'],
            'domicilio' => $newLetter['domicilio_particular'],
            'observaciones' => $newLetter['observations']
        );

        $data['subject'] = "Portal Personal - Constancia Laboral";
        $data['from'] = Auth::user()->email;
        
        // test mail
        //$data['to'] = "antonio.baez@advanzer.com";
        
        $data['to'] = "capitalhumano@advanzer.com";
        
        $mail_cc = array();

        $mail_admins = PortalPersonal::getAdminstratorsArrayWithNotifications();

        foreach($mail_admins as $mb){
            array_push($mail_cc, $mb['email']);
        }

        $data['cc'] = $mail_cc;

        try{
            PortalPersonal::sendMail($data, 'main.components.letter.nueva_carta');
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
    public function main_showRequestLetter()
    {   
        return view('main.components.letter.solicitud_carta');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestLetterForm()
    {   
        return view('main.components.letter.carta_detalle');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequestLetter($id_request)
    {   
        $letter = Carta::find($id_request);

        $solicitud = [
                'id' => $letter->id,
                'colaborador' => $letter->getEmployedAssociated()->first()->name,
                'dirigido' => $letter->receiver,
                'sueldo' => $letter->sueldo==1?true:false,
                'imss' => $letter->imss==1?true:false,
                'rfc' => $letter->rfc==1?true:false,
                'curp' => $letter->curp==1?true:false,
                'antiguedad' => $letter->antiguedad==1?true:false,
                'puesto' => $letter->puesto==1?true:false,
                'domicilio' => $letter->domicilio_particular==1?true:false,
                'observaciones' => $letter->observations
            ];

        return json_encode($solicitud);
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
            $message->subject($data['subject']);
        });

    }
}
