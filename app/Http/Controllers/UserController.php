<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Permiso;

class UserController extends Controller
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
    private $adminPermissions = array( 
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
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_usuariosActivos()
    {
        return view('admin.components.users.usuarios_activos');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaUsuariosActivos()
    {
        return view('admin.components.users.tabla_usuarios_activos');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_usuariosInactivos()
    {
        return view('admin.components.users.usuarios_inactivos');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaUsuariosInactivos()
    {
        return view('admin.components.users.tabla_usuarios_inactivos');
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewUserForm()
    {   
        return view('admin.components.users.create_user_form',["permissions" => Permiso::all()]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getUsersActive()
    {   
        $users = array();

        $userModel = User::all();
        //dd($userModel);
        foreach($userModel as $um){
            array_push($users,[
                "id" => $um->id,
                "nomina" => $um->nomina,
                "nombre" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                "email" => $um->email,
                "empresa" => $um->getCompanyAssociated()->first()->name,
                "track" => $um->getPositionTrackAssociated()->first()->getTrackAssociated()->first()->name,
                "posicion" => $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->name,
                "area" => $um->getAreaAssociated()->first()->name,
                "plaza" => $um->plaza
                 ]);
        }
        //dd($users);
        return json_encode($users);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getUsersDeactive()
    {   
        $users = array();

        $userModel = User::onlyTrashed()->get();
        //dd($userModel);
        foreach($userModel as $um){
            array_push($users,[
                "id" => $um->id,
                "nomina" => $um->nomina,
                "nombre" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                "email" => $um->email,
                "empresa" => $um->getCompanyAssociated()->first()->name,
                "track" => $um->getPositionTrackAssociated()->first()->getTrackAssociated()->first()->name,
                "posicion" => $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->name,
                "area" => $um->getAreaAssociated()->first()->name,
                "plaza" => $um->plaza
                 ]);
        }
        //dd($users);
        return json_encode($users);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getBosses()
    {   
        $bosses = array();

        $userModel = User::all();
        
        foreach($userModel as $um){
            /*"posicion" => $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->name,
                "area" => $um->getAreaAssociated()->first()->name,*/

            $pu = $um->getPermissionsUser()->get();
            $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
            $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
            
            if($this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pu) 
                or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pa) 
                or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pp)){
                array_push($bosses,[
                    "id" => $um->id,
                    "name" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                    //"boss" => count($um->getPermissionsUser()->get()),
                    //"area" => count($um->getAreaAssociated()->first()->getPermissionsArea()->get())
                ]);
            }
            
            //echo explode(" ",$um->name)[0]." ".$um->apellido_paterno;
        }
        //exit;
        return json_encode($bosses);
    }

    /**
     * 
     *
     * @return Boolean
     */
    private function admin_checkPermission($permission, $permissions)
    {  
        $valid = false;
        
        foreach($permissions as $p){
            //dd($p->getPermissionAssociated());
            if($p->getPermissionAssociated()->first()->access == $permission){
                $valid = true;
                break;
            }
        }

        return $valid;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_saveNewUser(Request $request)
    {
        //
    }
}
