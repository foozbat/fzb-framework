<?php

namespace TestApp;

use Fzb;

//$db  = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
$db2 = new Fzb\Database(sqlite: DATA_DIR."/test.db");
$renderer = new Fzb\Renderer();

$obj = new MyClass();

print("<pre>");

print("GET DATA\n");
print_r($obj->get_data());

