<?php

class Linha extends \ActiveRecord\Model
{
    public static $table_name = 'linhas';

    static $validates_numericality_of = array(
        array('folha_id', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
        array('servico_id', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
        array('quantidade', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
    );

    static $belongs_to = array(
        array('folha')
    );

}


