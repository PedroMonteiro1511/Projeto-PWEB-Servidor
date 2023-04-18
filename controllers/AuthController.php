<?php
namespace app\controllers;
use Auth;

class AuthController extends \BaseController
{
    public function login()
    {
        if (isset($_POST["username"]) && isset($_POST["password"])) {

            $username = $_POST["username"];
            $password = $_POST["password"];

            //valida username e pass
            $auth = new Auth();
            if (!$auth->checkAuth($username, $password)) {
                return $this->renderView("auth/login", ['errorMessage' => 'Login inválido']);
            }

            return $this->renderView("site/index");
        } else {
            return $this->renderView("auth/login");
        }
    }
}