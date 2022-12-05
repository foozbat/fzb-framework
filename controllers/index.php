<?php
namespace TestApp;

use Fzb\Renderer as Renderer;

$renderer  = new Renderer();

$renderer->set('variable', 'Hello world!');

$renderer->display('main.tpl.php');