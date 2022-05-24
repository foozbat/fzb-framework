<?php

namespace TestApp;

use Fzb;

$db       = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");
$auth     = new Fzb\Auth();
$renderer = new Fzb\Renderer();
$inputs   = new Fzb\Inputs(
    username: ['type' => 'POST', 'required' => true ],
    password: ['type' => 'POST', 'required' => true ]
);

if ($inputs->is_post() ) {
    $renderer->assign_inputs($inputs);
}

$renderer->display("test_auth");