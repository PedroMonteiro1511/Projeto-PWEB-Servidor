<?php

namespace app\controllers;

use Empresa;

class EmpresaController extends \BaseController
{

    public function __construct()
    {
        session_start();
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
            return $this->renderView('empresa/form', ['model' => $empresa]);
        }
    }

    public function update($id)
    {
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

    /*public function form(){
        $empresa = Empresa::find('one');

        if ($empresa){

            $_SESSION['empresa_id'] = $empresa->id;
            $_SESSION['empresa_desigsocial'] = $empresa->desigsocial;
            $_SESSION['empresa_email'] = $empresa->email;
            $_SESSION['empresa_telefone'] = $empresa->telefone;
            $_SESSION['empresa_nif'] = $empresa->nif;
            $_SESSION['empresa_morada'] = $empresa->morada;
            $_SESSION['empresa_codpostal'] = $empresa->codpostal;
            $_SESSION['empresa_localidade'] = $empresa->localidade;
            $_SESSION['empresa_capsocial'] = $empresa->capsocial;


            $this->renderView('empresa/index');
        }
        else{
            return $this->renderView("empresa/index", ['errorMessage' => 'Esta empresa não tem nada registado']);
        }


    }

    public function form(){
        $this->renderView('empresa/form');
    }*/


}