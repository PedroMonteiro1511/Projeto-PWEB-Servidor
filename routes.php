<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ServiceController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/FolhaController.php';
require_once 'controllers/LinhaController.php';
require_once 'controllers/FolhaClienteController.php';

return [

    'defaultRoute' => ['GET', 'SiteController', 'index'],
    'site' => [
        'index' => ['GET', 'SiteController', 'index'],
        'signup' => ['GET|POST', 'SiteController', 'signup'],
    ],
    'auth' => [
        'index' => ['GET', 'AuthController', 'index'],
        'login' => ['GET|POST', 'AuthController', 'login'],
        'signout' => ['GET|POST', 'AuthController', 'signout'],
    ],
    'empresa' => [
        'index' => ['GET', 'EmpresaController', 'index'],
        'form' => ['GET', 'EmpresaController', 'form'],
        'edit' => ['GET', 'EmpresaController', 'edit'],
        'update' => ['POST', 'EmpresaController', 'update'],
    ],
    'iva' => [
        'index' => ['GET', 'IvaController', 'index'],
        'show' => ['GET', 'IvaController', 'show'],
        'create' => ['GET', 'IvaController', 'create'],
        'store' => ['POST', 'IvaController', 'store'],
        'edit' => ['GET', 'IvaController', 'edit'],
        'update' => ['POST', 'IvaController', 'update'],
        'delete' => ['GET', 'IvaController', 'delete'],
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
        'index' => ['GET|POST', 'UserController', 'index'],
        'update_profile' => ['GET', 'UserController', 'update_profile'],
        'edit' => ['GET', 'UserController', 'edit'],
        'update' => ['GET|POST', 'UserController', 'update'],
        'view' => ['GET|POST', 'UserController', 'view'],
        'show' => ['GET|POST', 'UserController', 'show'],
        'create' => ['GET|POST', 'UserController', 'create'],
        'store' => ['GET|POST', 'UserController', 'store'],
        'delete' => ['GET|POST', 'UserController', 'delete'],
        'change' => ['GET|POST', 'UserController', 'change'],
        'search' => ['GET|POST', 'UserController', 'search']
    ],
    'folha' => [
        'index' => ['GET|POST', 'FolhaController', 'index'],
        'show' => ['GET', 'FolhaController', 'show'],
        'create' => ['GET', 'FolhaController', 'create'],
        'store' => ['POST', 'FolhaController', 'store'],
        'edit' => ['GET', 'FolhaController', 'edit'],
        'update' => ['POST', 'FolhaController', 'update'],
        'delete' => ['GET', 'FolhaController', 'delete'],
        'emitir' => ['GET', 'FolhaController', 'emitir'],
        'search' => ['GET|POST', 'FolhaController', 'search'],
        'searchfolhas' => ['GET|POST', 'FolhaController', 'searchfolhas'],
    ],
    'linha' => [
        'index' => ['GET', 'LinhaController', 'index'],
        'show' => ['GET', 'LinhaController', 'show'],
        'create' => ['GET', 'LinhaController', 'create'],
        'store' => ['POST', 'LinhaController', 'store'],
        'edit' => ['GET', 'FolhaController', 'edit'],
        'update' => ['POST', 'LinhaController', 'update'],
        'delete' => ['GET', 'LinhaController', 'delete'],
    ],
    'folhacliente' => [
        'index' => ['GET', 'FolhaClienteController', 'index'],
        'pay' => ['GET', 'FolhaClienteController', 'pay'],
        'submitPay' => ['POST', 'FolhaClienteController', 'submitPay'],
        'show' => ['GET', 'FolhaClienteController', 'show'],
    ],
];