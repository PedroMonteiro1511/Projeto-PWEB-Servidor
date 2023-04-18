<?php


define('NOME_APP', 'Minha App');
define('ROTA_LOGIN', 'site/login');

require_once 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/projetopws',
        )
    );
});