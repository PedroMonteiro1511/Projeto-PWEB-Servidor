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

        $all = \Folha::find(['cliente_id' => $_SESSION['active_user_id']]);
        if (!is_null($all)) {
            $all = $all->all();
        }else{
            $all = [];
        }
        return $this->renderView('folhacliente/index', ['folhas' => $all]);
    }

    public function pay($id)
    {
        $model = $this->findModel($id);
        if (is_null($model)) {
            return $this->redirectToRoute('folhacliente/index');
        }

        return $this->renderView('folhacliente/pagamento');
    }

    public function submitPay($id)
    {
        $model = $this->findModel($id);
        $model->update_attribute('estado', \Folha::$Estado_Paga);
        $model->save();

        return $this->redirectToRoute('folhacliente/index');
    }

    private function findModel($id)
    {

        try {
            $model = \Folha::find(['id' => $id]);
        } catch (\ActiveRecord\RecordNotFound $e) {
            return null;
        }

        return $model;
    }

}
