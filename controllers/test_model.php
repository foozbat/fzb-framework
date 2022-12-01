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

print("New blank class\n");
var_dump($obj1);

// new object with data to insert
$obj2 = new MyClass(
    name: "Bill",
    city: "Nowhere",
    state: "TX",
    zip: rand(10000, 99999)
);
$saved = $obj2->save();

print("new MyClass with data\n");
var_dump($obj2);
print("saved: $saved");
print("\n\n");

// update it with new data
$obj2->city = "Here";
$saved = $obj2->save();

print("update city=Here\n");
print("saved: $saved");
print("\n\n");

var_dump($obj2);
print("\n\n");

// get existing object by instatiation
$obj3 = new MyClass(id: 1);

print("new MyClass(id: 1)\n");
var_dump($obj3);
print("\n\n");

// get existing object via static method
$by_id = MyClass::get_by(id: 350);

print("get_by: id=350\n");
var_dump($by_id);
print("\n\n");

// get multiple existing objects via static method
$by_multi = MyClass::get_by(city: "Here", state: "TX");

print("get_by() city=Here, state=TX\n");
var_dump($by_multi);
print("\n");

print("</pre>");

// get all records as an array of objects and assign to renderer
$all = MyClass::get_all();
$renderer->set('all', $all);
echo $renderer->render_as_string('test_class.tpl.php');

//$db->query("DELETE FROM test");

echo "again...";

$all = MyClass::get_all();
var_dump($all);
$renderer->set('all', $all);
echo $renderer->render_as_string('test_class.tpl.php');

echo "done.";