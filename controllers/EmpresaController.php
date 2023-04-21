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
        $empresa = Empresa::find(['id'=>1]);
        return $this->renderView('empresa/index', ['model' => $empresa]);
    }


    public function form($id)
    {
        $empresa = Empresa::find([$id]);

        if (is_null($empresa)) {
            return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('empresa/form', ['model' => $empresa]);
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