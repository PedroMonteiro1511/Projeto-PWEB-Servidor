<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ServiceController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/FolhaController.php';
require_once 'controllers/LinhaController.php';
require_once 'controllers/FolhaClienteController.php';

return [

    'defaultRoute' => ['GET', 'SiteController', 'index'],
    'site' => [
        'index' => ['GET', 'SiteController', 'index'],
        'create' => ['GET', 'SiteController', 'create'],
        'signup' => ['GET|POST', 'SiteController', 'signup'],

        'login' => ['GET|POST', 'SiteController', 'login'],
    ],
    'auth' => [
        'index' => ['GET', 'AuthController', 'index'],
        'login' => ['GET|POST', 'AuthController', 'login'],
        'signout' => ['GET|POST', 'AuthController', 'signout'],
    ],
    'service' => [
        'index' => ['GET', 'ServiceController', 'index'],
        'show' => ['GET', 'ServiceController', 'show'],
        'create' => ['GET', 'ServiceController', 'create'],
        'store' => ['POST', 'ServiceController', 'store'],
        'edit' => ['GET', 'ServiceController', 'edit'],
        'update' => ['POST', 'ServiceController', 'update'],
        'delete' => ['GET', 'ServiceController', 'delete'],
    ],
    'user' => [
        'index' => ['GET', 'UserController', 'index'],
        'edit' => ['GET', 'UserController', 'edit'],
        'update' => ['GET|POST', 'UserController', 'update']
    ],
    'folha'=>[
        'index' => ['GET', 'FolhaController', 'index'],
        'show' => ['GET', 'FolhaController', 'show'],
        'create' => ['GET', 'FolhaController', 'create'],
        'store' => ['POST', 'FolhaController', 'store'],
        'edit' => ['GET', 'FolhaController', 'edit'],
        'update' => ['POST', 'FolhaController', 'update'],
        'delete' => ['GET', 'FolhaController', 'delete'],
        'emitir' => ['GET', 'FolhaController', 'emitir'],
    ],
    'linha'=>[
        'index' => ['GET', 'LinhaController', 'index'],
        'show' => ['GET', 'LinhaController', 'show'],
        'create' => ['GET', 'LinhaController', 'create'],
        'store' => ['POST', 'LinhaController', 'store'],
        'edit' => ['GET', 'FolhaController', 'edit'],
        'update' => ['POST', 'LinhaController', 'update'],
        'delete' => ['GET', 'LinhaController', 'delete'],
    ],
    'folhacliente'=>[
        'index' => ['GET', 'FolhaClienteController', 'index'],
        'pay' => ['GET', 'FolhaClienteController', 'pay'],
        'submitPay' => ['POST', 'FolhaClienteController', 'submitPay'],
    ]
];