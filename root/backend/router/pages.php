<?php

$routesFile = DATA_PATH . 'routes.json';
$routes = decodeData($routesFile);
foreach ($routes as $method => $route) {
    foreach ($route as $path => $action) {
        // Remove trailing forward slash
        if ($path[strlen($path) - 1] === '/')
            $path = substr($path, 0, strlen($path) - 1);
        
        /*
        If action provided is an array:
            - The first element is the controller class name
            - The second is the method name that controls the page
        If not, the default name for controlling method is 'index'
        */
        $actions = (is_array($action)) ? [$action[0], $action[1]] : [$action, 'index'];
        $router->register($path, $method, $actions);
    }
}
$router->dispatch();
