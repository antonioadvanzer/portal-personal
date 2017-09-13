<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Permisos_Area;
use DB;

class AreaController extends Controller
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
    public function admin_listaAreas()
    {
        return view('admin.components.areas.lista_areas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaAreas()
    {
        return view('admin.components.areas.tabla_areas');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewArea()
    {
        return view('admin.components.areas.crear_area');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewAreaForm()
    {
        return view('admin.components.areas.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewArea(Request $request)
    {   
        DB::beginTransaction();
        
        $newArea = array();
        
        try{

            $newArea = [
                'name' => $request->input('ar_name'),
                'direccion' => $request->input('ar_direction')
            ];

            $idArea = Area::create($newArea);

            $permissions = explode('-', $request->input('ar_permissions'));
            
            foreach($permissions as $p){
                //echo $p;
                if($p){
                    Permisos_Area::create([
                        "permiso" => $p,
                        "area" => $idArea->id
                    ]);
                }
            }
        
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
    public function admin_showArea()
    {   
        return view('admin.components.areas.ver_area');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAreaForm()
    {   
        return view('admin.components.areas.detalle_area');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAreaDetail($id_area)
    {   
        $area = Area::find($id_area);

        $areaDetalle = [
                'id' => $id_area,
                'name' => $area->name,
                'eliminable' => $area->getUsers()->get()->count(),
                'ar_direction_id' => $area->getDirectionAssociated()->first()->id,
                'ar_direction_name' => $area->getDirectionAssociated()->first()->name
            ];
        
        $ar_pr = $area->getPermissionsArea()->get();
        $permisos_areas = "";
        
        foreach($ar_pr as $ap){
            $permisos_areas .= ",".$ap->permiso;
        }

        $areaDetalle['ar_permissions'] = $permisos_areas;

        return json_encode($areaDetalle);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_updateArea(Request $request)
    {   
        DB::beginTransaction();

        $area = Area::find($request->input('ar_id'));
        
        try{

            $area->name = $request->input('ar_name');
            $area->direccion = $request->input('ar_direction');
            $area->save();

            $idArea = $request->input('ar_id');

            Permisos_Area::where('area',$idArea)->delete();
        
            $permissions = explode('-', $request->input('ar_permissions'));
            
            foreach($permissions as $p){
                //echo $p;
                if($p){
                    Permisos_Area::create([
                        "permiso" => $p,
                        "area" => $idArea
                    ]);
                }
            }
        
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
    public function admin_getListAreas()
    {   
        $areas = array();

        $areasModel = Area::orderBy('name', 'asc')->get();
        
        foreach($areasModel as $ar){
            array_push($areas,[
                "id" => $ar->id,
                "name" => $ar->name,
                "direction" =>$ar->getDirectionAssociated()->first()->name
                 ]);
        }
        
        return json_encode($areas);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAreasActive()
    {   $areas = array();

        $areaModel = Area::orderBy('name', 'asc')->get();
        
        foreach($areaModel as $am){
            array_push($areas,[
                "id" => $am->id,
                "name" => $am->name,
                "direction" => $am->direccion,
                "direccion" => $am->getDirectionAssociated()->first()->name
                ]);
        }
        
        return json_encode($areas);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_deleteArea($id_area)
    {   
        $area = Area::find($id_area);
        
        DB::beginTransaction();

        try{
            
            Permisos_Area::where('area',$id_area)->delete();

            $area->delete();
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        return "success";
    }
}
