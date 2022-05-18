<?php

namespace TestApp;

use Fzb;

$renderer = new Fzb\Renderer();

$db = new Fzb\Database(ini_file: SETTINGS_DIR."/.settings.ini");

$obj = new MyClass();