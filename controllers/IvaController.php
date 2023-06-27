<?php

namespace app\controllers;

use Iva;

class IvaController extends \BaseController
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
        $ivas = Iva::all();
        return $this->renderView('iva/index', ['ivas' => $ivas]);
    }

    public function create()
    {
        return $this->renderView('iva/create');
    }

    public function store()
    {
        $attributes = array(
            'percentagem' => (int) $_POST["percentagem"],
            'descricao' => $_POST["descricao"],
            'emvigor' => $_POST["emvigor"],
        );

        $iva = new Iva($attributes);
        if ($iva->is_valid()) {
            $iva->save();
            return $this->redirectToRoute('iva/index');

        } else {
            return $this->renderView('iva/create', ['model' => $iva]);
        }
    }

    public function edit($id)
    {
        $iva = Iva::find([$id]);

        if (is_null($iva)) {
            return $this->redirectToRoute('site/index');
        } else {
            return $this->renderView('iva/edit', ['model' => $iva]);
        }
    }

    public function update($id)
    {
        $iva = Iva::find([$id]);

        $attributes = array(
            'percentagem' => (int) $_POST["percentagem"],
            'descricao' => $_POST["descricao"],
            'emvigor' => $_POST["emvigor"],
        );

        $iva->update_attributes($attributes);

        if ($iva->is_valid()) {
            $iva->save();
            return $this->redirectToRoute('iva/index');
        } else {

            return $this->renderView('iva/edit', ['model' => $iva]);
        }
    }

    public function delete($id)
    {
        $iva = Iva::find([$id]);

        $servicos = \Service::find(['iva_id' => $iva->id]);

        if ($servicos == null) {
            $iva->delete();
            return $this->redirectToRoute('iva/index');
        } else {
            $ivas = Iva::all();
            return $this->renderView('iva/index', ['erro_apagar' => 'Iva já associado a um serviço. Não é possivel apagar!', 'ivas' => $ivas]);
        }
    }
}