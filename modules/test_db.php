<?php
namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

try {
    /*db = new Database([
        'driver' => 'mysql',
        'host' => 'localhost',
        'username' => 'test',
        'password' => 'password',
        'database' => 'test'
    ]);*/

    $db = new Fzb\Database(['ini_file' => SETTINGS_DIR."/.settings.ini"]);
} catch (Fzb\DatabaseConnectException $e) {
    die($e->getMessage());
}

//$array = $db->selectrow_array("SELECT * FROM test");

$test_obj = new MyClass();
$test_obj->do_something();

