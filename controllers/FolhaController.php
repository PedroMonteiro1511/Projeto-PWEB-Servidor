<?php

namespace app\controllers;

use ActiveRecord\RecordNotFound;
use Folha;
use User;

class FolhaController extends \BaseController
{
    public function __construct()
    {
        $author = new \Auth();
        if (!$author->isLoggedIn()) {
            return $this->redirectToRoute('auth/login');
        }

        if ($_SESSION['active_user_role'] == \User::$Role_User_Cliente) {
            return $this->redirectToRoute('site/index');
        }
        return null;
    }

    public function searchfolhas()
    {
        if (isset($_POST['cliente']) && $_POST['cliente'] != ""){
            $folhas = [];
            $username = $_POST['cliente'];
            $users = User::find('all', array('conditions' => "username LIKE '%$username%'"));
            $estado = "";

            if ($users != null){
                foreach ($users as $user){
                    if ($_SESSION['active_user_role'] != User::$Role_User_Admin){
                        $activeUser = $_SESSION['active_user_id'];
                        $userFolhas = Folha::find('all',array('conditions' => array('cliente_id = ? AND funcionario_id = ?', $user->id, $activeUser)));
                    }
                    else{
                        $userFolhas = Folha::find('all',array('conditions' => array('cliente_id = ?', $user->id)));
                    }

                    $folhas = array_merge($folhas, $userFolhas);
                }
            }

            if (isset($_POST['estado']) && $_POST['estado'] != ""){
                $folhas = [];
                $estado = $_POST['estado'];

                foreach ($users as $user){
                    if ($_SESSION['active_user_role'] != User::$Role_User_Admin){
                        $activeUser = $_SESSION['active_user_id'];
                        $userFolhas = Folha::find('all',array('conditions' => array('cliente_id = ? AND estado = ? AND funcionario_id = ?', $user->id, $estado, $activeUser)));
                    }
                    else{
                        $userFolhas = Folha::find('all',array('conditions' => array('cliente_id = ? AND estado = ?', $user->id, $estado)));
                    }

                    $folhas = array_merge($folhas, $userFolhas);
                }
            }

            return $this->renderView('folha/index', ['folhas' => $folhas, 'usernamefilter' => $username, 'estadofilter' => $estado]);
        }

        if (isset($_POST['estado']) && $_POST['estado'] != ""){
            $estado = $_POST['estado'];
            if ($_SESSION['active_user_role'] != User::$Role_User_Admin){
                $activeUser = $_SESSION['active_user_id'];
                $folhas = Folha::find('all', array('conditions' => array('estado = ? AND funcionario_id = ?', $estado, $activeUser)));
            }
            else{
                $folhas = Folha::find('all', array('conditions' => array('estado = ?', $estado)));
            }

            return $this->renderView('folha/index', ['folhas' => $folhas,'estadofilter' => $estado]);
        }

        return $this->redirectToRoute('folha/index');
    }

    public function index()
    {
        $all = [];
        $role = $_SESSION['active_user_role'];


        if ($role == \User::$Role_User_Funcionario) {
            $all = Folha::find('all', [
                'funcionario_id' => $_SESSION['active_user_id'],
            ]);
        }

        if ($role == \User::$Role_User_Admin) {
            $all = Folha::all();
        }

        return $this->renderView('folha/index', ['folhas' => $all]);
    }

    public function show($id)
    {
        $model = $this->findModel($id);

        if (is_null($model)) {
            return $this->redirectToRoute('folha/index');
        }

        //Employee can not change another employer registir
        if (!$this->havePermission($model->funcionario_id)) {
            return $this->redirectToRoute('folha/index');
        }

        $empresa = \Empresa::first();
        $cliente = \User::find([$model->cliente_id]);
        $funcionario = \User::find([$model->funcionario_id]);

        return $this->renderView('folha/show', [
            'model' => $model,
            'empresa' => $empresa,
            'cliente' => $cliente,
            'funcionario' => $funcionario
        ]);
    }

    public function create()
    {
        $clientes = \User::find('all', ['role' => \User::$Role_User_Cliente]);
        $empresa = \Empresa::first();


        return $this->renderView('folha/create', ['clientes' => $clientes, 'empresa' => $empresa]);
    }


    public function store()
    {
        $attributes = array(
            'valorTotal' => 0,
            'ivaTotal' => 0,
            'estado' => Folha::$Estado_Em_Lancamento,
            'funcionario_id' => (int)$_POST["idFuncionario"],
        );


        $folha = new Folha($attributes);

        if (isset($_POST["idCliente"])) {
            $folha->update_attribute('cliente_id', $_POST["idCliente"]);
        }

        if ($folha->is_valid() && $folha->save()) {

            return $this->redirectToRoute('linha/index', ['id' => $folha->id]);

        } else {
            $clientes = \User::find('all', ['role' => \User::$Role_User_Cliente]);
            $empresa = \Empresa::first();
            return $this->renderView('folha/create', [
                'model' => $folha,
                'clientes' => $clientes,
                'empresa' => $empresa
            ]);
        }
    }

    public function search()
    {
        if (isset($_POST['username']) && $_POST['username'] != "") {
            $username = $_POST['username'];
            $users = \User::find('all', array('conditions' => "username LIKE '%$username%'"));
            $empresa = \Empresa::first();

            return $this->renderView('folha/create', ['clientes' => $users, 'usernamefilter' => $username, 'empresa' => $empresa]);
        }

        return $this->redirectToRoute('folha/create');
    }

    public function emitir($id)
    {
        $model = $this->findModel($id);

        if (is_null($model)) {
            return $this->redirectToRoute('folha/index');
        }

        if (!$this->havePermission($model->funcionario_id)) {
            return $this->redirectToRoute('folha/index');
        }

        //Need to add some lines first
        if (count($model->linhas) == 0) {
            return $this->redirectToRoute('linha/index', ['id' => $id]);
        }

        $model->update_attribute('estado', Folha::$Estado_Emitida);
        $model->save();

        return $this->redirectToRoute('folha/index');
    }

    public function delete($id)
    {
        $model = $this->findModel($id);

        if (!$this->havePermission($model->funcionario_id)) {
            return $this->redirectToRoute('folha/index');
        }

        if ($model->estado != Folha::$Estado_Em_Lancamento) {
            return $this->redirectToRoute('folha/index');
        }

        if ($model != null) {

            //Delete all lines
            $linhas = $model->linhas;

            foreach ($linhas as $linha) {
                $linha->delete();
            }

            $model->delete();
        }

        return $this->redirectToRoute('folha/index');
    }

    private function findModel($id)
    {
        try {
            $model = Folha::find([$id]);
        } catch (RecordNotFound $e) {
            return null;
        }

        return $model;
    }

    private function havePermission($user_id)
    {
        $role = $_SESSION['active_user_role'];
        switch ($role) {
            case \User::$Role_User_Admin:
                return true;

            case \User::$Role_User_Funcionario:
                if ($user_id == $_SESSION['active_user_id']) {
                    return true;
                } else {
                    return false;
                }
            case \User::$Role_User_Cliente:
                return false;
        }

        return false;
    }
}