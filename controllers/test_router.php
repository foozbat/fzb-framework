<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

$router->get("/test_router", function () {
    print("I'm base");
});

$router->get('/test_router/test1', function () {
    print("I'm test1");
});

$router->get(
    '/test_router/test2',
    '/test_router/test2/{var}',
    function ($var=1) {
        print("I'm test2\n");
        print("received: var1=$var");
});

$router->get(
    '/test_router/test3/{var1}/something',
    '/test_router/test3/{var1}/something/{var2}', 
    function ($var1, $var2='hellohello') {
        print("I'm test3\n");
        print("received: var1=$var1, var2=$var2");
});

$router->get('/test_router/sendpost', function () use ($renderer) {
    $renderer->display('test_router.tpl.php');
});

$router->post('/test_router/rcvpost/{var}', function($var) {
    print("got the post");
});

// test routes using controller prefix
$router->use_controller_prefix();

$router->get('/renderer', function () use ($renderer) {
    $renderer->assign('path', '/test_router/renderer');
    $renderer->assign('post_path', '/test_router/rcvpost/1');
    $renderer->display("test_router.tpl.php");
});

// test using no leading /
$router->get(
    'getme2',
    'getme2/one',
    'getme2/two',
    function () {
        print("GOT ME 2");
});

// test multiple request methods
$router->add(
    method: ['GET', 'POST'],
    path: [
        'add',
        'add/{var}'
    ],
    func: function ($var=null) {
        print("I'm add: $var");
    }
);

$router->route();

// code that always gets executed after
//