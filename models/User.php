<?php

use ActiveRecord\Model;
class User extends Model
{
    public static $Role_User_Cliente = "Cliente";

    public static $table_name = 'users';

    static $validates_presence_of = array(
        array('username', 'message' => 'Invalido Username'),
        array('email', 'message' => 'Inválido Email'),
        array('localidade', 'message' => 'Inválida Localidade'),
        array('telefone', 'message' => 'Inválido Telefone'),
        array('codpostal', 'message' => 'Inválido Código-Postal'),
        array('nif', 'message' => 'Inválido Nif'),
        array('password', 'message' => 'Inválida Password'),
        array('morada', 'message' => 'Inválida Morada'),
    );
}
