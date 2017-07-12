<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Models\Permisos_Usuario;
use App\Models\Posicion_Track;
use App\Models\Jefe;
use App\User;
use Auth;
use DB;
use File;
use Mail;
use URL;

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

    // permissions
    private $mainPermissions = array( 
                'ps1' => 'Administración',
                'ps2' => 'Personal a cargo',
                'ps3' => 'Capturista de Gastos de Viaje',
                'ps4' => 'Capturista de Harvest',
                'ps5' => 'Vacaciones',
                'ps6' => 'Permisos de Ausencia',
                'ps7' => 'Cartas y Constancias',
                'ps8' => 'Requisiciones',
                'ps9' => 'Evaluaciones',
             );

    private $urlFotoPerfil = "assets/img/app/perfil";

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
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaPersonalACargo()
    {
        return view('admin.components.users.tabla_personal_a_cargo');
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
     * @return \Illuminate\Http\Response
     */
    public function main_getUsersEmployed($id_user)
    {   
        $employees = array();

        $userModel = User::find($id_user)->getEmployees()->get();
        //dd($userModel);
        foreach($userModel as $um){

            $employed = $um->getEmployedAssociated()->first();
            //var_dump($employed);
            array_push($employees,[
                "id" => $employed->id,
                "name" => explode(" ",$employed->name)[0]." ".$employed->apellido_paterno,
                "picture" => explode(".", $employed->photo)[0]
            ]);
            
        }
        return json_encode($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_saveNewUser(Request $request)
    {
        DB::beginTransaction();

        $newUser = array();
        $idUser = 0;

        try{
            $perfil = $request->file('nu_foto');
            
            $newUser = [
                //'id' => 1,
                'name' => $request->input('nu_nombre'),
                'apellido_paterno' => $request->input('nu_apellido_paterno'),
                'apellido_materno' => $request->input('nu_apellido_materno'),
                'photo' => $request->input('nu_nomina').".".$perfil->getClientOriginalExtension(),
                'email' => $request->input('nu_email'),
                'password' => bcrypt("password"),
                'status' => 1,
                'nomina' => $request->input('nu_nomina'),
                'plaza' => $request->input('nu_plaza'),
                'area' => $request->input('nu_area'),
                'posicion_track' => Posicion_Track::where('track',$request->input('nu_track'))->where('posicion',$request->input('nu_posicion'))->first()->id,
                'company' => $request->input('nu_empresa'),
                'fecha_ingreso' => $request->input('nu_fecha_ingreso'),
                'fecha_baja' => null,
                'tipo_baja' => null,
                'motivo' => null
            ];
            
            $filename = $newUser['photo'];
            $upload_success = $perfil->move($this->urlFotoPerfil, $filename);

            $idUser = User::create($newUser);

            //var_dump(explode(",",$request->input('nu_permisos')));

            $permissions_selected = explode(",",$request->input('nu_permisos'));

            foreach($permissions_selected as $ps){
                if($ps != ""){
                    Permisos_Usuario::create([
                        "permiso" => DB::table('permisos')->where('name', $this->mainPermissions[$ps])->value('id'),
                        "usuario" => $idUser->id
                    ]);
                }
            }

            Jefe::create([
                'boss' => $request->input('nu_boss'), 
                'employed' => $idUser->id
            ]);

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
    public function admin_showUserEditForm()
    {
        return view('admin.components.users.update_user_form',["permissions" => Permiso::all()]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getUserDetail($id_user)
    {   
        $userModel = User::find($id_user);

        $user = [
                'id' => $userModel->id,
                'name' => $userModel->name,
                'apellido_paterno' => $userModel->apellido_paterno,
                'apellido_materno' => $userModel->apellido_materno,
                'photo' => $userModel->photo,
                'email' => $userModel->email,
                'password' => $userModel->password,
                'status' => $userModel->status,
                'nomina' => $userModel->nomina,
                'plaza' => $userModel->plaza,
                'area' => $userModel->area,
                'posicion_track' => $userModel->posicion_track,
                'company' => $userModel->company,
                'fecha_ingreso' => $userModel->fecha_ingreso,
                'fecha_baja' => $userModel->fecha_baja,
                'tipo_baja' => $userModel->tipo_baja,
                'motivo' => $userModel->motivo,

                // helpers
                'us_area_id' => $userModel->getAreaAssociated()->first()->id,
                'us_area_name' => $userModel->getAreaAssociated()->first()->name,
                'us_posicion_id' => $userModel->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->id,
                'us_posicion_name' => $userModel->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->name,
                'us_track_id' => $userModel->getPositionTrackAssociated()->first()->getTrackAssociated()->first()->id,
                'us_track_name' => $userModel->getPositionTrackAssociated()->first()->getTrackAssociated()->first()->name,
                'us_image' => explode(".", $userModel->photo)[0],
                'us_ext' => explode(".", $userModel->photo)[1],
                'us_direccion_name' => $userModel->getAreaAssociated()->first()->getDirectionAssociated()->first()->name,
                'us_company_id' => $userModel->getCompanyAssociated()->first()->id,
                'us_company_name' => $userModel->getCompanyAssociated()->first()->name,
                'us_boss_id' => $userModel->getBoss()->first()->getBossAssociated()->first()->id,
                'us_boss_name' => $userModel->getBoss()->first()->getBossAssociated()->first()->name." ".$userModel->getBoss()->first()->getBossAssociated()->first()->apellido_paterno,
                'us_permissions' => $this->admin_getPermissionsEnabledByUser($id_user)
            ];

        return json_encode($user);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_getPermissionsEnabledByUser($id_user)
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
}
