<?php

namespace app\controllers;

use Iva;

class IvasController extends \BaseController
{

    public function index()
    {
        $ivas = Iva::all();
        return $this->renderView('ivas/index', ['ivas' => $ivas]);
    }


    public function show($id)
    {
        $iva = Iva::find([$id]);

        if (is_null($iva)) {
           return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('ivas/show', ['model' => $iva]);
        }
    }

    public function create(){

        return $this->renderView('ivas/create');
    }

    public function store(){
        $attributes = array(
            'percentagem' =>(int)$_POST["percentagem"],
            'descricao' => $_POST["descricao"],
            'emvigor' => $_POST["emvigor"],
        );

        $iva = new Iva($attributes);
        if($iva->is_valid()){
            $iva->save();
            return $this->redirectToRoute('ivas/index');

        }else{
            return $this->renderView('ivas/create', ['model'=>$iva]);
        }
    }

    public function edit($id){
        $iva = Iva::find([$id]);

        if (is_null($iva)) {
            return $this->redirectToRoute('site/404');
        } else {
            return  $this->renderView('ivas/edit', ['model' => $iva]);
        }
    }

    public function update($id)
    {
        $iva = Iva::find([$id]);

        $attributes = array(
            'percentagem' => (int)$_POST["percentagem"],
            'descricao' => $_POST["descricao"],
            'emvigor' => $_POST["emvigor"],
        );

        $iva->update_attributes($attributes);

        if($iva->is_valid()){
            $iva->save();
            return $this->redirectToRoute('ivas/index');
        } else {

            return $this->renderView('ivas/edit', ['model' => $iva]);
        }
    }

    public function delete($id)
    {

        {
            $iva = Iva::find([$id]);

            $servicos = \Service::find(['iva_id' => $iva->id]);

            if ($servicos == null){
                $iva->delete();
                return $this->redirectToRoute('ivas/index');
            }
            else{
                $ivas = Iva::all();
                return $this->renderView('ivas/index', ['erro_apagar' => 'Iva já associado a um serviço. Não é possivel apagar!', 'ivas' => $ivas]);
            }
        }
    }

}