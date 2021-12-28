<?php

use Fzb\Database;

try {
    /*db = new Database([
        'driver' => 'mysql',
        'host' => 'localhost',
        'username' => 'test',
        'password' => 'password',
        'database' => 'test'
    ]);*/

    $db = new Database(['ini_file' => SETTINGS_DIR."/.settings.ini"]);
} catch (FZB\DatabaseConnectException $e) {
    die($e->getMessage());
}

$array = $db->selectrow_array("SELECT * FROM test");