<?php

namespace app\controllers;

use Empresa;

class EmpresaController extends \BaseController
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
        $empresa = Empresa::find([1]);
        return $this->renderView('empresa/index', ['model' => $empresa]);
    }


    public function edit($id)
    {
        $empresa = Empresa::find([$id]);

        if (is_null($empresa)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('empresa/edit', ['model' => $empresa]);
        }
    }

    public function update($id)
    {
        $author = new \Auth();
        if (!$author->isLoggedIn()) {
            return $this->redirectToRoute('auth/login');
        }

        $empresa = Empresa::find([$id]);

        $attributes = array(
            'desigsocial' => $_POST["desigsocial"],
            'email' => $_POST["email"],
            'telefone' => (int)$_POST["telefone"],
            'nif' => (int)$_POST["nif"],
            'morada' => $_POST["morada"],
            'codpostal' => $_POST["codpostal"],
            'localidade' => $_POST["localidade"],
            'capsocial' => (int)$_POST["capsocial"],
        );

        $empresa->update_attributes($attributes);

        if($empresa->is_valid()){
                $empresa->save();
            return $this->redirectToRoute('empresa/index');
        } else {
            return $this->renderView('site/404');
        }
    }


}