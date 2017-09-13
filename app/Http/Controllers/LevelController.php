<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;

class LevelController extends Controller
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
    public function admin_getListLevels()
    {   
        $levels = array();

        $levelsModel = Nivel::orderBy('name', 'asc')->get();
        
        foreach($levelsModel as $lv){
            array_push($levels,[
                "id" => $lv->id,
                "name" => $lv->name
                 ]);

        }
        
        return json_encode($levels);
    }
}
