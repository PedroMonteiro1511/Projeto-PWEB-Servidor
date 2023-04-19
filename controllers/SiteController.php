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

            //echo var_dump($_POST);
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
                'role' => "Cliente"
            );

            //$attributes = $_POST;

            //echo var_dump($attributes);
            //criar user
            $user = new User($attributes);

            //validar
            if ($user->is_valid()) {
                //$attributes['password'] = md5($_POST["password"]);
                //$user->update_attribute('password', md5($_POST["password"]));

                $user->save(false); //isValid já validou não precisa de validar de novo no save
                return $this->renderView("auth/login");
            }

            //Obtem os erros do validate
            $erros = $user->errors;
           // $erros = $erros;
            return $this->renderView("site/signup", ['errorsMessage' => $erros]);

        } else {
            return $this->renderView("site/signup");
        }
    }
}