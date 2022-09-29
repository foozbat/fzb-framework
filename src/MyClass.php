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

    public function __construct(...$params)
    {
        parent::__construct(...$params);
    }

    public function get_data()
    {
        return $this->db()->selectrow_array("SELECT * FROM test");
    }
}