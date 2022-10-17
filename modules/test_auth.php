<?php

namespace TestApp;

use Fzb;

$db       = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
$auth     = new Fzb\Auth();
$renderer = new Fzb\Renderer();
$input   = new Fzb\Input(
    username: ['type' => 'POST', 'required' => true ],
    password: ['type' => 'POST', 'required' => true ]
);

if ($input->is_post() ) {
    $renderer->assign('input', $input);
}

$renderer->display("test_auth");