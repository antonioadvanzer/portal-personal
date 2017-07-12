<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use DB;

class DirectionController extends Controller
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
    public function admin_listaDirecciones()
    {
        return view('admin.components.directions.lista_direcciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaDirecciones()
    {
        return view('admin.components.directions.tabla_direcciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewDirection()
    {
        return view('admin.components.directions.crear_direccion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewDirectionForm()
    {
        return view('admin.components.directions.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewDirection(Request $request)
    {   
        DB::beginTransaction();
        
        $newDirection = array();
        
        try{

            $newDirection = [
                'name' => $request->input('dir_name')
            ];

            Direccion::create($newDirection);
        
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
    public function admin_showDirection()
    {   
        return view('admin.components.directions.ver_direccion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getDirectionForm()
    {   
        return view('admin.components.directions.detalle_direccion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getDirectionDetail($id_direction)
    {   
        $direccion = Direccion::find($id_direction);

        $direccionDetalle = [
                'id' => $id_direction,
                'name' => $direccion->name,
                'eliminable' => $direccion->getAreas()->get()->count()
            ];

        return json_encode($direccionDetalle);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_updateDirection(Request $request)
    {   
        $direccion = Direccion::find($request->input('dir_id'));
        $direccion->name = $request->input('dir_name');
        $direccion->save();

        return "success";
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getListDirections()
    {   
        $directions = array();

        $directionsModel = Direccion::all();
        
        foreach($directionsModel as $pm){
            array_push($directions,[
                "id" => $pm->id,
                "name" => $pm->name
                 ]);
        }
        
        return json_encode($directions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_findDirectionUsingArea($id_area)
    {
        $direction = array();

        $directionModel = Direccion::where("id",$id)->first();
        
        $direction = [
            "id" => $directionModel->id,
            "name" => $directionModel->name
        ];
        
        return json_encode($direction);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaAreasPorDireccion()
    {
        return view('admin.components.directions.tabla_areas_por_direccion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAreasByDirection($id_direction)
    {   
        $areas = array();

        $directionModel = Direccion::find($id_direction)->getAreas()->get();
        
        foreach($directionModel as $dm){

            array_push($areas,[
                "id" => $dm->id,
                "name" => $dm->name
            ]);
            
        }
        return json_encode($areas);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_deleteDirection($id_direction)
    {   
        $direccion = Direccion::find($id_direction);
        
        DB::beginTransaction();

        try{
            
            $direccion->delete();
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        return "success";
    }
}
