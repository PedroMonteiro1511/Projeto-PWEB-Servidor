<?php

namespace app\controllers;

use User;

class UserController extends \BaseController
{

    public function __construct()
    {
        $author = new \Auth();
        if (!$author->isLoggedIn()) {
            return $this->redirectToRoute('auth/login');
        }
    }

    public function index(){
        $users = User::all();

        return $this->renderView('user/index', ['users' => $users]);
    }

    public function view($id){
        $user = User::find([$id]);

        if (is_null($user)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('user/view', ['model' => $user]);
        }
    }

    public function show($id){
        $user = User::find([$id]);

        if (is_null($user)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('user/show', ['model' => $user]);
        }
    }

    public function create(){
        return $this->renderView('user/create');
    }

    public function store(){

        $attributes = array(
            'username' => $_POST["username"],
            'password' => $_POST["password"],
            'email' => $_POST["email"],
            'telefone' => $_POST["telefone"],
            'nif' => $_POST["nif"],
            'morada' => $_POST["morada"],
            'codpostal' => $_POST["codpostal"],
            'localidade' => $_POST["localidade"],
        );

        $user = new User($attributes);
        if ($user->is_valid()) {
            $user->save();
            return $this->redirectToRoute('user/index');
        } else {
            return $this->renderView('user/create', ['model' => $user]);
        }
    }

    public function edit($id){
        $user = User::find([$id]);

        $this->renderView('user/edit', ['model' => $user]);
    }

    public function update($id){
        $user = User::find([$id]);
        if (isset($_POST["username_edit"]) && isset($_POST["email_edit"]) && isset($_POST["telefone_edit"])
            && isset($_POST["morada_edit"]) && isset($_POST["codpostal_edit"]) && isset($_POST["nif_edit"])
            && isset($_POST["localidade_edit"]) && isset($_POST["password_edit"]) && isset($_POST["role_edit"])) {

            $user->username = $_POST["username_edit"];
            $user->email = $_POST["email_edit"];
            $user->telefone = $_POST["telefone_edit"];
            $user->morada = $_POST["morada_edit"];
            $user->codpostal = $_POST["codpostal_edit"];
            $user->nif = $_POST["nif_edit"];
            $user->localidade = $_POST["localidade_edit"];
            $user->password = $_POST["password_edit"];
            $user->role = $_POST["role_edit"];

            $user->save();

            $_SESSION['active_user_role'] = $user->role;

            $this->redirectToRoute('user/index');
        }


    }


}