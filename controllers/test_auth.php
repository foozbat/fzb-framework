<?php

namespace TestApp;

use Fzb\Database, Fzb\Auth, Fzb\Renderer, Fzb\Input;

$db       = new Database(ini_file: CONFIG_DIR."/.config.ini");
$auth     = new Auth();
$renderer = new Renderer();
$input    = new Input(
    username: 'post required',
    password: 'post required'
);

if ($input->is_post() ) {
    $renderer->set('input', $input);
}

$renderer->show("test_auth.tpl.php");