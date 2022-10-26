<?php

$router->use_controller_prefix();

$router->get('/', function () {
    print("I'm an admin.");
});

$router->get('/sub', function () {
    print("I'm the sub.");
});

$router->route();