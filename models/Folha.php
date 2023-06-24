<?php

class Folha extends \ActiveRecord\Model
{
    public static $table_name = 'folhas';
    public static $Estado_Em_Lancamento = 'Em Lançamento';
    public static $Estado_Emitida = 'Emitida';
    public static $Estado_Paga = 'Paga';


    static $validates_numericality_of = array(
        array('cliente_id', 'greater_than' => 0,'message' => 'Campo obrigatório!')
    );

    static $has_many = array(
        array('linhas'),
    );

    static $belongs_to = array(
        array('user')
    );

}


