<?php
namespace myapp;

use Fzb\Renderer;
use Fzb\Inputs;

$renderer = new Renderer();


$inputs   = new Inputs([
    '_path_scheme' => "year/month/day",
]);

$inputs->add_inputs([
    'id' => [
        'required' => true,
        'type' => 'GET',
        'validate' => FILTER_VALIDATE_INT,
    ],
    'email' => [
        'required' => true,
        'type' => 'POST',
        'validate' => FILTER_VALIDATE_EMAIL,
    ],
    'text' => [
        'required' => true,
        'type' => 'POST',
        'validate' => FILTER_SANITIZE_SPECIAL_CHARS,
    ],
    'bool_option' => [
        'required' => true,
        'type' => 'POST',
        'validate' => FILTER_VALIDATE_BOOLEAN,
    ],
    'month' => [
        'required' => true,
        'type' => 'PATH'
    ],
    'year' => [
        'required' => true,
        'type' => 'PATH'
    ],
    'day' => [
        'required' => true,
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
} catch (\Fzb\InputValidationException $e) {
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

$renderer->assign('month', $inputs['month']);
$renderer->assign('day', $inputs['day']);
$renderer->assign('year', $inputs['year']);

$renderer->display("test");