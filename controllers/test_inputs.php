<?php

namespace TestApp;

use Fzb;

$bm_r = new Fzb\Benchmark('render1');
$bm_r->start();
$r = new Fzb\Renderer();
$bm_r->end();

$bm_r2 = new Fzb\Benchmark('render2');
$bm_r2->start();
$r2 = new Fzb\Renderer();
$bm_r2->end();

$bm1 = new Fzb\Benchmark('test_inputs');
$bm2 = new Fzb\Benchmark('page_input');



$bm1->start();
$blarg = new Fzb\Input();
// define inputs with required and validate options set
// page requires path options /year/month/day?id=1
$bm2->start();
$page_input = new Fzb\Input(
//    year:  [ 'type' => 'PATH', 'required' => true ],
//    month: [ 'type' => 'PATH', 'required' => true ],
//    day:   [ 'type' => 'PATH', 'required' => true ],
    id:    [ 'type' => 'GET', 'required' => true ],
);
$bm2->end();

$renderer = new Fzb\Renderer();

//$renderer->assign_all($page_input);
$renderer->assign('page_input', $page_input);

if ($page_input->is_post()) {
    // define a second set of inputs for when form post is received
    $bm3 = new Fzb\Benchmark('form_input');
    $bm3->start();
    $form_input = new Fzb\Input(
        text:        [ 'type' => 'POST', 'required' => true, /*'validate' => FILTER_SANITIZE_SPECIAL_CHARS*/ ],
        email:       [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
        bool_option: [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_BOOLEAN ],
    );
    $bm3->end();

    $renderer->assign_all($form_input);
    $renderer->assign('form_input', $form_input);
}

// define inputs as array unpack with no validation
$input2 = new Fzb\Input(...['one', 'two', 'three']);
$renderer->assign_all($input2);

// define input using arrayaccess
$input3 = new Fzb\Input();
$input3['four'] = null;

$bm1->end();

$renderer->display("test_inputs.tpl.php");