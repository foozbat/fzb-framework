<?php

namespace TestApp;

use Fzb;

$db  = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
//$db2 = new Fzb\Database(driver: 'sqlite', file: DATA_DIR."/test.db");
$renderer = new Fzb\Renderer();

$obj1 = new MyClass();
$obj2 = new MyClass(
    name: "Bill",
    city: "Nowhere",
    state: "TX",
    zip: rand(10000, 99999)
);
$obj3 = new MyClass(id: 1);
//$obj2->save();

//print_r($obj1);
//print_r($obj2);
//print_r($obj3);

$all = MyClass::get_all();
//print_r($all);

$somewhere = MyClass::get_by(city: "Somewhere", zip: 99999);
//print_r($somewhere);

$id = MyClass::get_by(id: 350);
//print_r($id);

$renderer->assign('all', $all);
$renderer->display('test_class');