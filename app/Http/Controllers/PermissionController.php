<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Models\Area;
use App\Models\Posicion;

class PermissionController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_listaPermisos()
    {
        return view('admin.components.permissions.lista_permisos');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_listaPermisosPorArea()
    {
        return view('admin.components.permissions.lista_permisos_por_area');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_listaPermisosPorPosicion()
    {
        return view('admin.components.permissions.lista_permisos_por_posicion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaUsuariosPermisos()
    {
        return view('admin.components.permissions.tabla_permisos');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaUsuariosPermisosPorArea()
    {
        return view('admin.components.permissions.tabla_permisos_por_area');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaUsuariosPermisosPorPosicion()
    {
        return view('admin.components.permissions.tabla_permisos_por_posicion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getListPermissions()
    {   $permissions = array();

        $permissionsModel = Permiso::all();
        
        foreach($permissionsModel as $pm){
            array_push($permissions,[
                "id" => $pm->id,
                "name" => $pm->name,
                "description" => $pm->description,
                "access" => $pm->access
                 ]);
        }
        
        return json_encode($permissions);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getPermissionsByArea($id)
    {   
        $permissions = [
            "permiso1" => 0,
            "permiso2" => 0,
            "permiso3" => 0,
            "permiso4" => 0,
            "permiso5" => 0,
            "permiso6" => 0,
            "permiso7" => 0,
            "permiso8" => 0,
            "permiso9" => 0,
            "permiso10" => 0
        ];

        $permissionsAreaModel = Area::where("id",$id)->first()->getPermissionsArea()->get();
        //dd($permissionsAreaModel);
        foreach($permissionsAreaModel as $pam){
            
            $permissions['permiso'.$pam->permiso] = 1;
        }
        
        return json_encode($permissions);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getListPermissionsByArea()
    { 
        $areas = array();

        $areaModel = Area::all();
        
        foreach($areaModel as $am){

            $lp = "";

            $permissionsAreaModel = $am->getPermissionsArea()->get();

            foreach($permissionsAreaModel as $pam){
                
                $lp .= $pam->getPermissionAssociated()->first()->name."\r\n";
            }

            array_push($areas,[
                "id" => $am->id,
                "name" => $am->name,
                "permissions" => nl2br($lp, false)
                ]);
        }
        
        return json_encode($areas);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getPermissionsByPosition($id)
    {   
        $permissions = [
            "permiso1" => 0,
            "permiso2" => 0,
            "permiso3" => 0,
            "permiso4" => 0,
            "permiso5" => 0,
            "permiso6" => 0,
            "permiso7" => 0,
            "permiso8" => 0,
            "permiso9" => 0,
            "permiso10" => 0
        ];

        $permissionsPosicionModel = Posicion::where("id",$id)->first()->getPermissionsPositions()->get();
        
        foreach($permissionsPosicionModel as $ppm){
            
            $permissions['permiso'.$ppm->permiso] = 1;
        }
        
        return json_encode($permissions);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getListPermissionsByPosition()
    { 
        $positions = array();

        $positionModel = Posicion::all();
        
        foreach($positionModel as $pm){

            $pp = "";

            $permissionsPositionModel = $pm->getPermissionsPositions()->get();

            foreach($permissionsPositionModel as $ppm){
                
                $pp .= $ppm->getPermissionAssociated()->first()->name."\r\n";
            }

            array_push($positions,[
                "id" => $pm->id,
                "name" => $pm->name,
                "permissions" => nl2br($pp, false)
                ]);
        }
        
        return json_encode($positions);
    }

}
