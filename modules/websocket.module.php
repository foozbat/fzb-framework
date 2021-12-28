<?php

$input = new Fzb\Inputs([
    'something' => ['type' => INPUT_GET],
    'somethingelse' => ['type' => INPUT_GET]
]);

$blah = var_export($_SERVER ,true);
$blah = str_replace("\n", '<br \>', $blah);
echo "BLAH IS: ".$blah."<br /><br />";


$get = var_export($input ,true);
$get = str_replace("\n", '<br \>', $get);

echo "INPUT IS: ".$get."<br /><br />";

echo "\n";

/*
while(true) {
    //websocket stuff
    $msg = trim(fgets(STDIN));
    
    print($msg."\n");
    
}*/