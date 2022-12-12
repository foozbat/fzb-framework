<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

$bm = new Fzb\Benchmark('test_router');
$bm->start();

$router->get("/test_router", function () use ($renderer, $router) {
    $routes = $router->get_routes();
    ksort($routes);

    $renderer->set('routes', $routes);
    $renderer->show('test_router.tpl.php');
});

$router->get('/test_router/test1', function () {
    print("I'm test1");
});

$router->get(
    '/test_router/test2',
    '/test_router/test2/{var1}',
    function () {
        $in = new Fzb\Input(var1: 'path required default:1');

        print("I'm test2\n");
        print("received: var1=".$in['var1']);
});

$router->get(
    '/test_router/test3/{var1}/something',
    '/test_router/test3/{var1}/something/{var2}', 
    function () {
        $in = new Fzb\Input(
            var1: 'path',
            var2: 'path default:hello'
        );

        print("I'm test3\n");
        print("received: var1=".$in['var1']. ", var2=". $in['var2']);
});

$router->post('/test_router/rcvpost/{var}', function() {
    print("got the post");
});

// test routes using controller prefix
$router->use_controller_prefix();

$router->get('/renderer', function () use ($renderer) {
    $renderer->set('path', '/test_router/renderer');
    $renderer->set('post_path', '/test_router/rcvpost/1');
    $renderer->show("test_router.tpl.php");
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
        'add/{var1}'
    ],
    func: function () {
        $in = new Fzb\Input(var1: 'path default:hello');
        print("I'm add: ".$in['var1']);
    }
);

$router->get('inputs/{one}/{two}', function() {
    $input = new Fzb\Input(
        one: 'path required validate:int',
        two: 'path required validate:float',
        three: 'get'
    );

    var_dump($input);
});

$bm->end();

$router->route();



// code that always gets executed after
//
