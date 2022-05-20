<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();
$db = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");

$inputs = new Fzb\Inputs(
    year:         [ 'type' => 'PATH', 'required' => true ],
    month:        [ 'type' => 'PATH', 'required' => true ],
    day:          [ 'type' => 'PATH', 'required' => true ],
    id:           [ 'type' => 'GET',  'required' => true, 'validate' => FILTER_VALIDATE_INT ],
    email:        [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
    text:         [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_SANITIZE_SPECIAL_CHARS ],
    bool_option:  [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_BOOLEAN ],
);

$inputs['optional_thing'] = [
    'required' => false,
    'type' => 'GET',
];

$inputs['optional_thing2'] = null;

$renderer->assign_all($inputs->get_validation_failures());

$renderer->assign('inputs', $inputs);

$renderer->display("test_inputs");

