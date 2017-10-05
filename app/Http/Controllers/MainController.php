<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use Auth;
use Socialite;
use App\User;
use PortalPersonal;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //dd(Auth::user());
        //dd($this->getThemeComponets());
        
        return view('main.main',[
            "components" => $this->getThemeComponets(),
            "user" => $this->getUserData(),
            "permissions" => $this->getUserPermissions()
            ]);        
    }
    
    /**
     * call a google login account
     *
     * @return \Illuminate\Http\Response
     */ 
    public function main_redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $userModel = User::where('email', $user->email)
            ->first();

        if($userModel){
            if (Auth::attempt(['email' => $userModel->email, 'password' => $userModel->password])) {
                // Authentication passed...
                return redirect()->intended('/');
            }else{
                return redirect('/auth');
            }
        }else{
            return redirect('/auth');
        }

    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function mainView()
    {   
        return view('main.components.main.main');        
    }

     /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function adminView()
    {   
        return view('admin.components.main.main');        
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function mainViewHome()
    {   
        //return view('main.components.main.home');
        return view('main.components.main.main_wellcome');        
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function mainViewHomeAlerts()
    {   
        return view('main.components.main.main_alerts');        
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function adminViewHomeAlerts()
    {   
        return view('admin.components.main.main_alerts');        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('admin.main',[
            "components" => $this->getAdminThemeComponets(),
            "modules" => $this->getAdminThemeComponetsModules(),
            "user" => $this->getUserData()
            ]);        
    }

    private $componets = array( 
                't_backTop' => 'theme/back_top',
                't_baSidebar' => 'theme/ba_sidebar',
                't_baWizard' => 'theme/ba_wizard',
                't_contentTo' => 'theme/content_top',
                't_msgCenter' => 'theme/msg_center',
                't_pageTop' => 'theme/page_top',
                't_progressBarRound' => 'theme/progress_bar_round'
             );
    
    private $adminComponets = array( 
                't_backTop' => 'admin-theme/back_top',
                't_baSidebar' => 'admin-theme/ba_sidebar',
                't_baWizard' => 'admin-theme/ba_wizard',
                't_contentTo' => 'admin-theme/content_top',
                't_msgCenter' => 'admin-theme/msg_center',
                't_pageTop' => 'admin-theme/page_top',
                't_progressBarRound' => 'admin-theme/progress_bar_round'
             );

    /**
     * Display auth view.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth()
    {
        return view('main.auth');
    }

    /**
     * Display 404 error view.
     *
     * @return \Illuminate\Http\Response
     */
    public function nf404()
    {
        return view('main.404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get a group of variables.
     *
     * @return \Illuminate\Http\Response
     */
    private function getUserData()
    {   
        $variables = "";
        
        $fields = array(
            "id" => Auth::user()->id,
            "name" => Auth::user()->name,
            "apellido_paterno" => Auth::user()->apellido_paterno,
            "apellido_materno" => Auth::user()->apellido_materno,
            "photo" => Auth::user()->photo,
            "email" => Auth::user()->email,
            "password" => Auth::user()->password,
            "status" => Auth::user()->status,
            "nomina" => Auth::user()->nomina,
            "plaza" => Auth::user()->plaza,
            "area" => Auth::user()->area,
            "posicion_track" => Auth::user()->posicion_track,
            "company" => Auth::user()->company,
            "fecha_ingreso" => Auth::user()->fecha_ingreso,
            "fecha_baja" => Auth::user()->fecha_baja,
            "fecha_reingreso" => Auth::user()->fecha_reingreso,
            "tipo_baja" => Auth::user()->tipo_baja,
            "motivo" => Auth::user()->motivo,
            "remember_token" => Auth::user()->remenber_token,
            "created_at" => Auth::user()->created_at,
            "updated_at" => Auth::user()->update_at,
            "deleted_at" => Auth::user()->delete_at,

            //form
            "is_admin" => PortalPersonal::isAdministrator(Auth::user()->id),
            "is_boss" => PortalPersonal::isBoss(Auth::user()->id),
            "short_name" => explode(" ",Auth::user()->name)[0],
            "full_name" => Auth::user()->name." ".Auth::user()->apellido_paterno." ".Auth::user()->apellido_materno,
            "area_actual" => Auth::user()->getAreaAssociated()->first()->name,
            "antiguedad" => date_diff(date_create(Auth::user()->fecha_ingreso), date_create(date('Y-m-d')))->format('%y Años %m Meses %d días'),
            "anios_trabajando" => intval(date_diff(date_create(Auth::user()->fecha_ingreso), date_create(date('Y-m-d')))->format('%y'))+1,
            "picture_name" => explode(".",Auth::user()->photo)[0],
            "picture_ext" => explode(".",Auth::user()->photo)[1],

            "area_name" => Auth::user()->getAreaAssociated()->first()->name,
            "direction_name" => Auth::user()->getAreaAssociated()->first()->getDirectionAssociated()->first()->name,
            "track_name" => Auth::user()->getPositionTrackAssociated()->first()->getTrackAssociated()->first()->name,
            "position_name" => Auth::user()->getPositionTrackAssociated()->first()->getPosicionAssociated()->first()->name,
            "company_name" => Auth::user()->getCompanyAssociated()->first()->name,
            "boss_name" => Auth::user()->getBoss()->first()->getBossAssociated()->first()->name,

            "total_days_available" => PortalPersonal::getTotalDays(Auth::user()->id) - PortalPersonal::getDaysInRequests(Auth::user()->id),
        );

        foreach($fields as $fie => $f){
            $variables.=("user.".$fie."='".$f."';");
        }

        return $variables;
    }

    /**
     * Get a group of variables.
     *
     * @return \Illuminate\Http\Response
     */
    private function getThemeComponets()
    {   
        $variables = "";

        foreach($this->componets as $com => $c){
            $variables.=("theme.".$com."='".URL::to($c)."';");
        }

        return $variables;
    }

    /**
     * Get a group of variables.
     *
     * @return \Illuminate\Http\Response
     */
    private function getAdminThemeComponets()
    {   
        $variables = "";

        foreach($this->adminComponets as $com => $c){
            $variables.=("theme.".$com."='".URL::to($c)."';");
        }

        return $variables;
    }

    /**
     * Get a group of variables.
     *
     * @return \Illuminate\Http\Response
     */
    private function getUserPermissions(){
        
        $permissions = PortalPersonal::getPermissionsEnabledByUser(Auth::user()->id);

        $permissions = explode(",", $permissions);
        //dd($permissions);
        //dd(PortalPersonal::getModulesAccordingPermissions($permissions));
        return PortalPersonal::getModulesAccordingPermissions($permissions);
    }

    /**
     * Get a group of variables.
     *
     * @return \Illuminate\Http\Response
     */
    private function getAdminThemeComponetsModules()
    {   
        $variables = "";

        foreach($this->adminComponetsModules as $com => $c){
            $variables.=("modules.".$com."='".URL::to($c)."';");
        }

        return $variables;
    }

    // components of modules admin mode
    private $adminComponetsModules = array( 
            'am_usuariosActivos' => 'admin-theme/modules/usuarios_activos',
            'am_tablaUsuariosActivos' => 'admin-theme/modules/tabla_usuarios_activos'
        );
}
