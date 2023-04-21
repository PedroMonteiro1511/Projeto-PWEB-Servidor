<?php

class Service extends \ActiveRecord\Model
{
    public static $table_name = 'servicos';

    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo obrigatório!'),
        array('descricao', 'message' => 'Campo obrigatório!'),
        array('preco', 'message' => 'Campo obrigatório!'),
    );

    static $validates_numericality_of = array(
        array('preco', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
        array('idiva', 'greater_than' => 0,'message' => 'Campo obrigatório!')
    );

    static $validates_uniqueness_of = array(
        array('referencia', 'message' => 'A Referência já existe!')
    );

    public function getIvaPercentagemByIdIva($idIva)
    {
        $iva = Iva::find([$idIva]);

        return $iva->percentagem;
    }

    public function getIvaDescricaoByIdIva($idIva)
    {
        $iva = Iva::find([$idIva]);

        return $iva->descricao;
    }
}