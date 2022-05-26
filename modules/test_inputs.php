<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

$page_input = new Fzb\Input(
    year:  [ 'type' => 'PATH', 'required' => true ],
    month: [ 'type' => 'PATH', 'required' => true ],
    day:   [ 'type' => 'PATH', 'required' => true ],
    id:    [ 'type' => 'GET',  'required' => true, 'validate' => FILTER_VALIDATE_INT ],
);

$renderer->assign_all($page_input);
$renderer->assign('page_input', $page_input);

if ($page_input->is_post()) {
    $form_input = new Fzb\Input(
        text:        [ 'type' => 'POST', 'required' => true, /*'validate' => FILTER_SANITIZE_SPECIAL_CHARS*/ ],
        email:       [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
        bool_option: [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_BOOLEAN ],
    );

    $renderer->assign_all($form_input);
    $renderer->assign('form_input', $form_input);
}

$renderer->display("test_inputs");

