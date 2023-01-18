<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

define('URL', 'http://' . $_SERVER['SERVER_NAME']);

define(
    'configs',
    [
        'ROOT' => dirname(__FILE__),
        'VIEWS' => URL . '/public',
    ]
);

define(
    'configsDB',
    [
        'DBHOST' => 'localhost',
        'DBNAME' => 'projetos',
        'DBUSER' => 'root',
        'DBPASS' => '',
        'CHARSET' => 'utf8'
    ]
);
