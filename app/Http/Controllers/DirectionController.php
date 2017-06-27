<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;

class DirectionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_findDirectionUsingArea($id)
    {
        $direction = array();

        $directionModel = Direccion::where("id",$id)->first();
        
        $direction = [
            "id" => $directionModel->id,
            "name" => $directionModel->name
        ];
        
        return json_encode($direction);
    }
}
