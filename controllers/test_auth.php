<?php

namespace TestApp;

use Fzb;

$db       = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
$auth     = new Fzb\Auth();
$renderer = new Fzb\Renderer();
$input   = new Fzb\Input(
    username: 'post required',
    password: 'post required'
);

if ($input->is_post() ) {
    $renderer->set('input', $input);
}

$renderer->display("test_auth.tpl.php");