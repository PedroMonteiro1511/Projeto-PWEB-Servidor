<?php

use ActiveRecord\Model;

class Empresa extends Model
{
    public static $table_name = 'empresa';

    static $validates_presence_of = array(

        array('desigsocial', 'message' => 'Campo obrigatório!'),
        array('email', 'message' => 'Campo obrigatório!'),
        array('morada', 'message' => 'Campo obrigatório!'),
        array('codpostal', 'message' => 'Campo obrigatório!'),
        array('localidade', 'message' => 'Campo obrigatório!')
    );

    static $validates_numericality_of = array(
        array('telefone', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
        array('nif', 'greater_than' => 0,'message' => 'Campo obrigatório!'),
        array('capsocial', 'greater_than' => 0,'message' => 'Campo obrigatório!')
    );

}