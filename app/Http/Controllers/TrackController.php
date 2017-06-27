<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class TrackController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getTracksActive()
    {   $tracks = array();

        $trackModel = Track::all();
        
        foreach($trackModel as $tm){
            array_push($tracks,[
                "id" => $tm->id,
                "name" => $tm->name
                 ]);
        }
        
        return json_encode($tracks);
    }
}
