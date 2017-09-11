<?php
/**
 * Created by PP.
 * User: antoniobaez
 * Date: 17/07/17
 * Time: 7:50 PM
 */

namespace App\Classes;

use App\User;
use App\Models\Permiso;
use Session;
use Hash;
use Html;
use File;
use Exception;
use Auth;
use DB;
use Mail;
use URL;

class PortalPersonal
{   

    // permissions
    public static $adminPermissions = array( 
                'ADMINISTRACION' => '0',
                'PERSONAL_A_CARGO' => '1',
                'CAPTURISTA_DE_GASTOS_DE_VIAJE' => '2',
                'CAPTURISTA_DE_HARVEST' => '3',
                'VACACIONES' => '4',
                'PERMISOS_DE_AUSENCIA' => '5',
                'CARTAS_Y_CONSTANCIAS' => '6',
                'REQUISICIONES' => '7',
                'EVALUACIONES' => '8',
             );

    /**
     * Get site information
     *
     * @return String
     */
    public static function getSiteInformation()
    {
        return 'Nuevo Portal Personal Advanzer/Entuizer 2017';
    }

    /**
     * Allow create a email format to send.
     * check important!
     * @param 
     * @return \Illuminate\Http\Response
     */
    public static function sendMail($data, $format)
    {
        Mail::send($format, ['data' => $data], function ($message) use ($data) {
            $message->from($data['from'], 'Portal Personal');
            //$message->to($data['to']);
            $message->to("antonio.baez@advanzer.com");//test mode
            if(array_key_exists('cc', $data)){
                $message->cc($data['cc']);
            }
            $message->subject($data['subject']);
        });
    }

    /**
     * 
     * @param Int $permission, Permiso $permissions
     * @return Boolean
     */
    public static function checkPermission($permission, $permissions)
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

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAdminstratorsArray()
    {   
        $admins = array();

        $userModel = User::all();
        
        foreach($userModel as $um){
            
            $pu = $um->getPermissionsUser()->get();
            $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
            $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
            
            if(PortalPersonal::checkPermission(DB::table('permisos')->where('name', 'Administración')->value('access'), $pu) 
                or PortalPersonal::checkPermission(DB::table('permisos')->where('name', 'Administración')->value('access'), $pa) 
                or PortalPersonal::checkPermission(DB::table('permisos')->where('name', 'Administración')->value('access'), $pp)){
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
     * @return \Illuminate\Http\Response
     */
    public static function getPermissionsEnabledByUser($id_user)
    {   
        $um = User::find($id_user);

        $permissions='';
        
        $pu = $um->getPermissionsUser()->get();
        $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
        $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
        
        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['ADMINISTRACION'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['ADMINISTRACION'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['ADMINISTRACION'], $pp)){
                $permissions.="1";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERSONAL_A_CARGO'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERSONAL_A_CARGO'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERSONAL_A_CARGO'], $pp)){
                $permissions.=",2";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pp)){
                $permissions.=",3";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CAPTURISTA_DE_HARVEST'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CAPTURISTA_DE_HARVEST'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CAPTURISTA_DE_HARVEST'], $pp)){
                $permissions.=",4";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['VACACIONES'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['VACACIONES'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['VACACIONES'], $pp)){
                $permissions.=",5";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERMISOS_DE_AUSENCIA'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERMISOS_DE_AUSENCIA'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERMISOS_DE_AUSENCIA'], $pp)){
                $permissions.=",6";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CARTAS_Y_CONSTANCIAS'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CARTAS_Y_CONSTANCIAS'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['CARTAS_Y_CONSTANCIAS'], $pp)){
                $permissions.=",7";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['REQUISICIONES'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['REQUISICIONES'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['REQUISICIONES'], $pp)){
                $permissions.=",8";
        }

        if(PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['EVALUACIONES'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['EVALUACIONES'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['EVALUACIONES'], $pp)){
                $permissions.=",9";
        }

        return $permissions;
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public static function isAdministrator($id_user)
    {   
        $um = User::find($id_user);
        
        $pu = $um->getPermissionsUser()->get();
        $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
        $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
        
        return PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['ADMINISTRACION'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['ADMINISTRACION'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['ADMINISTRACION'], $pp);
        
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public static function isBoss($id_user)
    {   
        $um = User::find($id_user);
        
        $pu = $um->getPermissionsUser()->get();
        $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
        $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
        
        return PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERSONAL_A_CARGO'], $pu) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERSONAL_A_CARGO'], $pa) 
            or PortalPersonal::checkPermission(PortalPersonal::$adminPermissions['PERSONAL_A_CARGO'], $pp);
        
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public static function getModulesAccordingPermissions(Array $permissions_user)
    {  
        $modules = "";

        foreach($permissions_user as $p_s){
            
            $ps = "";
            
            switch($p_s){
                case 3:
                    $ps="-";
                    $ps.="PortalPersonal.modules.gastos_de_viaje";
                break;
                case 4:
                    $ps="-";
                    $ps.="PortalPersonal.modules.harvest";
                break;
                /*case 5:
                    $ps="-";
                    $ps.="PortalPersonal.modules.vacaciones";
                break;*/
                /*case 6:
                    $ps="-";
                    $ps.="PortalPersonal.modules.permisos_de_ausencia";
                break;*/
                /*case 7:
                    $ps="-";
                    $ps.="PortalPersonal.modules.cartas_y_constancias_laborales";
                break;*/
                case 8:
                    $ps="-";
                    $ps.="PortalPersonal.modules.requisiciones";
                break;
                case 9:
                    $ps="-";
                    $ps.="PortalPersonal.modules.evaluaciones";
                break;
            }
            //array_push($modules,$ps);
            $modules.=$ps;
            
            unset($ps);
        }

        $modules = substr($modules, 1);
        //dd($modules);
        return $modules;
    }

    /**
     * Calcular dias por año
     *
     * @return \Illuminate\Http\Response
     */
    public static function calculaDiasPorAnio($anio)
    {
        
        $dias = 0;

        switch($anio){
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

        return $dias;
    }

    /**
     * Calcular dias por año
     *
     * @return \Illuminate\Http\Response
     */
    public static function calculaIntervaloDeMeses($fecha1, $fecha2)
    {
        return intval(date_diff(date_create($fecha1), date_create($fecha2))->format('%m'));
    }

    /**
     * Calcular dias acumulados
     *
     * @return \Illuminate\Http\Response
     */
    public static function calculaIntervaloDeDias($dias_correspondientes, $meses_transcurridos)
    {
        return floor((intval($dias_correspondientes)/12) * $meses_transcurridos);
    }

    /**
     * Calcular fecha resultante
     *
     * @param  string  $fecha, $meses
     * @return \Illuminate\Http\Response
     */
    public static function calculaFechaCierre($fecha, $meses)
    {
        return date ('Y-m-d', strtotime('+'.$meses.' month', strtotime( $fecha )));
    }
}