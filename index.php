<?php
/* 
	file:         index.php
	type:         Main Program
	written by:   Aaron Bishop
	date:         6/18/2019
	description:  This is the main entry point for the application.  All common initialization is done here and this script functions as the main controller.
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// app specific initialization
require_once(__DIR__."/appinit.php");

// class autoloader
require_once(__DIR__."/vendor/autoload.php");

set_exception_handler(function ($e) {
	$renderer = new Fzb\Renderer();
	$renderer->assign('exception_message', $e->getMessage());
	$renderer->assign('exception_file', $e->getFile());
	$renderer->assign('exception_line', $e->getLine());
	$renderer->assign('exception_trace', $e->getTraceAsString());
	$renderer->display('exception');
});

// global variables
$router = new Fzb\Router();

// load the specified module
$router->route();
