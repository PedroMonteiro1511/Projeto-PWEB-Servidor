<?php

require_once 'controllers/HomeController.php';
require_once 'controllers/AuthController.php';

return [

    'defaultRoute' => ['GET', 'AuthController', 'index'],
    'auth' => ['GET', 'AuthController', 'index'],
    'home' => [
        'index' => ['GET', 'HomeController', 'index']
    ,]

];

