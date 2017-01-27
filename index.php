<?php
require_once "vendor/autoload.php";
require_once "bootstrap.php";

use src\Controller\Dispatcher;

$path = explode(DIRECTORY_SEPARATOR, __DIR__);
define('PATH', '/' . $path[sizeof($path)-1]);

$dispatch = new Dispatcher($em);
echo $dispatch->dispatch($em);