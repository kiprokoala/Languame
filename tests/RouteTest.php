<?php
require_once '../app/tools/Route.php';
require_once 'controller/TestController.php';

use app\tools\Route;
use controller\TestController;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testGet()
    {
        $_SERVER['REQUEST_URI'] = "/";
        // We test if we obtain 'Hello World!'
        $this->assertEquals(
            'Hello World!',
            Route::get('/', [TestController::class, 'index'])
        );
    }
}
