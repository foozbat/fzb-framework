<?php
namespace TestApp;

use Fzb\Framework\Renderer as Renderer;
use Fzb\Framework\Parameters as Parameters;

$renderer  = new Renderer();
$params    = new Parameters();
$testclass = new MyClass();

// get valid module inputs
list($id, $something, $somethingelse) = $params->specify([
    'id' => [
        'type' => 'int',
        'source' => 'path',
        'required' => 'yes'
    ],
    'something' => [
        'type' => 'string',
        'source' => 'get',
        'restrictions' => 'alphanumeric'
    ],
    'somethingelse' => [
        'type' => 'string',
        'source' => 'post',
    ]
]);

print_r("<pre>");
print_r($_GET);
print_R("</pre>");

$renderer->test();