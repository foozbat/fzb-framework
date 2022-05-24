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

$renderer->assign('input_required_error', $page_input->required_inputs_missing());
$renderer->assign('input_validation_error', $page_input->inputs_invalid());

$renderer->assign_inputs($page_input);

$renderer->assign('page_input', $page_input);

if ($page_input->is_post()) {
    $form_input = new Fzb\Input(
        email:        [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
        text:         [ 'type' => 'POST', 'required' => true, /*'validate' => FILTER_SANITIZE_SPECIAL_CHARS*/ ],
        bool_option:  [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_BOOLEAN ],
    );

    //$renderer->assign('input_required_error', $form_input->required_inputs_missing());
    //$renderer->assign('input_validation_error', $form_input->inputs_invalid());

    $renderer->assign_inputs($form_input);
    $renderer->assign('form_input', $form_input);
}

$renderer->display("test_inputs");

