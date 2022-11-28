<?php
/* 
	file:         index.php
	type:         Main Program
	written by:   Aaron Bishop
	description:  This is the main entry point for the application.
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// app specific initialization
require_once __DIR__."/appinit.php";

// class autoloader
require_once __DIR__."/vendor/fzb/fzb/src/Benchmark.php";

$bm_a = new Fzb\Benchmark('autoload');
$bm_a->start();
require_once __DIR__."/vendor/autoload.php";
$bm_a->end();

set_exception_handler(function ($e) {
	print("<pre>");
	print($e);
	print("</pre>");
	exit;
});

$config = new Fzb\Config(ini_file: CONFIG_DIR.'/.config.ini');

// router using controllers
$router = new Fzb\Router(default_controller: 'index.php');
require_once $router->get_controller();

/*
// router in a single index.php file
$router = new Fzb\Router();

$router->get('/', function () {
	print("index");
});

$router->route();
*/