<?php

require_once 'vendor/autoload.php';

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pweb-servidor';

ActiveRecord\Config::initialize(function($cfg) use ($host, $username, $password, $database) {
    $cfg->set_model_directory('models');
    $cfg->set_connections([
        'development' => "mysql://$username:$password@$host/$database"
    ]);
});