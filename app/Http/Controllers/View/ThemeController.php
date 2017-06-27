<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('main.main');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function backTop()
    {
        return view('theme.components.backTop');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_backTop()
    {
        return view('theme.admin_components.backTop');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function baSidebar()
    {
        return view('theme.components.ba-sidebar');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_baSidebar()
    {
        return view('theme.admin_components.ba-sidebar');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function baWizard()
    {
        return view('theme.components.baWizard');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_baWizard()
    {
        return view('theme.admin_components.baWizard');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function contentTop()
    {
        return view('theme.components.contentTop');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_contentTop()
    {
        return view('theme.admin_components.contentTop');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function msgCenter()
    {
        return view('theme.components.msgCenter');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_msgCenter()
    {
        return view('theme.admin_components.msgCenter');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function pageTop()
    {
        return view('theme.components.pageTop');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_pageTop()
    {
        return view('theme.admin_components.pageTop');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function progresBarRound()
    {
        return view('theme.components.contentBarRound');
    }

    /**
     * Admin Mode
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_progresBarRound()
    {
        return view('theme.admin_components.contentBarRound');
    }

    /**
     * Modal View Success
     *
     * @return \Illuminate\Http\Response
     */
    public function main_successModal($msg)
    {
        return view('theme.components.successModal', ["msg" => $msg]);
    }

    /**
     * Modal View Danger
     *
     * @return \Illuminate\Http\Response
     */
    public function main_dangerModal($msg)
    {
        return view('theme.components.dangerModal', ["msg" => $msg]);
    }
}
