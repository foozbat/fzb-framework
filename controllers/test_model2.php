<?php
/*
    Second set of test cases for ORM derived class
*/
namespace TestApp;

define ('DB_POSTGRES', 100);
define ('DB_MYSQL', 200);

use Fzb\Database;

$db = new Database(
    driver:   "pgsql",
    host:     "localhost",
    username: "postgres",
    password: "test",
    database: "test",
    id: DB_POSTGRES
);

$db2 = new Database(
    driver:   "mysql",
    host:     "localhost",
    username: "test",
    password: "TESTtest1!",
    database: "test",
    id: DB_MYSQL
);

print("<pre>");

$obj1 = new MyClass(
    name: "TESTY"
);


// save the object to postgres
$obj1->save();

Database::set_active_db(DB_MYSQL);

// reset the primary key and save to mysql
$obj1->id = null;
$obj1->save();

print "no output, check both MySQL and Postgres DB to verify the object was saved to both DB's.";