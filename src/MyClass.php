<?php
namespace TestApp;

use Fzb;

class MyClass extends Fzb\DataObject
{
    protected $__table__ = "test";

    protected $name;
    protected $city;
    protected $state;
    protected $zip;

    public function __construct() {
        print "myclass constructed";

        $this->test1 = 1;
        $this->test2 = 2;
    }

    public function get_data() {
        return $this->db()->selectrow_array("SELECT * FROM test");
    }
}