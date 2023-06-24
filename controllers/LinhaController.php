<?php

namespace app\controllers;

use ActiveRecord\RecordNotFound;
use Folha;
use Linha;

class LinhaController extends \BaseController
{
    public function __construct()
    {
        $author = new \Auth();
        if (!$author->isLoggedIn()) {
            return $this->redirectToRoute('auth/login');
        }

        return null;
    }

    public function index($id)
    {
        $folha = Folha::find([$id]);
        $empresa = \Empresa::first();

        $cliente_id = $folha->cliente_id;
        $cliente = \User::find([$cliente_id]);

        if (is_null($folha)) {
            return $this->redirectToRoute('folha/index');
        }

        if ($folha->estado != Folha::$Estado_Em_Lancamento) {
            return $this->redirectToRoute('folha/index');
        }

        if (!$this->havePermission($folha->funcionario_id)) {
            return $this->redirectToRoute('folha/index');
        }

        return $this->renderView('linha/index', ['folha' => $folha, 'empresa' => $empresa, 'cliente' => $cliente]);
    }

    public function create($id)
    {
        $folha = Folha::find(['id' => $id]);
        if (is_null($folha)) {
            return $this->redirectToRoute('folha/index');
        }

        if (!$this->havePermission($folha->funcionario_id)) {
            return $this->redirectToRoute('folha/index');
        }

        $services = \Service::all();

        return $this->renderView(
            'linha/create',
            [
                'folha_id' => $id,
                'services' => $services
            ]
        );
    }

    public function store()
    {

        $folha_id = $_POST['folha_id'];

        $attributes = array(
            'quantidade' => (int) $_POST["quantidade"],
            'folha_id' => (int) $_POST['folha_id'],
            'service_id' => (int) $_POST['service_id']
        );

        $linha = new Linha($attributes);
        if ($linha->is_valid()) {

            //obter o serviço
            $service = \Service::find(['id' => $_POST['service_id']]);
            $valorService = $service->preco;
            $valorIvaService = $service->iva->percentagem;

            //obter quantidade
            $quantidade = $_POST["quantidade"];

            //calcular valores
            $valorLinha = $valorService * $quantidade;
            $valorIvaLinha = (($valorIvaService * $valorLinha) / 100) + $valorLinha;

            $linha->update_attributes(
                array(
                    'valor' => $valorLinha,
                    'valorIva' => $valorIvaLinha,
                )
            );

            $linha->save();

            //obter folha
            $folha = Folha::find(['id' => $folha_id]);
            $totalFolha = $folha->valortotal;
            $totalIvaFolha = $folha->ivatotal;

            //adicionar novas linhas ao total
            $totalFolha = $totalFolha + $valorLinha;
            $totalIvaFolha = $totalIvaFolha + $valorIvaLinha;

            $folha->update_attributes(
                array(
                    'valorTotal' => $totalFolha,
                    'ivaTotal' => $totalIvaFolha
                )
            );

            $folha->save();

            return $this->redirectToRoute('linha/index', ['id' => $folha_id]);

        } else {
            $services = \Service::all();

            return $this->renderView('linha/create', [
                'model' => $linha,
                'services' => $services,
                'folha_id' => $folha_id
            ]);
        }
    }

    public function delete($id)
    {
        $model = $this->findModel($id);

        if ($model != null) {

            //get line data
            $valor = $model->valor;
            $valorIva = $model->valoriva;
            $folha_id = $model->folha_id;

            $result = $model->delete();

            //after delete a line is necessary update folha model
            if ($result) {

                $folha = Folha::find(['id' => $folha_id]);
                $totalFolha = $folha->valortotal;
                $totalIvaFolha = $folha->ivatotal;

                $totalFolha = $totalFolha - $valor;
                $totalIvaFolha = $totalIvaFolha - $valorIva;

                $folha->update_attributes(
                    array(
                        'valorTotal' => $totalFolha,
                        'ivaTotal' => $totalIvaFolha
                    )
                );

                $folha->save();
            }

            return $this->redirectToRoute('linha/index', ['id' => $folha_id]);
        }

        return $this->redirectToRoute('folhas/index');
    }

    private function findModel($id)
    {
        try {
            $model = Linha::find([$id]);
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