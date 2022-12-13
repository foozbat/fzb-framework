<?php

namespace TestApp;

use Fzb\Renderer;

$renderer = new Renderer();

$array = ['one', 'two', 'three'];

$unsafe_content1 = '<script type="text/javascript">alert("gotcha");</script>';
$unsafe_content2 = '<b>I should not be bold</b>';

$unsafe_arr = array(
    '<i>Not Italic</i>',
    'I am good',
    '<a class="btn btn-primary">I am not a button</a>'
);

$unsafe_2d_array = [
    array(1,2,3),
    array('one', '<b>two</b>', 'three')
];

$renderer->set('array', $array);
$renderer->set('unsafe_arr', $unsafe_arr);
$renderer->set('unsafe_content1', $unsafe_content1);
$renderer->set('unsafe_content2', $unsafe_content2);
$renderer->set('unsafe_2d_array', $unsafe_2d_array);

$renderer->show('test_renderer.tpl.php');

