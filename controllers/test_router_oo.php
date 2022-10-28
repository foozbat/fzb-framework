<?php

namespace TestApp;

$tc = new TestController();

$router->use_controller_prefix();

$router->get("/", "TestApp\TestController::test_func");

$router->get("/2/{var1}/{var2}", "TestApp\TestController::test_func2");

$router->route();