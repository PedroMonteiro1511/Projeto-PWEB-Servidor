<?php

namespace app\controllers;

class HomeController
{
    public function index(){
        header('Location: views/home/index.php');
        exit();
    }

}