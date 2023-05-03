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

    public function index()
    {
        $users = User::all();

        return $this->renderView('user/index', ['users' => $users]);
    }

    public function view($id)
    {
        $user = User::find([$id]);

        if (is_null($user)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('user/view', ['model' => $user]);
        }
    }

    public function show($id)
    {
        $user = User::find([$id]);

        if (is_null($user)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('user/show', ['model' => $user]);
        }
    }

    public function create()
    {
        return $this->renderView('user/create');
    }

    public function store()
    {

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

    public function edit($id)
    {
        $user = User::find([$id]);

        $this->renderView('user/edit', ['model' => $user]);
    }

    public function update($id)
    {
        $user = User::find([$id]);

        if (!isset($_POST['role_edit'])){
            $_POST['role_edit'] = $user->role;
        }

        $attributes = array(
            'username' => $_POST["username_edit"],
            'password' => $_POST["password_edit"],
            'email' => $_POST["email_edit"],
            'telefone' => $_POST["telefone_edit"],
            'nif' => $_POST["nif_edit"],
            'morada' => $_POST["morada_edit"],
            'codpostal' => $_POST["codpostal_edit"],
            'localidade' => $_POST["localidade_edit"],
            'role' => $_POST["role_edit"],
        );

        $user->update_attributes($attributes);
        if ($user->is_valid()) {
            $user->save();
            return $this->renderView('user/view', ['model'=> $user]);
        } else {
            return $this->renderView('user/change', ['model' => $user]);
        }

    }

    public function change($id){
        $user = User::find([$id]);

        return $this->renderView('user/change', ['model' => $user]);
    }

    public function delete($id)
    {
        $user = User::find([$id]);

        $folhas = \Folha::find(['cliente_id' => $user->id]);

        if ($folhas == null){
            $user->delete();
        }
        else{
            $users = User::all();
            return $this->renderView('user/index', ['erro_apagar' => 'Utilizador tem folhas associadas ao seu pefil. Não é possivel apagar!', 'users' => $users]);
        }
    }

}


