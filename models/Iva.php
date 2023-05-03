<?php

class Iva extends \ActiveRecord\Model
{
    public static $table_name = 'iva';

    static $validates_presence_of = array(
        array('descricao', 'message' => 'Campo obrigatório!'),
        array('emvigor', 'message' => 'Campo obrigatório!'),
    );

    static $validates_numericality_of = array(
        array('percentagem', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
    );
}
