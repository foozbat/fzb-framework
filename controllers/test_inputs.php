<?php

namespace TestApp;

use Fzb;

$bm1 = new Fzb\Benchmark('test_inputs');
$bm2 = new Fzb\Benchmark('page_input');

$bm1->start();

// single get input
$bm2->start();
$page_input = new Fzb\Input(id: 'get');
$bm2->end();

//var_dump($page_input);

$renderer = new Fzb\Renderer();

$renderer->set_all($page_input);
$renderer->set('page_input', $page_input);

if ($page_input->is_post()) {
    // define a second set of inputs for when form post is received
    $bm3 = new Fzb\Benchmark('form_input');
    $bm3->start();

    // define post inputs as array or space-delimited string
    $form_input = new Fzb\Input(
        text:  ['post'],
        email: ['post', 'required', 'validate:email'],
        bool_option: 'post required validate:bool'
    );

    $bm3->end();

    $renderer->set_all($form_input);
    $renderer->set('form_input', $form_input);
}

// define inputs as array unpack with no validation
$input2 = new Fzb\Input(...['one', 'two', 'three']);
$renderer->set_all($input2);

// define input using arrayaccess (might deprecate)
$input3 = new Fzb\Input();
$input3['four'] = null;

$bm1->end();

$renderer->show("test_inputs.tpl.php");

