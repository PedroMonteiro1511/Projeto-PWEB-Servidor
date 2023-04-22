<?php

namespace app\controllers;

use User;

class UserController extends \BaseController
{

    public function __construct()
    {
        session_start();
    }

    public function index(){
        $active_user = User::find([$_SESSION['active_user_id']]);

        if (is_null($active_user)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('user/index', ['model' => $active_user]);
        }
    }

    public function edit(){
        $active_user = User::find([$_SESSION['active_user_id']]);

        $this->renderView('user/edit', ['model' => $active_user]);
    }

    public function update(){
        $idUser = $_SESSION['active_user_id'];

        $user = User::find('one', array('conditions' => "id LIKE '$idUser'"));


        if (isset($_POST["username_edit"]) && isset($_POST["email_edit"]) && isset($_POST["telefone_edit"])
            && isset($_POST["morada_edit"]) && isset($_POST["codpostal_edit"]) && isset($_POST["nif_edit"])
            && isset($_POST["localidade_edit"]) && isset($_POST["password_edit"])) {

            $user->username = $_POST["username_edit"];
            $user->email = $_POST["email_edit"];
            $user->telefone = $_POST["telefone_edit"];
            $user->morada = $_POST["morada_edit"];
            $user->codpostal = $_POST["codpostal_edit"];
            $user->nif = $_POST["nif_edit"];
            $user->localidade = $_POST["localidade_edit"];
            $user->password = $_POST["password_edit"];

            $user->save();

            $this->redirectToRoute('user/index');
        }


    }


}