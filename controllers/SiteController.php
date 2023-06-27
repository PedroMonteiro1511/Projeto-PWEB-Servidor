<?php

namespace app\controllers;

use User;

//include_once 'models/Auth.php';

class SiteController extends \BaseController
{

    public function __construct()
    {
        session_start();
    }


    public function index()
    {
        $this->renderView("site/index");
    }

    public function create()
    {
        $this->redirectToRoute("site/create");
    }


    public function signup()
    {
        if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])
            && isset($_POST["telefone"]) && isset($_POST["nif"]) && isset($_POST["morada"])
            && isset($_POST["codPostal"]) && isset($_POST["localidade"])) {

            //Declarar atributos a passar no modelo user
            $attributes = array(
                'username' => $_POST["username"],
                'password' => $_POST["password"],
                'email' => $_POST["email"],
                'telefone' => (int)$_POST["telefone"],
                'nif' => (int)$_POST["nif"],
                'morada' => $_POST["morada"],
                'codpostal' => $_POST["codPostal"],
                'localidade' => $_POST["localidade"],
                'role' => User::$Role_User_Cliente
            );

            //criar user
            $user = new User($attributes);

            //validar
            if ($user->is_valid()) {
                $user->update_attribute('password', md5($_POST["password"]));

                if ($user->save()) {
                    return $this->redirectToRoute("auth/login");
                }
            }

            return $this->renderView("site/signup", ['model' => $user]);

        } else {
            return $this->renderView("site/signup");
        }
    }
}