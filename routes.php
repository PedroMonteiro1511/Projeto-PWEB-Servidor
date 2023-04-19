<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';

return [

    'defaultRoute' => ['GET', 'SiteController', 'index'],
    'site' => [
        'index' => ['GET', 'SiteController', 'index'],
        'create' =>['GET', 'SiteController', 'create'],
        'signup' =>['GET|POST', 'SiteController', 'signup'],

        'login' =>['GET|POST', 'SiteController', 'login'],
        ],
    'auth' => [
        'index' => ['GET', 'AuthController', 'index'],
        'login' =>['GET|POST', 'AuthController', 'login'],
        'signout' => ['GET|POST', 'AuthController', 'signout'],
    ]
];

