<?php

namespace MyApp;

use Fzb;

$redis = new Fzb\Redis();

print("<pre>");

print("test: ");
var_dump($redis->test());
print("\n");

$redis->set("foo", "bar");
$redis->set("blah", "bloo\nbloo");
$redis->set("bleh", "blarg\r\nblarg");
$redis->set("long", file_get_contents(APP_DIR."/test.txt"));

print("getting foo: \"");
var_dump($redis->get("foo"));

print("getting long: \"");
var_dump($redis->get("long"));

print("get bleh: \n");
$ret = $redis->get("bleh");
var_dump($ret);
print("\n\n");

print("hgetall:\n");
$ret = $redis->cmd("hgetall", "user:123");
var_dump($ret);
print("\n\n");

$cmd = "*0\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*2\r\n$5\r\nhello\r\n$5\r\nworld\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*3\r\n:1\r\n:2\r\n:3\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*5\r\n:1\r\n:2\r\n:3\r\n:4\r\n$5\r\nhello\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*-1\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*2\r\n*3\r\n:1\r\n:2\r\n:3\r\n*2\r\n+Hello\r\n-World\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*3\r\n$5\r\nhello\r\n$-1\r\n$5\r\nworld\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*4\r\n*0\r\n*0\r\n*0\r\n*0\r\n";
var_dump($redis->parse_response($cmd));

$cmd = "*4\r\n*-1\r\n*0\r\n*0\r\n*0\r\n";
var_dump($redis->parse_response($cmd));

print("<br/><br/><br/>command:\n");
var_dump($redis->cmd("command"));
print("\n\n");