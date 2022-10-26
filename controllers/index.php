<?php
namespace TestApp;

use Fzb\Renderer as Renderer;

$renderer  = new Renderer();

$renderer->assign('variable', 'Hello world!');

$renderer->display('main.tpl.php');