<?php

namespace TestApp;

use Fzb;

$bm1 = new Fzb\Benchmark('test1');
$bm2 = new Fzb\Benchmark('test2');

$bm1->start();
sleep(2);
$bm1->end();

$bm2->start();
sleep(3);
$bm2->end();

Fzb\Benchmark::show();
