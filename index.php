<?php
/* 
	file:         index.php
	type:         Main Program
	written by:   Aaron Bishop
	date:         6/18/2019
	description:  This is the main entry point for the application.  All common initialization is done here and this script functions as the main controller.
*/
namespace Fzb\Framework;

error_reporting(E_ALL);

// class autoloader
require_once("autoload.php");

// app specific initialization
require_once("appinit.php");

// global variables

// locate all developer created modules
//find_modules($MODULES, __DIR__.'/modules');
$router = new Router('fzbrt', __DIR__.'/modules');



// load the specified module
//require_once($MODULES['test']);

?>
