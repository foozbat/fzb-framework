<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

// define inputs with required and validate options set
// page requires path options /year/month/day?id=1
$page_input = new Fzb\Input(
    year:  [ 'type' => 'PATH', 'required' => true ],
    month: [ 'type' => 'PATH', 'required' => true ],
    day:   [ 'type' => 'PATH', 'required' => true ],
    id:    [ 'type' => 'GET',  'required' => true, 'validate' => FILTER_VALIDATE_INT ],
);

$renderer->assign_all($page_input);
$renderer->assign('page_input', $page_input);

if ($page_input->is_post()) {
    // define a second set of inputs for when form post is received
    $form_input = new Fzb\Input(
        text:        [ 'type' => 'POST', 'required' => true, /*'validate' => FILTER_SANITIZE_SPECIAL_CHARS*/ ],
        email:       [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
        bool_option: [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_BOOLEAN ],
    );

    $renderer->assign_all($form_input);
    $renderer->assign('form_input', $form_input);
}

// define inputs as array unpack with no validation
$input2 = new Fzb\Input(...['one', 'two', 'three']);
$renderer->assign_all($input2);

// define input using arrayaccess
$input3 = new Fzb\Input();
$input3['four'] = null;

$renderer->display("test_inputs.tpl.php");

Fzb\myhelper();