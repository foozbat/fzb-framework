<?php
namespace TestApp;

use Fzb;

class MyClass extends Fzb\DataObject
{
    const __table__ = "test";

    public $name;
    public $city;
    public $state;
    public $zip;

}