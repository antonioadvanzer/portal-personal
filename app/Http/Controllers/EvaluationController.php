<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use File;
use Mail;
use URL;
use PortalPersonal;

class EvaluationController extends Controller
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

    public $url_gestion_desempenio = 'http://localhost:8080/advanzer_evaluacion';
    
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_information()
    {
        return view('main.components.evaluation.information');
    }

    /**
     * Embedded Site App
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_gestionDesempenio()
    {
        return view('admin.components.evaluation.gestion_desempenio');
    }

    /**
     * Embedded Site App - user mode
     *
     * @return \Illuminate\Http\Response
     */
    public function main_evaluar()
    {
        return view('main.components.evaluation.iframe.evaluar', ["url" => $this->url_gestion_desempenio.'/evaluar']);
    }

    /**
     * Embedded Site App - user mode
     *
     * @return \Illuminate\Http\Response
     */
    public function main_compromisosInternos()
    {
        return view('main.components.evaluation.iframe.compromisos_internos', ["url" => $this->url_gestion_desempenio.'/evaluacion/ci']);
    }

    /**
     * Embedded Site App - user mode
     *
     * @return \Illuminate\Http\Response
     */
    public function main_perfilEvaluacion()
    {
        return view('main.components.evaluation.iframe.perfil_evaluacion', ["url" => $this->url_gestion_desempenio.'/evaluacion/perfil']);
    }

    /**
     * Embedded Site App - user mode
     *
     * @return \Illuminate\Http\Response
     */
    public function main_historialDesempenio()
    {
        return view('main.components.evaluation.iframe.historial_desempenio', ["url" => $this->url_gestion_desempenio.'/historial']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_resultadosEvaluaciones()
    {
        return view('admin.components.evaluation.iframe.resultados_evaluaciones', ["url" => $this->url_gestion_desempenio.'/evaluacion']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */ 
    public function admin_evaluacionesPorEvaluador()
    {
        return view('admin.components.evaluation.iframe.evaluaciones_por_evaluador', ["url" => $this->url_gestion_desempenio.'/evaluacion/por_evaluador']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_evaluacionesPendientes()
    {
        return view('admin.components.evaluation.iframe.evaluaciones_pendientes', ["url" => $this->url_gestion_desempenio.'/evaluacion/pendientes']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_responsabilidadesFuncionales()
    {
        return view('admin.components.evaluation.iframe.responsabilidades_funcionales', ["url" => $this->url_gestion_desempenio.'/administrar_dominios']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_competenciasLaborales()
    {
        return view('admin.components.evaluation.iframe.competencias_laborales', ["url" => $this->url_gestion_desempenio.'/administrar_indicadores']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_gestionTiemposEvaluaciones()
    {
        return view('admin.components.evaluation.iframe.gestion_tiempos_evaluaciones', ["url" => $this->url_gestion_desempenio.'/evaluacion/proyecto']);
    }

    /**
     * Embedded Site App - admin mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_administrarEvaluaciones()
    {
        return view('admin.components.evaluation.iframe.administrar_evaluaciones', ["url" => $this->url_gestion_desempenio.'/evaluaciones']);
    }

    /**
     * Embedded Site App - user mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_resumenEvaluacion360()
    {
        return view('admin.components.evaluation.iframe.resumen_evaluacion_360', ["url" => $this->url_gestion_desempenio.'/evaluacion/resumen']);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_listaResultadosEvaluaciones()
    {
        return view('admin.components.evaluation.resultados_evaluaciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaResultadosEvaluaciones()
    {
        return view('admin.components.evaluation.tabla_resultados_evaluaciones');
    }

    /**
     * http://localhost:8000/admin-theme/modules/evaluation/list_results_evaluations/2016
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getResultadosEvaluaciones($year)
    { 
       $result = DB::table('users')
                    ->join('posiciones_tracks', 'posiciones_tracks.id', '=', 'users.posicion_track')
                    ->join('posiciones', 'posiciones.id', '=', 'posiciones_tracks.posicion')
                    ->join('tracks', 'tracks.id', '=', 'posiciones_tracks.track')
                    ->select('users.id', 'users.email', 'users.photo', 'users.name as nombre', 'users.apellido_paterno', 'users.nomina', 'posiciones.name as posicion', 'tracks.name as track', 'users.fecha_ingreso', 'posiciones.nivel as nivel_posicion')
                    ->where('users.status',1)
                    ->whereDate('users.fecha_ingreso', '<=', date($year.'-09-30'))
                    ->get();
                
        //dd($result);

        $resultados = array();

        foreach($result as $colaborador){
            $resultados[] = array_merge(
                                [
                                    'id' => $colaborador->id,
                                    'email' => $colaborador->email,
                                    'photo' => explode(".",$colaborador->photo)[0],
                                    "photo_ext" => explode(".",$colaborador->photo)[1],
                                    'nombre' => explode(" ",$colaborador->nombre)[0],
                                    'apellido_paterno' => $colaborador->apellido_paterno,
                                    'nomina' => $colaborador->nomina,
                                    'posicion' => $colaborador->posicion,
                                    'track' => $colaborador->track,
                                    'fecha_ingreso' => $colaborador->fecha_ingreso,
                                    'nivel_posicion' => $colaborador->nivel_posicion,
                                ] ,
                                $this->admin_getResultadosByColaborador($colaborador)
                            );
        }

        //dd($resultados);

        return json_encode($resultados);
    }  

    /**
     * Internal Function
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_getResultadosByColaborador($colaborador, $evaluacion = null)
    {   
        $empleado = array();

        if(empty($evaluacion)){
            $evaluacion = $this->admin_getEvaluacionAnual();
        }

        $anio = null;

        if($evaluacion != null){
            $anio = $this->admin_getEvaluacionById($evaluacion)->anio;
        }
        
        $res = DB::table('gd_resultados_evaluacion')
                    ->where('colaborador', $colaborador->id)
                    ->where('evaluacion', $evaluacion)
                    ->first();

        //dd(count($res[0]));
        //dd(count($res));

        if(count($res) == 1){

            $empleado['rating'] = $res->rating;
			$empleado['comentarios'] = $res->comentarios;
            $empleado['total'] = $res->total;
            $empleado['nf_total'] = number_format(floor($res->total * 100) / 100,2);
			$empleado['cumple_gastos'] = $res->cumple_gastos;
			$empleado['cumple_harvest'] = $res->cumple_harvest;
			$empleado['cumple_cv'] = $res->cumple_cv;

            $res = DB::table('gd_feedbacks')
                    ->join('users', 'users.id', '=', 'gd_feedbacks.feedbacker')
                    ->select('gd_feedbacks.id', 'gd_feedbacks.estatus', 'gd_feedbacks.feedbacker', 'gd_feedbacks.fortalezas', 'gd_feedbacks.oportunidad', 'gd_feedbacks.compromisos', 'users.name')
                    ->where('gd_feedbacks.resultado', $res->id)
                    ->where('users.status',1)
                    ->first();

            if(count($res) == 0){
                $empleado['feedback'] = [
                    'id' => " ",
                    'estatus' => " ",
                    'feedbacker' => " ",
                    'oportunidad' => " ",
                    'compromisos' => " ",
                    'nombre' => " "
                ];
            }else{
                $empleado['feedback'] = [
                    'id' => $res->id,
                    'estatus' => $res->estatus,
                    'feedbacker' => $res->feedbacker,
                    'oportunidad' => $res->oportunidad,
                    'compromisos' => $res->compromisos,
                    'nombre' => $res->name
                ];
            }
            

        }else{

            $empleado['rating'] = " ";
			$empleado['comentarios'] = " ";
            $empleado['total'] = " ";
            $empleado['nf_total'] = " ";
			$empleado['cumple_gastos'] = " ";
			$empleado['cumple_harvest'] = " ";
            $empleado['cumple_cv'] = " ";
            $empleado['feedback'] = [
                'id' => " ",
                'estatus' => " ",
                'feedbacker' => " ",
                'oportunidad' => " ",
                'compromisos' => " ",
                'nombre' => " "
            ];

        }

        $empleado['proyecto'] = " ";
        $empleado['evaluadores360'] = " ";
        $empleado['evaluadoresProyecto'] = " ";

        # Obtener evaluacion360 si es de nivel 3-4-5
        
        $posicion = $this->admin_getPosicionByColaborador($colaborador->id);

        # Totalizado
        
        $res = DB::table('gd_resultados_ev_competencia')
                ->join('gd_evaluadores', 'gd_evaluadores.id', '=', 'gd_resultados_ev_competencia.asignacion')
                ->select('gd_resultados_ev_competencia.total')
                ->where('gd_evaluadores.evaluado', $colaborador->id)
                ->where('gd_evaluadores.anual', 1)
                ->where('gd_evaluadores.evaluacion', $evaluacion)
                ->first();

        
        if(count($res) == 1){
            $empleado['competencias'] = $res->total;
        }else{
            $empleado['competencias'] = 0;
        }

        $res = DB::table('gd_resultados_ev_responsabilidad')
                ->join('gd_evaluadores', 'gd_evaluadores.id', '=', 'gd_resultados_ev_responsabilidad.asignacion')
                ->select('gd_resultados_ev_responsabilidad.total')
                ->where('gd_evaluadores.evaluado', $colaborador->id)
                ->where('gd_evaluadores.anual', 1)
                ->where('gd_evaluadores.evaluacion', $evaluacion)
                ->first();

        if(count($res) == 1){
            $empleado['responsabilidades'] = $res->total;
        }else{
            $empleado['responsabilidades'] = 0;
        }

        if($posicion >=3 && $posicion <= 5){

            $res = DB::table('gd_resultados_ev_competencia')
                    ->join('gd_evaluadores', 'gd_evaluadores.id', '=', 'gd_resultados_ev_competencia.asignacion')
                    ->select(DB::raw("AVG(gd_resultados_ev_competencia.total) as total"))
                    ->where('gd_evaluadores.evaluado', $colaborador->id)
                    ->where('gd_evaluadores.evaluador', '!=', $colaborador->id)
                    ->where('gd_evaluadores.anual', 0)
                    ->where('gd_evaluadores.evaluacion', $evaluacion)
                    ->first();

            if(count($res) == 1){
                $empleado['tres60'] = $res->total;
            }else{
                $empleado['tres60'] = 0;
            }

            # Listado de evaluadores

            $jefe = DB::table('gd_evaluadores')
                    ->select('evaluador')
                    ->where('evaluado', $colaborador->id)
                    ->where('gd_evaluadores.anual', 1)
                    ->where('gd_evaluadores.evaluacion', $evaluacion)
                    ->first();
            
            if(count($jefe) == 1){
                $jefe = $jefe->evaluador;
            }else{
                $jefe = 0;
            }

            $evaluadores360 = DB::table('users')
                                ->join('gd_evaluadores', 'gd_evaluadores.evaluador', '=', 'users.id')
                                ->join('gd_evaluaciones', 'gd_evaluaciones.id', '=', 'gd_evaluadores.evaluacion')
                                ->select('users.id', 'users.photo', 'users.name', 'users.apellido_paterno', 'gd_evaluadores.id as asignacion', 'gd_evaluadores.comentarios', 'gd_evaluaciones.nombre as evaluacion')
                                ->where('gd_evaluaciones.estatus', '!=', 0)
                                ->where('gd_evaluaciones.id', $evaluacion)
                                ->where('gd_evaluadores.evaluado', $colaborador->id)
                                ->where('gd_evaluadores.evaluador', '!=', $jefe)
                                ->where('gd_evaluadores.evaluador', '!=', $colaborador->id)
                                ->where('gd_evaluadores.anual', 0)
                                ->get();

            $eva360 = array();

            $ignore=array();

            foreach($evaluadores360 as $evaluador){

                array_push($ignore, $evaluador->id);
                
                $competencia = "";

                if(count($res) == 1){
                    $competencia = $res->total;
                }

                $eva360[] = [
                    'id' => $evaluador->id,
                    'photo' => $evaluador->photo,
                    'name' => $evaluador->name,
                    'apellido_paterno' => $evaluador->apellido_paterno,
                    'asignacion' => $evaluador->asignacion,
                    'comentarios' => $evaluador->comentarios,
                    'evaluacion' => $evaluador->evaluacion,
                    'competencia' => $competencia
                ];

                $empleado['evaluadores360'] = $eva360;
            }

            /*if (!empty($ignore))
            $this->db->where_not_in('U.id',$ignore);*/
            
        }

        # Evaluadores

        $res = DB::table('users')
                ->join('gd_evaluadores', 'gd_evaluadores.evaluador', '=', 'users.id')
                ->join('gd_evaluaciones', 'gd_evaluaciones.id', '=', 'gd_evaluadores.evaluacion')
                ->select('users.id', 'users.photo', 'users.name', 'users.apellido_paterno', 'gd_evaluadores.id as asignacion', 'gd_evaluadores.comentarios', 'gd_evaluaciones.nombre as evaluacion', 'gd_evaluadores.anual', 'gd_evaluaciones.tipo')
                ->where('gd_evaluaciones.estatus', '!=', 0)
                ->where('gd_evaluaciones.id', $evaluacion)
                ->where('gd_evaluadores.evaluado', $colaborador->id)
                ->where('gd_evaluadores.evaluador', '!=', $colaborador->id)
                ->where('gd_evaluadores.anual', 1)
                ->get();

        $evaluadores = array();

        foreach($res as $evaluador){

            $res = DB::table('gd_resultados_ev_competencia')
                    ->where('asignacion', $evaluador->asignacion)
                    ->first();
            
            $competencia = "";
            
            if(count($res) == 1){
                $competencia = $res->total;
            }

            $res = DB::table('gd_resultados_ev_responsabilidad')
                    ->where('asignacion', $evaluador->asignacion)
                    ->first();

            $responsabilidad = "";

            if(count($res) == 1){
                $responsabilidad = $res->total;
            }

            $total = ($competencia * 0.3) + ($responsabilidad * 0.7);
			
			//$asignacion = $evaluador->asignacion;

            $evaluadores[] = [
                'id' => $evaluador->id,
                'photo' => $evaluador->photo,
                'name' => $evaluador->name,
                'apellido_paterno' => $evaluador->apellido_paterno,
                'asignacion' => $evaluador->asignacion,
                'comentarios' => $evaluador->comentarios,
                'evaluacion' => $evaluador->evaluacion,
                'anual' => $evaluador->anual,
                'tipo' => $evaluador->tipo,
                'competencia' => $competencia,
                'responsabilidad' => $responsabilidad,
                'total' => $total
            ];
        }

        $empleado['evaluadores'] = $evaluadores;

        # Autoevaluacion

        $res = DB::table('gd_resultados_ev_competencia')
                ->join('gd_evaluadores', 'gd_evaluadores.id', '=', 'gd_resultados_ev_competencia.asignacion')
                ->select('gd_resultados_ev_competencia.total', 'gd_evaluadores.comentarios', 'gd_evaluadores.id as asignacion')
                ->where('gd_evaluadores.evaluado', $colaborador->id)
                ->where('gd_evaluadores.evaluador', $colaborador->id)
                ->where('gd_evaluadores.evaluacion', $evaluacion)
                ->first();

        $autoevaluacion = 0;
        $auto = "";

        if(count($res) == 1){
            $autoevaluacion = $res->total;
			$auto = ['total' => $res->total, 'comentarios' => $res->comentarios, 'asignacion' => $res->asignacion];
        }

        $empleado['autoevaluacion'] = $autoevaluacion;
        $empleado['auto'] = $auto;

        # Evaluaciones por proyecto

        $proyectos = "";

        if($proyectos = $this->admin_getEvaluacionesProyecto($anio)){
            
            $ids = array();

            foreach ($proyectos as $row){
                array_push($ids, $row->id);
            }
            
            # Totales para index

            $res = DB::table('gd_resultados_ev_responsabilidad')
                    ->join('gd_evaluadores', 'gd_evaluadores.id', '=', 'gd_resultados_ev_responsabilidad.asignacion')
                    ->join('gd_evaluaciones', 'gd_evaluaciones.id', '=', 'gd_evaluadores.evaluacion')
                    ->select('gd_resultados_ev_responsabilidad.total', 'gd_evaluaciones.fin_periodo', 'gd_evaluaciones.inicio_periodo')
                    ->where('gd_evaluadores.evaluado', $colaborador->id)
                    ->whereIn('gd_evaluaciones.id',$ids)
                    ->get();

            if(count($res) > 0){
                
                $proyectos=0;
                $dias_total = 0;

                foreach ($res as $info){
                    $diferencia = date_diff(date_create($info->inicio_periodo),date_create($info->fin_periodo));
                    $dias = (int) $diferencia->format("%a");
                    $dias_total += $dias;
                }

                foreach ($res as $info){
                    $diferencia = date_diff(date_create($info->inicio_periodo),date_create($info->fin_periodo));
                    $dias = (int) $diferencia->format("%a");
                    
                    if($dias == 0){
                        $dias=1;
                    }else{
                        $dias = $dias;
                    }

                    $proyectos += $info->total * ($dias/$dias_total);
                }

                $empleado['proyectos'] = $proyectos;
            }

            $evaluadoresProyecto = array();

            $evaluadores_proyecto = DB::table('users as U')
                                    ->join('gd_evaluadores as E', 'E.evaluador', '=', 'U.id')
                                    ->join('gd_evaluaciones as Ev', 'Ev.id', '=', 'E.evaluacion')
                                    ->select('U.id','U.photo', 'U.name', 'U.apellido_paterno', 'E.id as asignacion', 'Ev.nombre as evaluacion', 'E.comentarios', 'Ev.fin_periodo', 'Ev.inicio_periodo')
                                    ->where('Ev.estatus', '!=', 0)
                                    ->where('E.evaluado', $colaborador->id)
                                    ->where('E.evaluador', '!=', $colaborador->id)
                                    ->whereIn('Ev.id', $ids)
                                    //->orderBy('Ev.nombre, U.name')
                                    ->get();

            
            foreach ($evaluadores_proyecto as $evaluador){
                
                $res = DB::table('gd_resultados_ev_responsabilidad')
                        ->where('asignacion', $evaluador->asignacion)
                        ->first();

				$responsabilidad = 0;

                if(count($res) == 1){
                    $responsabilidad = $res->total;
                }

                $evaluadoresProyecto[] = [ 'id' => $evaluador->id, 
                                            'photo' => $evaluador->photo, 
                                            'name' => $evaluador->name,
                                            'apellido_paterno' => $evaluador->apellido_paterno, 
                                            'asignacion' => $evaluador->asignacion,
                                            'evaluacion' => $evaluador->evaluacion, 
                                            'comentarios' => $evaluador->comentarios,
                                            'fin_periodo' => $evaluador->fin_periodo,
                                            'inicio_periodo' => $evaluador->inicio_periodo,
                                            'responsabilidad' => $responsabilidad
                                        ];
                
            }

            $empleado['evaluadoresProyecto'] = $evaluadoresProyecto;

        }

        # Calculos adicionales

        /*$total_c=0;
        $total_r=0;
        
        if($empleado['nivel_posicion'] <= 5){
            $total_c = ($evaluador->autoevaluacion + $colab->tres60 + $colab->competencias)/3;
        }else{
            $total_c = ($evaluador->autoevaluacion + $colab->competencias)/2;
        }
        if(isset($evaluador->proyectos)){
            $total_r = ($evaluador->responsabilidades+$colab->proyectos)/2;
        }else{
            $total_r = $evaluador->responsabilidades;
        }

        $empleado['total_c'] = $total_c;
        $empleado['total_r'] = $total_r;*/

        // continuar...

       /* number_format(floor($total_c*100)/100,2);
        number_format(floor($colab->autoevaluacion*100)/100,2);
        number_format(floor($colab->competencias*100)/100,2);
        
        if(isset($colab->tres60)) {
            echo number_format(floor($colab->tres60*100)/100,2);
        }*/

        # Resultado
        return $empleado;
    }

    /**
     * Internal Function
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_getPosicionByColaborador($evaluado)
    {
       $res = DB::table('users')
                ->join('posiciones_tracks', 'posiciones_tracks.id', '=', 'users.posicion_track')
                ->join('posiciones', 'posiciones.id', '=', 'posiciones_tracks.posicion')
                ->select('posiciones.nivel')
                ->where('users.id', $evaluado)
                ->first();

        if(count($res) > 0){
            ($res->nivel < 3) ? $res = 3 : $res = $res->nivel;
        }else{
            $res = false;
        }

		return $res;
    }

    /**
     * Internal Function
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_getEvaluacionesProyecto($anio = null)
    {
        if($anio == null){
            $anio = date('Y') - 1;
        }

        $result = DB::table('gd_evaluaciones')
                ->where('tipo', 0)
                ->where('anio', $anio)
                ->whereIn('estatus',[1,2])
                ->get();

        if(count($result) != 0){
            return $result;
        }else{
            return false;
        }        
    }

    /**
     * Internal Function
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_getEvaluacionAnual()
    {
        $result = DB::table('gd_evaluaciones')
                    ->select(DB::raw("MAX(id) as id"))
                    ->where('tipo', 1)
                    ->whereDate('inicio', '<=', date('Y-m-d'))
                    ->whereIn('estatus',[1,2])
                    ->first();

        if(count($result) != 0){
            return $result->id;
        }else{
            return false;
        }  
    }

/**
     * Internal Function
     *
     * @return \Illuminate\Http\Response
     */
    private function admin_getEvaluacionById($id)
    {
        return DB::table('gd_evaluaciones')
                ->where('id', $id)
                ->first();
    }
}
