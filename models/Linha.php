<?php

class Linha extends \ActiveRecord\Model
{
    public static $table_name = 'linhas';

    static $validates_numericality_of = array(
        array('folha_id', 'greater_than' => 0, 'message' => 'Campo obrigatório!'),
        array('service_id', 'greater_than' => 0, 'message' => 'Campo obrigatório!'),
        array('quantidade', 'greater_than' => 0, 'message' => 'Campo obrigatório!'),
    );

    static $belongs_to = array(
        array('folha'),
        array('service'),
    );

    public static function CalcularValor($valorServico, $quantidade): float|int
    {
        return $valorServico * $quantidade;
    }

    public static function CalcularValorIva($valorIvaService, $valorLinha): float|int
    {
        return (($valorIvaService * $valorLinha) / 100) + $valorLinha;
    }
}