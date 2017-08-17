<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use File;
use Mail;
use URL;
use PortalPersonal;

class RequisitionController extends Controller
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
    public function main_information()
    {
        return view('main.components.requisitions.information');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getNewRequisition()
    {
        return view('main.components.requisitions.solicitar_requisicion');
    }
 
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function main_getRequisitionForm()
    {
         return view('main.components.requisitions.solicitar');
    }
}
