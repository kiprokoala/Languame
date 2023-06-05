<?php
require_once '../app/tools/Route.php';
require_once 'controller/TestController.php';

use app\tools\Route;
use controller\TestController;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testGetHome()
    {
        $_SERVER['REQUEST_URI'] = "/";
        // We test if we obtain 'Hello World!'
        $this->assertEquals(
            'Hello World!',
            Route::get('/', [TestController::class, 'index'])
        );
    }

    public function testGetAnotherPath()
    {
        $_SERVER['REQUEST_URI'] = "/page2";
        // We test if we obtain 'Hello World!'
        $this->assertEquals(
            'This is the second page!',
            Route::get('/page2', [TestController::class, 'secondPage'])
        );
    }

    public function testWithUrlParams()
    {
        $_SERVER['REQUEST_URI'] = "/?testParma=test&secondTest=true";
        // We test if we obtain 'Hello World!'
        $this->assertEquals(
            'Hello World!',
            Route::get('/', [TestController::class, 'index'])
        );
    }
}
