#!/usr/bin/php
<?php


require_once(__DIR__."/../appinit.php");
require_once(__DIR__."/../autoload.php");

/*
print("<pre>");
print("ENVIRONMENT\n");
print_r($_ENV);
print("</pre>");

print("<pre>");
print("GET\n");
print_r($_GET);
print("</pre>");
*/

$blah = var_export($_SERVER ,true);
$blah = str_replace("\n", '<br \>', $blah);
echo "BLAH IS: ".$blah."<br /><br />";

parse_str($_SERVER['QUERY_STRING'], $_GET);
$get = var_export($_GET ,true);
$get = str_replace("\n", '<br \>', $get);

echo "_GET IS: ".$get."<br /><br />";

echo "\n";

while(true) {
    //websocket stuff
    $msg = trim(fgets(STDIN));
    
    print($msg."\n");
    
}