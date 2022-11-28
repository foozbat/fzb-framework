<?php
namespace TestApp;

use Fzb;

class MyClass extends Fzb\Model
{
    const __table__ = "test";

    public $name;
    public $city;
    public $state;
    public $zip;

    public function test($one, $two, $three)
    {
        return "blah <b> $one $two $three </b>";
    }
}