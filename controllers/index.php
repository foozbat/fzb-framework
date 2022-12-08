<?php
namespace TestApp;

use Fzb\Renderer as Renderer;

$renderer  = new Renderer();

$controllers = $router->get_all_controllers();
asort($controllers);

$renderer->set('controllers', $controllers);

$renderer->display('index.tpl.php');