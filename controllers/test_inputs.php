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
$page_input = new Fzb\Input(id: 'get|required|post');
$bm2->end();

//var_dump($page_input);

$renderer = new Fzb\Renderer();

$renderer->set_all($page_input);
$renderer->set('page_input', $page_input);

if ($page_input->is_post()) {
    // define a second set of inputs for when form post is received
    $bm3 = new Fzb\Benchmark('form_input');
    $bm3->start();
    /*$form_input = new Fzb\Input(
        text:        [ 'type' => 'POST', 'required' => true ],
        email:       [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_EMAIL ],
        bool_option: [ 'type' => 'POST', 'required' => true, 'validate' => FILTER_VALIDATE_BOOLEAN ],
    );*/

    $form_input = new Fzb\Input(
        text:        ['post' ],
        email:       ['post', 'required', 'validate:email' ],
        bool_option: 'post|required|validate:boolean'
    );

    $bm3->end();

    $bool = $form_input["bool_option"]->value;

    $renderer->set_all($form_input);
    $renderer->set('form_input', $form_input);
}

// define inputs as array unpack with no validation
$input2 = new Fzb\Input(...['one', 'two', 'three']);
$renderer->set_all($input2);

//var_dump($input2);

// define input using arrayaccess
$input3 = new Fzb\Input();
$input3['four'] = null;

//var_dump($input3);

$bm1->end();

$renderer->display("test_inputs.tpl.php");

