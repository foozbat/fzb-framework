<?php

namespace TestApp;

use Fzb;

/* 
// test case config file
$db = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
*/

/* 
//test case mysql manual constructor
$db = new Fzb\Database(
    driver:   "mysql",
    host:     "localhost",
    username: "test",
    password: "TESTtest1!",
    database: "test"
);
*/

define ('DB_POSTGRES', 100);
define ('DB_MYSQL', 200);


print("<pre>");
print_r(\PDO::getAvailableDrivers());

// test case postgres
$db = new Fzb\Database(
    driver:   "pgsql",
    host:     "localhost",
    username: "postgres",
    password: "test",
    database: "test",
    id: DB_POSTGRES
);

$db2 = new Fzb\Database(
    driver:   "mysql",
    host:     "localhost",
    username: "test",
    password: "TESTtest1!",
    database: "test",
    id: DB_MYSQL
);

$the_postgres = Fzb\Database::get_instance(DB_POSTGRES);
$the_mysql = Fzb\Database::get_instance(DB_MYSQL);

print "db == db2: " . ($db === $db2) . "\n";
print "db == the_postgres: " . ($db === $the_postgres) . "\n";
print "db2 == the_mysql: " . ($db2 === $the_mysql) . "\n";


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

$data2 = [
    'name' => 'Joe',
    'city' => 'Dallas',
    'state' => 'TX',
    'zip' => rand(70000,79999),
    'nothing' => 'nothing'
];


// test auto_insert_update
print "AUTO QUERY 1<br/>";
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);
$db->auto_insert_update("test", $data);

print "AUTO QUERY 2<br/>";
$db->auto_insert_update("test", array('city' => 'Atlanta', 'state' => 'GA'), "id", $db->last_insert_id());


// test prepared statements
print("prepared statment<br />");
$db->prepare("SELECT * FROM test");
$db->prepare("SELECT * FROM test LIMIT 5");
$db->execute();

// test fetch and select
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

// cleanup
$db->query("DELETE FROM test");