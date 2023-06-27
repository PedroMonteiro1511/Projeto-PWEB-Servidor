<?php
namespace app\controllers;
use Auth;

class AuthController extends \BaseController
{
    public function login()
    {
        if (isset($_POST["username"]) && isset($_POST["password"])) {

            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            //valida username e pass
            $auth = new Auth();
            if ($auth->checkAuth($username, $password)) {
                return $this->redirectToRoute("site/index");
            }
            else{
                return $this->renderView("auth/login", ['errorMessage' => 'Login Inválido, tente novamente.']);
            }

        } else {
            return $this->renderView("auth/login");
        }
    }

    public function signout(){
        $auth = new Auth();
        $auth->logout();
        return $this->renderView("auth/login");
    }
}