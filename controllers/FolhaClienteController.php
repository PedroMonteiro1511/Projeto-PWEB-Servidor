<?php

namespace app\controllers;

class FolhaClienteController extends \BaseController
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
        $all = \Folha::find('all', ['cliente_id' => $_SESSION['active_user_id']]);

        if (count($all) == 0) {
            return $this->renderView('folhacliente/index', ['folhas' => $all]);
        }

        //Remove folhas em lançamento
        foreach ($all as $i => $folha) {
            if ($folha->estado == \Folha::$Estado_Em_Lancamento) {
                unset($all[$i]);
            }
        }

        return $this->renderView('folhacliente/index', ['folhas' => $all]);
    }

    public function pay($id)
    {
        $model = $this->findModel($id);
        if (is_null($model)) {
            return $this->redirectToRoute('folhacliente/index');
        }

        if ($model->estado == \Folha::$Estado_Paga) {
            return $this->redirectToRoute('folhacliente/index');
        }

        return $this->renderView('folhacliente/pagamento', ['model' => $model]);
    }

    public function submitPay($id)
    {
        $model = $this->findModel($id);
        $model->update_attribute('estado', \Folha::$Estado_Paga);
        $model->save();

        return $this->redirectToRoute('folhacliente/index');
    }

    public function show($id)
    {
        $model = $this->findModel($id);

        if (is_null($model)) {
            return $this->redirectToRoute('folha/index');
        }

        $empresa = \Empresa::first();
        $cliente = \User::find([$model->cliente_id]);
        $funcionario = \User::find([$model->funcionario_id]);

        return $this->renderView('folhacliente/show', [
            'model' => $model,
            'empresa' => $empresa,
            'cliente' => $cliente,
            'funcionario' => $funcionario
        ]);
    }

    private
        function findModel(
        $id
    ) {

        try {
            $model = \Folha::find(['id' => $id]);
        } catch (\ActiveRecord\RecordNotFound $e) {
            return null;
        }

        return $model;
    }

}