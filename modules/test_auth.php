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

if ($inputs->request_method() == 'POST') {
    $renderer->assign_all($inputs->get_validation_failures());
}

$renderer->display("test_auth");