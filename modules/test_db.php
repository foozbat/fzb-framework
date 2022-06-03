<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

//$db = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
//$db = new Fzb\Database();
$db = new Fzb\Database(
    driver:   "mysql",
    host:     "localhost",
    username: "test",
    password: "TESTtest1!",
    database: "test"
);


/*
for ($i=0; $i<10; $i++) {
    $db->query("INSERT INTO test SET name=?, city=?, state=?, zip=?", "asdf", "asdfasdf", "as", rand(10000,99999));
}
*/

$data = [
    'name' => 'Joe',
    'city' => 'Dallas',
    'state' => 'TX',
    'zip' => rand(70000,79999)
];

print "AUTO QUERY 1<br/>";
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);
print "AUTO QUERY 2<br/>";
$db->auto_insert_update("test", $data, "id", 1);


print("prepared statment<br />");
$db->prepare("SELECT * FROM test");
$db->prepare("SELECT * FROM test LIMIT 5");
$db->execute();

print("fetchrow_array()<br />");
print_r($db->fetchrow_array());

print("<br /><br />fetchrow_array() loop<br />");

while ($row = $db->fetchrow_assoc()) {
    print_r($row);
    print("<br />");
}

$db->finish();

print("<br /><br />selectrow_array()<br />");
print_r($db->selectrow_array("SELECT * FROM test"));

print("<br /><br />selectrow_assoc()<br />");
print_r($db->selectrow_assoc("SELECT * FROM test"));

print("<br /><br />selectcol_array()<br />");
print_r($db->selectcol_array("SELECT name FROM test"));




$db->query("DELETE FROM test");

//print("<br /><br />QUERY: $query");