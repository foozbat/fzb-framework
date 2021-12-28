<?php

use Fzb\Renderer;
use Fzb\Inputs;

$renderer = new Renderer();

$inputs   = new Inputs([
    '_path_scheme' => "[module]/[month]/[year]",
    'id' => [
        'required' => true,
        'type' => 'GET',
        'validate' => FILTER_VALIDATE_INT,
    ],
    'email' => [
        'required' => true,
        'type' => 'GET',
        'validate' => FILTER_VALIDATE_EMAIL,
    ],
    'text' => [
        'required' => true,
        'type' => 'GET',
        'validate' => FILTER_SANITIZE_SPECIAL_CHARS,
    ],
    'bool_option' => [
        'required' => true,
        'type' => 'GET',
        'validate' => FILTER_VALIDATE_BOOLEAN,
    ],
    'month' => [
        'required' => false,
        'type' => 'PATH'
    ]
]);

$inputs['optional_thing'] = [
    'required' => false,
    'type' => 'GET',
];


$inputs['optional_thing2'] = [];

try {
    $inputs->validate();
} catch (Fzb\InputValidationException $e) {
    $renderer->assign('validation_error', true);
    $renderer->assign('required_failures', $e->required_failures);
    $renderer->assign('validation_failures', $e->validation_failures);
} catch (Exception $e) {
    print("didn't catch it");
}

/*
print("INPUTS OBJECT: ");
print_r("<pre>");
var_dump($inputs);
print_r("</pre>");
*/

$renderer->assign('id', $inputs['id']);
$renderer->assign('email', $inputs['email']);
$renderer->assign('text', $inputs['text']);
$renderer->assign('bool_option', $inputs['bool_option']);
$renderer->assign('optional_thing', $inputs['optional_thing']);



$renderer->display("test");