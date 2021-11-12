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

// app specific initialization
require_once("appinit.php");

// class autoloader
require_once("autoload.php");


// global variables

$router = new Router();



// load the specified module
//require_once($MODULES['test']);

?>
