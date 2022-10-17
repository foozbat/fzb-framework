<?php
/*
    Test cases for ORM derived class
*/

namespace TestApp;

use Fzb;

$db  = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
//$db2 = new Fzb\Database(driver: 'sqlite', file: DATA_DIR."/test.db");
$renderer = new Fzb\Renderer();

print("<pre>");

// new blank object
$obj1 = new MyClass();
var_dump($obj1);

// new object with data to insert
$obj2 = new MyClass(
    name: "Bill",
    city: "Nowhere",
    state: "TX",
    zip: rand(10000, 99999)
);
$obj2->save();
var_dump($obj2);

// get existing object by instatiation
$obj3 = new MyClass(id: 1);
var_dump($obj3);

// get existing object via static method
$by_id = MyClass::get_by(id: 350);
var_dump($by_id);

// get multiple existing objects via static method
$by_multi = MyClass::get_by(city: "Somewhere", zip: 99999);
var_dump($by_multi);

print("</pre>");

// get all records as an array of objects and assign to renderer
$all = MyClass::get_all();
$renderer->assign('all', $all);
$renderer->display('test_class');