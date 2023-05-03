<?php

class Service extends \ActiveRecord\Model
{
    public static $table_name = 'services';
    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo obrigatório!'),
        array('descricao', 'message' => 'Campo obrigatório!'),
        array('preco', 'message' => 'Campo obrigatório!'),
    );

    static $validates_numericality_of = array(
        array('preco', 'greater_than' => 0, 'message' => 'Campo obrigatório!'),
        array('iva_id', 'greater_than' => 0, 'message' => 'Campo obrigatório!')
    );

    static $validates_uniqueness_of = array(
        array('referencia', 'message' => 'A Referência já existe!')
    );


    static $belongs_to = array(
        array('iva')
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