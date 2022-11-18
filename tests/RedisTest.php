<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Fzb;

final class RedisTest extends TestCase
{
    private static $redis;

    public static function setUpBeforeClass(): void
    {
        self::$redis = new Fzb\Redis();
    }

    public function test_parse_response(): void
    {
        $redis = Fzb\Redis::get_instance();

        $cmd = "*0\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array());

        $cmd = "*2\r\n$5\r\nhello\r\n$5\r\nworld\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array("hello", "world"));

        $cmd = "*3\r\n:1\r\n:2\r\n:3\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array(1,2,3));

        $cmd = "*5\r\n:1\r\n:2\r\n:3\r\n:4\r\n$5\r\nhello\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array(1,2,3,4,"hello"));

        $cmd = "*-1\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, null);

        $cmd = "*2\r\n*3\r\n:1\r\n:2\r\n:3\r\n*2\r\n+Hello\r\n-World\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array(array(1,2,3), array("Hello", "World")));

        $cmd = "*3\r\n$5\r\nhello\r\n$-1\r\n$5\r\nworld\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array("hello", null, "world"));

        $cmd = "*4\r\n*0\r\n*0\r\n*0\r\n*0\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array(array(),array(),array(),array()));

        $cmd = "*4\r\n*-1\r\n*0\r\n*0\r\n*0\r\n";
        $resp = $redis->parse_response($cmd);
        $this->assertSame($resp, array(null,array(),array(),array()));
    }

}