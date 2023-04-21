<?php

namespace app\controllers;

class UserController extends \BaseController
{

    public function __construct()
    {
        session_start();
    }

    public function index(){
        $this->renderView('user/index');
    }

    public function form(){
        $this->renderView('user/form');
    }


}