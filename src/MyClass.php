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

}