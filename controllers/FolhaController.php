<?php

namespace app\controllers;

use ActiveRecord\RecordNotFound;
use Folha;

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

    public function index()
    {
        $all = [];
        $role = $_SESSION['active_user_role'];

        if ($role == \User::$Role_User_Funcionario) {
            $all = Folha::find(['funcionario_id' => $_SESSION['active_user_id']]);
            if (!is_null($all)) {
                $all = $all->all();
            }
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

        return $this->renderView('folha/show', ['model' => $model]);
    }

    public function create()
    {
        $clientes = \User::find(['role' => \User::$Role_User_Cliente]);

        if ($clientes != null) {
            $clientes = $clientes->all();
        }

        return $this->renderView('folha/create', ['clientes' => $clientes]);
    }

    public function store()
    {
        $attributes = array(
            'valorTotal' => 0,
            'ivaTotal' => 0,
            'estado' => Folha::$Estado_Em_Lancamento,
            'cliente_id' => (int)$_POST["idCliente"],
            'funcionario_id' => (int)$_POST["idFuncionario"],
        );

        $folha = new Folha($attributes);
        if ($folha->is_valid() && $folha->save()) {

            return $this->redirectToRoute('linha/index', ['id' => $folha->id]);

        } else {
            $clientes = \User::find(['role' => \User::$Role_User_Cliente]);

            if ($clientes != null) {
                $clientes = $clientes->all();
            }
            return $this->renderView('folha/create', ['model' => $folha, 'clientes' => $clientes]);
        }
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

        if($model != Folha::$Estado_Em_Lancamento){
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