<?php
/* 
	file:       test.module.php
	type:       Module
	written by: Aaron Bishop
	description:  
        This class is a wrapper for PDO to reduce boilerplate and provide a cleaner, more Perl DBI-like interface.
    inputs:     GET/POST/PATH
    output:     HTML Renderer
*/

namespace TestApp;

use Fzb;

$db = new Fzb\Database(['ini_file' => SETTINGS_DIR."/.settings.ini"]);

$obj = new MyClass();