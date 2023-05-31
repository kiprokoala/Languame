<?php
namespace app\tools;

use Exception;

class Route
{
    /**
     * Définit une route de type GET
     * @param string $path Chemin de la route
     * @param array $controller Tableau contenant le nom de la classe et la méthode à appeler
     * @return mixed|void
     * @throws Exception
     */
    public static function get($path, $controller)
    {
        $requestedPath = $_SERVER['REQUEST_URI'];
        if(strpos($requestedPath, '?')) {
            $requestedPath = substr($requestedPath, 0, strpos($requestedPath, "?"));
        }

        // Firstly we will check the parameters
        // Check if path is a string
        if (!is_string($path)) {
            throw new Exception('Path must be a string');
        }

        // Check if controller is an array
        if (!is_array($controller)) {
            throw new Exception('Controller must be an array');
        }

        // Check if controller has 2 elements
        if (count($controller) != 2) {
            throw new Exception('Controller must have 2 elements');
        }

        // Check if controller[0] is a class
        if (!class_exists($controller[0])) {
            throw new Exception($controller[0] . ' is inaccesible');
        }

        // Check if controller[1] is a method
        if (!method_exists($controller[0], $controller[1])) {
            throw new Exception($controller[1] . ' must be a method of Controller[0]');
        }

        // Check if the path matches the current path
        if ($path == $requestedPath) {
            // We instanciate the controller
            $controller[0] = new $controller[0];

            // We will call the controller
            return call_user_func_array([$controller[0], $controller[1]], []);
        }

        /*// We will check if we have placeholders in the path
        $path = preg_replace('/\{[a-zA-Z0-9]+\}/', '([a-zA-Z0-9]+)', $path);

        // We will check if the path matches the current path
        if (preg_match('/^' . $path . '$/', $_SERVER['REQUEST_URI'], $matches)) {
            // We will remove the first element of the array
            array_shift($matches);

            print_r($matches);

            // We will call the controller
            //call_user_func_array([$controller[0], $controller[1]], $matches);
        }*/
    }
}