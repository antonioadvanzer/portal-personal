<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getAreasActive()
    {   $areas = array();

        $areaModel = Area::all();
        
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

}
