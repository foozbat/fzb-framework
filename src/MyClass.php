<?php
namespace TestApp;

use Fzb;

class MyClass extends Fzb\DataObject
{
    public function __construct() {
        parent::__construct();
        //print "myclass constructed";
    }

    public function do_something() {
        $this->db->selectrow_array("SELECT * FROM test");
    }
}