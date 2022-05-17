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

// global variables
$router = new Fzb\Router(MODULES_DIR);

// load the specified module
$router->route();
