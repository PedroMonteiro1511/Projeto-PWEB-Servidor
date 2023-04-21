<?php

namespace app\controllers;

use Iva;
use Service;

class ServiceController extends \BaseController
{

    public function index()
    {
        $services = Service::all();
        return $this->renderView('service/index', ['services' => $services]);
    }


    public function show($id)
    {
        $service = Service::find([$id]);

        if (is_null($service)) {
           return $this->redirectToRoute('site/404'); //error page
        } else {
            return $this->renderView('service/show', ['model' => $service]);
        }
    }

    public function create(){

        $ivas = Iva::find(['emvigor' => 'sim'])->all(); // Get all active ivas from database, to show in select box.

        return $this->renderView('service/create', ['ivas' => $ivas]);
    }

    public function store(){
        $attributes = array(
            'referencia' => $_POST["referencia"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"],
            'idIva' => (int)$_POST["idIva"],
        );

        $service = new Service($attributes);
        if($service->is_valid()){
            $service->save();
            return $this->redirectToRoute('service/index');

        }else{
            $ivas = Iva::find(['emvigor' => 'sim'])->all(); // Get all active ivas from database, to show in select box.
            return $this->renderView('service/create', ['model' => $service, 'ivas' => $ivas]);
        }
    }

    public function edit($id){
        $service = Service::find([$id]);
        $ivasMap = $this->getIvasMap($service); // Get all active ivas from database, to show in select box.

        if (is_null($service)) {
            return $this->redirectToRoute('site/404');
        } else {
            return  $this->renderView('service/edit', ['model' => $service, 'ivas' => $ivasMap]);
        }
    }

    public function update($id)
    {
        $service = Service::find([$id]);

        $attributes = array(
            'referencia' => $_POST["referencia"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"],
            'idIva' => (int)$_POST["idIva"],
        );

        $service->update_attributes($attributes);

        if($service->is_valid()){
            $service->save();
            return $this->redirectToRoute('service/index');
        } else {
            $ivasMap = $this->getIvasMap($service);

            return $this->renderView('service/edit', ['model' => $service, 'ivas' => $ivasMap]);
        }
    }

    public function delete($id)
    {
        $service = Service::find([$id]);
        $service->delete();
        return $this->redirectToRoute('service/index');
    }

    /**
     * @param mixed $service
     * @return string[]
     * @throws \ActiveRecord\RecordNotFound
     * O serviço é passado como parametro para saber o iva que já está adcionado ao serviço para evitar duplicados no array final
     */
    public function getIvasMap(mixed $service): array
    {
        $ivas = Iva::find(['emvigor' => 'sim'])->all(); // Get all active ivas from database, to show in select box.

        // O valor da chave é definido como vazio mas no foreach é atualizado
        $ivasMap = [$service->idiva => ""];
        if (!empty($ivas)) {
            //Adiciona todos os ivas ao array
            foreach ($ivas as $iva) {
                $key = $iva->id;
                $value = "$iva->percentagem% - $iva->descricao";

                $ivasMap[$key] = $value;
            }
        }
        return $ivasMap;
    }
}