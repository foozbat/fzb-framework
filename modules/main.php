<?php
//namespace TestApp;

use Fzb\Renderer as Renderer;

$renderer  = new Renderer();

$renderer->assign('test', 'oh yeah');
$renderer->display('main');