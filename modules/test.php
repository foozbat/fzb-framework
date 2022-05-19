<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();
$db = new Fzb\Database(ini_file: SETTINGS_DIR."/.settings.ini");

$inputs = new Fzb\Inputs(
    month:        [ 'type' => 'PATH', 'required' => true ],
    year:         [ 'type' => 'PATH', 'required' => true ],
    day:          [ 'type' => 'PATH', 'required' => true ],
    id:           [ 'type' => 'GET',  'required' => true, 'validate' => FILTER_VALIDATE_INT ],
    email:        [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
    text:         [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_SANITIZE_SPECIAL_CHARS ],
    bool_option:  [ 'type' => 'POST', 'required' => false, 'validate' => FILTER_VALIDATE_BOOLEAN ],
);

$inputs['optional_thing'] = [
    'required' => false,
    'type' => 'GET',
];

$inputs['optional_thing2'] = null;

try {
    $inputs->validate();
} catch (Fzb\InputValidationException $e) {
    $renderer->assign('validation_error', true);
    $renderer->assign('required_failures', $e->required_failures);
    $renderer->assign('validation_failures', $e->validation_failures);
}

$renderer->assign('id', $inputs['id']);
$renderer->assign('email', $inputs['email']);
$renderer->assign('text', $inputs['text']);
$renderer->assign('bool_option', $inputs['bool_option']);
$renderer->assign('optional_thing', $inputs['optional_thing']);

$renderer->assign('month', $inputs['month']);
$renderer->assign('day', $inputs['day']);
$renderer->assign('year', $inputs['year']);

$renderer->assign('render_vars', "ASDF");

$renderer->display("test");

//print "GLOBALS AFTER STATE RESTORE<pre>";
//print_r($GLOBALS);