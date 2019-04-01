<?php

//ini_set('display_errors', 1);
//ini_set('error_reporting', E_ALL);

define('ROOT', __DIR__);

session_start();



require_once (ROOT.'/components/Autoload.php');

$router = new Router;
$router->runController();