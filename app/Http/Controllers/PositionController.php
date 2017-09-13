<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posicion;
use App\Models\Track;
use App\Models\Posicion_Track;
use App\Models\Permisos_Posicion;
use App\Models\Nivel;
use DB;

class PositionController extends Controller
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
    public function admin_listaPosiciones()
    {
        return view('admin.components.positions.lista_posiciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaPosiciones()
    {
        return view('admin.components.positions.tabla_posiciones');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewPosicion()
    {
        return view('admin.components.positions.crear_posicion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewPosicionForm()
    {
        return view('admin.components.positions.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewPosition(Request $request)
    {   
        DB::beginTransaction();
        
        $newPosition = array();
        
        try{

            $newPosition = [
                'name' => $request->input('ps_name'),
                'nivel' => $request->input('ps_level')
            ];

            $idPosicion = Posicion::create($newPosition);

            // Permissions

            $permissions = explode('-', $request->input('ps_permissions'));
            
            foreach($permissions as $p){
                //echo $p;
                if($p){
                    Permisos_Posicion::create([
                        "permiso" => $p,
                        "posicion" => $idPosicion->id
                    ]);
                }
            }

            // Positons Tracks ----

            $tracks = explode('-', $request->input('ps_tracks'));


            foreach($tracks as $t){
                //echo $p;
                if($t){
                    Posicion_Track::create([
                        "track" => $t,
                        "posicion" => $idPosicion->id
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
    public function admin_showPosition()
    {   
        return view('admin.components.positions.ver_posicion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getPositionForm()
    {   
        return view('admin.components.positions.detalle_posicion');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getPositionDetail($id_position)
    {   
        $position = Posicion::find($id_position);

        //code to evaluate if can be eliminate
        $p_t = $position->getPosicionTracks()->get();
        $ce = null;
        foreach($p_t as $pt){
            $ce += $pt->getUsers()->count();
        }

        $positionDetalle = [
                'id' => $id_position,
                'name' => $position->name,
                'eliminable' => $ce,
                'ps_level_id' => $position->getLevelAssociated()->first()->id,
                'ps_level_name' => $position->getLevelAssociated()->first()->name
            ];
        
        $ps_pr = $position->getPermissionsPositions()->get();
        $permisos_posiciones = "";
        
        foreach($ps_pr as $pp){
            $permisos_posiciones .= ",".$pp->permiso;
        }

        $positionDetalle['ps_permissions'] = $permisos_posiciones;

        return json_encode($positionDetalle);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_updatePosition(Request $request)
    {   //check ---
        DB::beginTransaction();

        $posicion = Posicion::find($request->input('ps_id'));
        
        try{

            $posicion->name = $request->input('ps_name');
            $posicion->nivel = $request->input('ps_level');
            $posicion->save();

            $idPosicion = $request->input('ps_id');

            // Positions Tracks
            $positions_tracks = explode('-', $request->input('ps_tracks'));
            $positions_tracks_create = explode('-', $request->input('ps_tracks_create'));
            $positions_tracks_delete = explode('-', $request->input('ps_tracks_delete'));

            // Crating and eliminating positions tracks
            foreach($positions_tracks as $p_s){
                if($p_s){
                    if(Posicion_Track::where('posicion',$request->input('ps_id'))
                        ->where('track',$p_s)->exists()){
                        Posicion_Track::where('posicion',$request->input('ps_id'))
                            ->where('track',$p_s)->delete();
                    }
                }
            }
            foreach($positions_tracks_create as $p_s){
                if($p_s){
                    Posicion_Track::create([
                        "track" => $p_s,
                        "posicion" => $request->input('ps_id')
                    ]);
                }
            }

            // Permissions
            Permisos_Posicion::where('posicion',$idPosicion)->delete();
        
            $permissions = explode('-', $request->input('ps_permissions'));
            
            foreach($permissions as $p){
                //echo $p;
                if($p){
                    Permisos_Posicion::create([
                        "permiso" => $p,
                        "posicion" => $idPosicion
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
    public function admin_getListPositions()
    {   
        $positions = array();

        $positionsModel = Posicion::orderBy('name', 'asc')->get();
        
        foreach($positionsModel as $ps){
            array_push($positions,[
                "id" => $ps->id,
                "name" => $ps->name,
                "level" =>$ps->getLevelAssociated()->first()->name
                 ]);
        }
        
        return json_encode($positions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_getPositionsActiveByTrack($id)
    {
        $positions = array();

        $positionTrackModel = Posicion_Track::where("track",$id)->get();
        
        foreach($positionTrackModel as $pm){
            array_push($positions,[
                "id" => $pm->getPosicionAssociated()->first()->id,
                "name" => $pm->getPosicionAssociated()->first()->name
            ]);
        }
        //asort($positions);
        return json_encode($positions);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getTracksByPosition($id_position)
    {   
        $tracks = array();

        $positionModel = Posicion::find($id_position)->getPosicionTracks()->get();
        $num = 0;
        foreach($positionModel as $pm){

            array_push($tracks,[
                "id" => $pm->id,
                "id_track" => $pm->getTrackAssociated()->first()->id,
                "name_track" => $pm->getTrackAssociated()->first()->name,
                "used" => $pm->getUsers()->get()->count(),
                "indice" => $num,
            ]);
            $num++;
        }
        return json_encode($tracks);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_deletePosition($id_posicion)
    {   
        $posicion = Posicion::find($id_posicion);
        
        DB::beginTransaction();

        try{
            
            Permisos_Posicion::where('posicion',$id_posicion)->delete();

            Posicion_Track::where('posicion',$id_posicion)->delete();

            $posicion->delete();
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        return "success";
    }
}
