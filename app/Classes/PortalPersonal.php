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
    public function sendMail($data, $format){
        
        Mail::send($format, ['data' => $data], function ($message) use ($data) {
            $message->from($data['from'], 'Portal Personal');
            $message->to($data['to']);
            $message->cc($data['cc']);
            $message->subject($data['subject']);
        });
    }

    /**
     * 
     * @param Int $permission, Permiso $permissions
     * @return Boolean
     */
    private function checkPermission($permission, $permissions)
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
    private function getAdminstratorsArray()
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
     * @return \Illuminate\Http\Response
     */
    private function getPermissionsEnabledByUser($id_user)
    {   
        $um = User::find($id_user);

        $permissions='';
        
        $pu = $um->getPermissionsUser()->get();
        $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
        $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
        
        if($this->admin_checkPermission($this->adminPermissions['ADMINISTRACION'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['ADMINISTRACION'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['ADMINISTRACION'], $pp)){
                $permissions.="1";
        }

        if($this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pp)){
                $permissions.=",2";
        }

        if($this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pp)){
                $permissions.=",3";
        }

        if($this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_HARVEST'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_HARVEST'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_HARVEST'], $pp)){
                $permissions.=",4";
        }

        if($this->admin_checkPermission($this->adminPermissions['VACACIONES'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['VACACIONES'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['VACACIONES'], $pp)){
                $permissions.=",5";
        }

        if($this->admin_checkPermission($this->adminPermissions['PERMISOS_DE_AUSENCIA'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['PERMISOS_DE_AUSENCIA'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['PERMISOS_DE_AUSENCIA'], $pp)){
                $permissions.=",6";
        }

        if($this->admin_checkPermission($this->adminPermissions['CARTAS_Y_CONSTANCIAS'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['CARTAS_Y_CONSTANCIAS'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['CARTAS_Y_CONSTANCIAS'], $pp)){
                $permissions.=",7";
        }

        if($this->admin_checkPermission($this->adminPermissions['REQUISICIONES'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['REQUISICIONES'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['REQUISICIONES'], $pp)){
                $permissions.=",8";
        }

        if($this->admin_checkPermission($this->adminPermissions['EVALUACIONES'], $pu) 
            or $this->admin_checkPermission($this->adminPermissions['EVALUACIONES'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['EVALUACIONES'], $pp)){
                $permissions.=",9";
        }

        return $permissions;
    }
}