<?php

namespace TestApp;

use Fzb;

$db  = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
//$db2 = new Fzb\Database(driver: 'sqlite', file: DATA_DIR."/test.db");
$renderer = new Fzb\Renderer();

print("<pre>");

$obj1 = new MyClass();
$obj2 = new MyClass(
    name: "Bill",
    city: "Nowhere",
    state: "TX",
    zip: "12345"
);
$obj3 = new MyClass(id: 1);

//$obj2->save();

print_r($obj1);
print_r($obj2);
print_r($obj3);

$all = MyClass::get_all();

print_r($all);