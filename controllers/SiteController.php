<?php

namespace app\controllers;

include_once 'models/Auth.php';

class SiteController extends \BaseController
{
    public function index()
    {
        $this->renderView("site/index", [
            'teste' => 'testes',
        ]);
    }

    public function create()
    {
        $this->redirectToRoute("site/create");
    }


    public function signup()
    {

        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $var = $_POST["name"];
            $this->renderView("site/signup", ['message' => $var]);
        } else {
            $this->renderView("site/signup");
        }
    }

    public function login()
    {
        if (isset($_POST["username"]) && isset($_POST["password"])) {

            $username = $_POST["username"];
            $password = $_POST["password"];

            //valida username e pass
            if (!checkAuth($username, $password)) {
                return $this->renderView("site/login", ['errorMessage' => 'Login inválido']);
            }

            $this->renderView("site/index");
        } else {
            $this->renderView("site/login");
        }
    }
}