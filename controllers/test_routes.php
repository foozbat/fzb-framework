<?php

namespace TestApp;

// code that always gets executed before
//
use Fzb\Renderer;

$router->get("/test_routes", function () {
    print("I'm base");
});

$router->get('/test_routes/test1', function () {
    print("I'm test1");
});


$router->get(
    '/test_routes/test2',
    '/test_routes/test2/{var}',
    function ($var) {
        print("I'm test2\n");
        print("received: var1=$var");
});

$router->get(
    '/test_routes/test3/{var1}/something',
    '/test_routes/test3/{var1}/something/{var2}', 
    function ($var1, $var2='hellohello') {
        print("I'm test3\n");
        print("received: var1=$var1, var2=$var2");
});

$router->get('/test_routes/getme1', function () {
    print("GOT ME 1");
});

$router->get(
    '/test_routes/getme2',
    '/test_routes/getme2/one',
    '/test_routes/getme2/two',
    function () {
        print("GOT ME 2");
});

$router->add(
    method: 'GET',
    path: [
        '/test_routes/add',
        '/test_routes/add/{var}'
    ],
    func: function ($var=null) {
        print("I'm add: $var");
    }
);

$router->route();

// code that always gets executed after
//