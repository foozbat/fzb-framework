<?php

namespace TestApp;

use Fzb\Benchmark;

$bm1 = new Benchmark('test1');
$bm2 = new Benchmark('test2');

$bm1->start();
sleep(2);
$bm1->end();

$bm2->start();
sleep(3);
$bm2->end();

Benchmark::show();
