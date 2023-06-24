<?php

namespace app\controllers;

use ActiveRecord\RecordNotFound;
use Exception;
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
            'iva_id' => (int) $_POST["iva_id"],
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

        $ivas = Iva::find(['emvigor' => 'sim']);

        if ($ivas != null) {
            $ivas = $ivas->all();
        }
        return $this->renderView('service/edit', ['model' => $model, 'ivas' => $ivas]);
    }

    public function update($id)
    {
        $model = $this->findModel($id);

        $attributes = array(
            'referencia' => $_POST["referencia"],
            'descricao' => $_POST["descricao"],
            'preco' => $_POST["preco"],
            'iva_id' => (int) $_POST["iva_id"],
        );

        $model->update_attributes($attributes);

        if ($model->is_valid()) {
            $model->save();
            return $this->redirectToRoute('service/index');
        } else {
            $ivas = Iva::find(['emvigor' => 'sim']);

            if ($ivas != null) {
                $ivas = $ivas->all();
            }

            return $this->renderView('service/edit', ['model' => $model, 'ivas' => $ivas]);
        }
    }

    public function delete($id)
    {
        $model = $this->findModel($id);

        if ($model != null) {

            try {
                $model->delete();

            } catch (Exception $ex) {
                $services = Service::all();
                return $this->renderView('service/index', [
                    'erro_apagar' => 'Este serviço está associado a uma linha de folha. Não é possivel apagar!',
                    'services' => $services
                ]);
            }
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
}