<?php

namespace TestApp;

use Fzb\Redis;

$redis = new Redis(host: 'localhost');

print("Redis implementation is currently buggy<br><br>");

print("test: ");
var_dump($redis->test());
print("\n");

$redis->set("foo", "bar");
$redis->set("blah", "bloo\nbloo");
$redis->set("bleh", "blarg\r\nblarg");
$redis->set("long", file_get_contents(APP_DIR."/test.txt"));

print("getting foo: ");
var_dump($redis->get("foo"));

print("getting long: ");
var_dump($redis->get("long"));

print("get bleh: \n");
$ret = $redis->get("bleh");
var_dump($ret);
print("\n\n");

print("hset: \n");
$data = [
    'username' => 'blah',
    'name' => 'somebody',
    'place' => 'somewhere',
    'activity' => 'nothing',
    'count' => 256
];
$ret = $redis->hset('user:1', $data);
var_dump($ret);
print("\n\n");

print("hget:\n");
$ret = $redis->hget('user:1', 'username');
var_dump($ret);

print("hgetall:\n");
$ret = $redis->hgetall('user:1');
var_dump($ret);

print("hdel\n");
$ret = $redis->hdel('user:1', 'activity');
$after = $redis->hgetall('user:1');
print("  returns\n");
var_dump($ret);
print("  after\n");
var_dump($after);

print("hdelall\n");
$ret = $redis->hdelall('user:1');
$after = $redis->hgetall('user:1');
print("  returns\n");
var_dump($ret);
print("  after\n");
var_dump($after);

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

/*
print("<br/><br/><br/>command:\n");
var_dump($redis->cmd("command"));
print("\n\n");
*/

$redis->cmd("FLUSHDB");