<?php

namespace app\controllers;

use ActiveRecord\RecordNotFound;
use Iva;
use Service;

class ServiceController extends \BaseController
{
    public function __construct()
    {
        $author = new \Auth();
        if (!$author->isLoggedIn()) {
            return $this->redirectToRoute('auth/login');
        }

        return null;
    }

    public function index()
    {
        $services = Service::all();
        return $this->renderView('service/index', ['services' => $services]);
    }


    public function show($id)
    {
        $model = $this->findModel($id);

        if (is_null($model)) {
            return $this->redirectToRoute('service/index');
        } else {
            return $this->renderView('service/show', ['model' => $model]);
        }
    }

    public function create()
    {
        $ivas = Iva::find(['emvigor' => 'sim']);

        if ($ivas != null) {
            $ivas = $ivas->all(); //obtem ivas para a selectbox da view
        }

        return $this->renderView('service/create', ['ivas' => $ivas]);
    }

    public function store()
    {
        $attributes = array(
            'referencia' => $_POST["referencia"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"],
            'idIva' => (int)$_POST["idIva"],
        );

        $service = new Service($attributes);
        if ($service->is_valid()) {
            $service->save();
            return $this->redirectToRoute('service/index');

        } else {
            $ivas = Iva::find(['emvigor' => 'sim']);
            if ($ivas != null) {
                $ivas = $ivas->all();
            }
            return $this->renderView('service/create', ['model' => $service, 'ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        $model = $this->findModel($id);
        if (is_null($model)) {
            return $this->redirectToRoute('service/index');
        }

        $ivasMap = $this->getIvasMap($model);
        return $this->renderView('service/edit', ['model' => $model, 'ivas' => $ivasMap]);
    }

    public function update($id)
    {
        $model = $this->findModel($id);

        $attributes = array(
            'referencia' => $_POST["referencia"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"],
            'idIva' => (int)$_POST["idIva"],
        );

        $model->update_attributes($attributes);

        if ($model->is_valid()) {
            $model->save();
            return $this->redirectToRoute('service/index');
        } else {
            $ivasMap = $this->getIvasMap($model);

            return $this->renderView('service/edit', ['model' => $model, 'ivas' => $ivasMap]);
        }
    }

    public function delete($id)
    {
        $model = $this->findModel($id);

        if ($model != null) {
            $model->delete();
        }

        return $this->redirectToRoute('service/index');
    }


    private function findModel($id)
    {
        try {
            $model = Service::find([$id]);
        } catch (RecordNotFound $e) {
            return null;
        }

        return $model;
    }


    /**
     * @param mixed $service
     * @return string[]
     * @throws \ActiveRecord\RecordNotFound
     * O serviço é passado como parametro para saber o iva que já está adcionado ao serviço para evitar duplicados no array final
     */
    private function getIvasMap(mixed $service): array
    {
        $ivas = Iva::find(['emvigor' => 'sim'])->all(); // Obtem todos os ivas da basedados, para mostrar na select box.

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