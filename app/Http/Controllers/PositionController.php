<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posicion;
use App\Models\Posicion_Track;

class PositionController extends Controller
{
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
        
        return json_encode($positions);
    }
}
