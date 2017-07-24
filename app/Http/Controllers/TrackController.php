<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use DB;
use PortalPersonal;

class TrackController extends Controller
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
    public function admin_listaTracks()
    {
        return view('admin.components.tracks.lista_tracks');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_tablaTracks()
    {
        return view('admin.components.tracks.tabla_tracks');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewTrack()
    {
        return view('admin.components.tracks.crear_track');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getNewTrackForm()
    {
        return view('admin.components.tracks.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewTrack(Request $request)
    {   
        DB::beginTransaction();
        
        $newTrack = array();
        
        try{

            $newTrack = [
                'name' => $request->input('tr_name')
            ];

            Track::create($newTrack);
        
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
    public function admin_showTrack()
    {   
        return view('admin.components.tracks.ver_track');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getTrackForm()
    {   
        return view('admin.components.tracks.detalle_track');
    }

        /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getTrackDetail($id_track)
    {   
        $track = Track::find($id_track);

        $trackDetalle = [
                'id' => $id_track,
                'name' => $track->name,
                'eliminable' => $track->getPosicionTracks()->get()->count()
            ];

        return json_encode($trackDetalle);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_updateTrack(Request $request)
    {   
        $track = Track::find($request->input('tr_id'));
        $track->name = $request->input('tr_name');
        $track->save();

        return "success";
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getListTracks()
    {   
        $tracks = array();

        $trackModel = Track::all();
        $num = 0;
        foreach($trackModel as $tm){
            array_push($tracks,[
                "id" => $tm->id,
                "name" => $tm->name,
                "indice" => $num,
                "active" => true
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
    public function admin_tablaPosicionesPorTrack()
    {
        return view('admin.components.tracks.tabla_posiciones_por_track');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getPositionsByTrack($id_track)
    {   
        $positions = array();

        $trackModel = Track::find($id_track)->getPosicionTracks()->get();
        
        foreach($trackModel as $tm){

            array_push($positions,[
                "id" => $tm->id,
                "name" => $tm->getPosicionAssociated()->first()->name
            ]);
            
        }
        return json_encode($positions);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_deleteTrack($id_track)
    {   
        $track = Track::find($id_track);
        
        DB::beginTransaction();

        try{
            
            $track->delete();
        
        }catch(\Exception $e){
            echo $e;
            DB::rollBack();
            exit;
        }

        DB::commit();

        return "success";
    }
}
