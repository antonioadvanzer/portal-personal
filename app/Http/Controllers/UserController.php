<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Models\Permisos_Usuario;
use App\Models\Posicion_Track;
use App\Models\Jefe;
use App\Models\Nivel;
use App\Models\Vacaciones;
use App\User;
use Auth;
use DB;
use File;
use Mail;
use URL;
use PortalPersonal;

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
    public function main_getPersonalInformationForm()
    {
        return view('main.components.profile.profile_detail');
    }

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
    public function main_tablaPersonalACargo()
    {
        return view('main.components.profile.tabla_personal_a_cargo');
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

        $userModel = User::where('status',1)->get();
        //dd($userModel);
        foreach($userModel as $um){
            array_push($users,[
                "id" => $um->id,
                "nomina" => $um->nomina,
                "nombre" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                "email" => $um->email,
                "photo" => explode(".",$um->photo)[0],
                "photo_ext" => explode(".",$um->photo)[1],
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

        $userModel = User::where('status',0)->get();
        //dd($userModel);
        foreach($userModel as $um){
            array_push($users,[
                "id" => $um->id,
                "nomina" => $um->nomina,
                "nombre" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                "email" => $um->email,
                "photo" => explode(".",$um->photo)[0],
                "photo_ext" => explode(".",$um->photo)[1],
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

        $userModel = User::orderBy('name', 'asc')->get();
        
        foreach($userModel as $um){
            /*"posicion" => $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->name,
                "area" => $um->getAreaAssociated()->first()->name,*/

            $pu = $um->getPermissionsUser()->get();
            $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
            $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
            
            if($this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pu) 
                or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pa) 
                or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pp)){
                
                if($um->status == 1){
                    array_push($bosses,[
                        "id" => $um->id,
                        "name" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                        //"boss" => count($um->getPermissionsUser()->get()),
                        //"area" => count($um->getAreaAssociated()->first()->getPermissionsArea()->get())
                    ]);
                }
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
     public function main_getDirectors()
     {   
         $bosses = array();

        $levelModel = Nivel::where('name','DIRECTOR')
                ->orWhere('name','DIRECTOR ASOCIADO')
                ->orWhere('name','CEO')
                ->get();

        //dd($levelModel);
        foreach($levelModel as $lm){
            
            $positionModel = $lm->getPositions()->get();

            foreach($positionModel as $pm){

                $positionstracksModel = $pm->getPosicionTracks()->get();
                
                //dd($positionstracksModel);
                foreach($positionstracksModel as $psm){
                    
                    $userModel = $psm->getUsers()->get();

                    foreach($userModel as $um){
                            //echo "<br>".$um->name." ".$um->apellido_paterno."<br>";
                        if($um->status == 1){
                            array_push($bosses,[
                                "id" => $um->id,
                                "name" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                            ]);
                        }
                    }
                }

            }
        }

        return json_encode($bosses);
     } 

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function main_getAuthorizers()
     {   
        $bosses = array();
        
        $levelModel = Nivel::Where('name','DIRECTOR ASOCIADO')
                ->orWhere('name','CEO')
                ->get();

        //dd($levelModel);
        foreach($levelModel as $lm){
            
            $positionModel = $lm->getPositions()->get();

            foreach($positionModel as $pm){

                $positionstracksModel = $pm->getPosicionTracks()->get();
                
                //dd($positionstracksModel);
                foreach($positionstracksModel as $psm){
                    
                    $userModel = $psm->getUsers()->get();

                    
                    foreach($userModel as $um){
                            //echo "<br>".$um->name." ".$um->apellido_paterno."<br>";
                        if($um->status == 1){
                            array_push($bosses,[
                                "id" => $um->id,
                                "name" => explode(" ",$um->name)[0]." ".$um->apellido_paterno,
                            ]);
                        }
                    }
                }

            }
        }

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
            if($employed->status == 1){
                array_push($employees,[
                    "id" => $employed->id,
                    "name" => explode(" ",$employed->name)[0]." ".$employed->apellido_paterno,
                    "picture" => explode(".", $employed->photo)[0]
                ]);
            }
            
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
            
            $cierre = PortalPersonal::calculaFechaCierre(12, $idUser->fecha_ingreso);
            $expiracion = PortalPersonal::calculaFechaCierre(18, $cierre);

            Vacaciones::create([
                'user' => $idUser->id, 
                'type' => DB::table('tipos_dias')->where('name', 'Proporcionales')->value('id'),
                'accumulated_days' => 0, 
                'increased_days' => 0, 
                'corresponding_days' => 6, 
                'start_date'  => $idUser->fecha_ingreso, 
                'close_date' => $cierre, 
                'expiration_date' => $expiracion, 
                'year' => 1, 
                'status' => 1
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function admin_updateUser(Request $request)
     {
        DB::beginTransaction();

        $user = array();
        $idUser = 0;

        $user = [
            //'id' => 1,
            'name' => $request->input('uu_nombre'),
            'apellido_paterno' => $request->input('uu_apellido_paterno'),
            'apellido_materno' => $request->input('uu_apellido_materno'),
            //'photo' => $request->input('uu_nomina').".".$perfil->getClientOriginalExtension(),
            'email' => $request->input('uu_email'),
            //'password' => bcrypt("password"),
            'status' => 1,
            'nomina' => $request->input('uu_nomina'),
            'plaza' => $request->input('uu_plaza'),
            'area' => $request->input('uu_area'),
            'posicion_track' => Posicion_Track::where('track',$request->input('uu_track'))->where('posicion',$request->input('uu_posicion'))->first()->id,
            'company' => $request->input('uu_empresa'),
            'fecha_ingreso' => $request->input('uu_fecha_ingreso'),
            'fecha_baja' => null,
            'tipo_baja' => null,
            'motivo' => null
        ];

        if($perfil = $request->file('uu_foto')){
            $user['photo'] = $request->input('uu_nomina').".".$perfil->getClientOriginalExtension();
            $upload_success = $perfil->move($this->urlFotoPerfil, $user['photo']);
        }

        //echo $request->input('uu_permisos');

        $user_update = User::find($request->input('uu_id'));
        //dd($user_update);
        try{

            $user_update->name = $user['name'];
            $user_update->apellido_paterno = $user['apellido_paterno'];
            $user_update->apellido_materno = $user['apellido_materno'];

            if($perfil){
                $user_update->photo = $user['photo'];
            }
            $user_update->email = $user['email'];
            $user_update->nomina = $user['nomina'];
            $user_update->plaza = $user['plaza'];
            $user_update->area = $user['area'];
            $user_update->posicion_track = $user['posicion_track'];
            $user_update->company = $user['company'];
            $user_update->fecha_ingreso = $user['fecha_ingreso'];

            $user_update->save();
            
            Permisos_Usuario::where('usuario',$request->input('uu_id'))->delete();

            $permissions_selected = explode("-",$request->input('uu_permisos'));
            
            foreach($permissions_selected as $ps){
                if($ps != ""){
                    Permisos_Usuario::create([
                        //"permiso" => DB::table('permisos')->where('name', $this->mainPermissions[$ps])->value('id'),
                        "permiso" => $ps,
                        "usuario" => $request->input('uu_id')
                    ]);
                    //echo $ps."<br>";
                }
            }

            //var_dump($user);

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
    public function admin_getUserDetail($id_user)
    {   
        $userModel = User::find($id_user);

        if(!$userModel){
            $userModel = User::withTrashed()
            ->where('id', $id_user)
            ->first(); 
        }

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
                'us_permissions' => $this->admin_getPermissionsEnabledByUser($id_user),
                'us_permissions_user' => PortalPersonal::getPermissionsToEditUser($id_user)
            ];

        return json_encode($user);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_existNomina($number_nomina = 0)
    {  
        $nomina = User::withTrashed()->where("nomina", $number_nomina)->first();

        if($nomina){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_existEmail($email_address = "")
    {  
        $email = User::withTrashed()->where("email", $email_address)->first();

        if($email){
            return 1;
        }else{
            return 0;
        }
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
        
        //$pu = $um->getPermissionsUser()->get();
        $pa = $um->getAreaAssociated()->first()->getPermissionsArea()->get();
        $pp = $um->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->getPermissionsPositions()->get();
        
        if($this->admin_checkPermission($this->adminPermissions['ADMINISTRACION'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['ADMINISTRACION'], $pp)){
                $permissions.="1";
        }

        if($this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['PERSONAL_A_CARGO'], $pp)){
                $permissions.=",2";
        }

        if($this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_GASTOS_DE_VIAJE'], $pp)){
                $permissions.=",3";
        }

        if($this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_HARVEST'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['CAPTURISTA_DE_HARVEST'], $pp)){
                $permissions.=",4";
        }

        if($this->admin_checkPermission($this->adminPermissions['VACACIONES'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['VACACIONES'], $pp)){
                $permissions.=",5";
        }

        if($this->admin_checkPermission($this->adminPermissions['PERMISOS_DE_AUSENCIA'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['PERMISOS_DE_AUSENCIA'], $pp)){
                $permissions.=",6";
        }

        if($this->admin_checkPermission($this->adminPermissions['CARTAS_Y_CONSTANCIAS'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['CARTAS_Y_CONSTANCIAS'], $pp)){
                $permissions.=",7";
        }

        if($this->admin_checkPermission($this->adminPermissions['REQUISICIONES'], $pa) 
            or $this->admin_checkPermission($this->adminPermissions['REQUISICIONES'], $pp)){
                $permissions.=",8";
        }

        if($this->admin_checkPermission($this->adminPermissions['EVALUACIONES'], $pa) 
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
