<?php

namespace TestApp;

use Fzb;


$renderer = new Fzb\Renderer();

$db = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");

$db2 = new Fzb\Database(sqlite: DATA_DIR."/test.db");

$obj = new MyClass();

print_r($obj->get_data());