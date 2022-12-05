<?php

$renderer = new Fzb\Renderer();

$array = ['one', 'two', 'three'];

$unsafe_content1 = '<script type="text/javascript">alert("gotcha");</script>';
$unsafe_content2 = '<b>I should not be bold</b>';

$unsafe_arr = array(
    '<i>Not Italic</i>',
    'I am good',
    '<div>I am not a div</div>'
);

$unsafe_2d_array = [
    array(1,2,3),
    array('one', '<b>two</b>', 'three')
];

$iterate_me = 'me';

$renderer->set('array', $array);
$renderer->set('unsafe_arr', $unsafe_arr);
$renderer->set('unsafe_content1', $unsafe_content1);
$renderer->set('unsafe_content2', $unsafe_content2);
$renderer->set('unsafe_2d_array', $unsafe_2d_array);
$renderer->set('iterate_me', $iterate_me);


$renderer->display('test_renderer.tpl.php');

