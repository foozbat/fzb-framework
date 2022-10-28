<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Fzb;

final class RouterTest extends TestCase
{
    private static $router;

    public static function setUpBeforeClass(): void
    {
        self::$router = new Fzb\Router();
    }

    public function test_get(): void
    {
        $router = Fzb\Router::get_instance();

        $_SERVER['REQUEST_METHOD'] = 'GET';

        $router->get("/", function() {
            print "hello";
        });

        $router->get("/world", function () {
            print "world";
        });

        $_SERVER['REQUEST_URI'] = "www.somewhere.com/";
        $_SERVER['PATH_INFO'] = "/";
        ob_start();
        $router->route();
        $test1 = ob_get_clean();
        $this->assertSame($test1, "hello");

        $_SERVER['REQUEST_URI'] = "www.somewhere.com/world";
        $_SERVER['PATH_INFO'] = "/world";
        ob_start();
        $router->route();
        $test2 = ob_get_clean();
        $this->assertSame($test2, "world");
    }

    public function test_post(): void
    {
        $this->expectOutputString("gotpost");

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['REQUEST_URI'] = "www.somewhere.com/mypost";
        $_SERVER['PATH_INFO'] = "/mypost";

        $router = Fzb\Router::get_instance();

        $router->post("/wrong", function () {
            print("wrong one");
        });
        $router->post("/mypost", function() {
            print("gotpost");
        });
        $router->route();
    }

    public function test_singleton1(): void
    {
        $router1 = Fzb\Router::get_instance();
        $router2 = Fzb\Router::get_instance();;
        
        $this->assertSame($router1, $router1);
    }

    public function test_singleton2(): void
    {
        $this->expectException(Fzb\RouterException::class);

        $router3 = new Fzb\Router();
    }
}