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

    public function view($id) // 
    {
        $user = User::find([$id]);
        return $this->renderView('user/view', ['model' => $user]);

    }

    public function show($id)
    {
        $user = User::find([$id]);

        return $this->renderView('user/show', ['model' => $user]);
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
            'role' => $_POST["role"],
        );

        $user = new User($attributes);
        if ($user->is_valid()) {
            $user->update_attribute('password', md5($_POST["password"]));
            $user->save();
            return $this->redirectToRoute('user/index');
        } else {
            return $this->renderView('user/create', ['model' => $user]);
        }
    }

    public function update_profile($id)
    {
        $user = User::find([$id]);

        $this->renderView('user/update_profile', ['model' => $user]);
    }

    public function search()
    {
        if (isset($_POST['id']) && $_POST['id'] != "") {
            $id = $_POST['id'];
            $user = User::find('all', array('conditions' => "id LIKE '%$id%'"));
            return $this->renderView('user/index', ['users' => $user, 'idfilter' => $id]);
        }

        if (isset($_POST['username']) && $_POST['username'] != "") {
            $username = $_POST['username'];
            $users = User::find('all', array('conditions' => "username LIKE '%$username%'"));

            if (isset($_POST['role']) && $_POST['role'] != "") {
                $role = $_POST['role'];
                $newUsers = User::find('all', array('conditions' => "username LIKE '%$username%' AND role LIKE '%$role%'"));
                return $this->renderView('user/index', ['users' => $newUsers, 'usernamefilter' => $username, 'rolefilter' => $role]);
            }

            return $this->renderView('user/index', ['users' => $users, 'usernamefilter' => $username]);
        }

        if (isset($_POST['role']) && $_POST['role'] != "") {
            $role = $_POST['role'];
            $users = User::find('all', array('conditions' => "role LIKE '%$role%'"));

            return $this->renderView('user/index', ['users' => $users, 'rolefilter' => $role]);
        }

        return $this->redirectToRoute('user/index');
    }

    public function update($id)
    {
        $user = User::find([$id]);

        if (!isset($_POST['role_edit'])) {
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
            if ($id == $_SESSION['active_user_id']){

                if ($user->password == md5($_POST['password_edit'])){
                    $user->save();
                    return $this->renderView('user/view', ['model' => $user]);
                }
                else{
                    $user->update_attribute('password', md5($_POST['password_edit']));
                    $user->save();
                    return $this->renderView('user/view', ['model' => $user]);
                }

            }
            else{
                if ($user->password == md5($_POST['password_edit'])){
                    $user->save();
                    return $this->redirectToRoute('user/index');
                }
                else{
                    $user->update_attribute('password', md5($_POST['password_edit']));
                    $user->save();
                    return $this->redirectToRoute('user/index');
                }
            }
        } else {
            if ($id == $_SESSION['active_user_id']) {
                return $this->renderView('user/update_profile', ['model' => $user]);
            }
            else{
                return $this->renderView('user/edit', ['model' => $user]);
            }
        }
    }

    public function edit($id)
    {
        $user = User::find([$id]);

        return $this->renderView('user/edit', ['model' => $user]);
    }

    public function delete($id)
    {
        $user = User::find([$id]);

        $folhas = \Folha::find(['cliente_id' => $user->id]);

        if ($folhas == null) {
            $user->delete();
            return $this->redirectToRoute('user/index');
        } else {
            $users = User::all();
            return $this->renderView('user/index', ['erro_apagar' => 'Utilizador tem folhas associadas ao seu pefil. Não é possivel apagar!', 'users' => $users]);
        }
    }

}