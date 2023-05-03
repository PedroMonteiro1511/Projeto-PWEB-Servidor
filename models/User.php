<?php

use ActiveRecord\Model;

class User extends Model
{
    public static $Role_User_Cliente = "cliente";
    public static $Role_User_Funcionario = "funcionario";
    public static $Role_User_Admin = "administrador";


    public static $table_name = 'users';

    static $validates_presence_of = array(
        array('username', 'message' => 'Invalido Username'),
        array('email', 'message' => 'Inválido Email'),
        array('localidade', 'message' => 'Inválida Localidade'),
        array('codpostal', 'message' => 'Inválido Código-Postal'),
        array('password', 'message' => 'Inválida Password'),
        array('morada', 'message' => 'Inválida Morada'),
    );

    static $validates_numericality_of = array(
        array('telefone', 'greater_than' => 0, 'message' => 'Inválido Número'),
        array('nif', 'greater_than' => 0, 'message' => 'Inválido Nif')
    );

    static $validates_uniqueness_of = array(
        array('email', 'message' => 'O E-mail já existe!'),
        array('username', 'message' => 'O Username já existe!'),
        array('telefone', 'message' => 'O Número de Telemóvel já existe!'),
        array('nif', 'message' => 'O Nif já existe!')
    );

    static $validates_size_of = array(
        array('telefone', 'minimum' => 9, 'too_short' => 'Número de Telemóvel com formatação incorreta!'),
        array('nif', 'minimum' => 9, 'too_short' => 'Nif com formatação incorreta!'),
        array('username', 'minimum' => 3, 'too_short' => 'Username tem de ter no mínimo 3 caracteres!')
    );

    static $validates_format_of = array(
        array(
            'email',
            'with' =>
            '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/',
            'message' => 'E-mail com formatação incorreta!'
        ),
        array(
            'codpostal',
            'with' =>
            '/^\d{4}-\d{3}?$/',
            'message' => 'Código Postal com formatação incorreta!'
        ),
    );


    public static function getUsernameById($id)
    {
        $user = self::find([$id]);
        if (is_null($user)) {
            return "";
        }

        return $user->username;
    }
}