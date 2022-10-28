<?php

namespace TestApp;

class TestController
{
    static function test_func()
    {
        print("this is a test_func");
    }

    static function test_func2($var1, $var2)
    {
        print("this is a test_func2: $var1, $var2");
    }
}