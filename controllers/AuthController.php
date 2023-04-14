<?php

namespace app\controllers;

class AuthController
{
    public function index(){
        header('Location: views/auth/index.php');
        exit();
    }

}