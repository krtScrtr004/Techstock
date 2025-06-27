<?php

$router = Router::getRouter();

$routesFile = DATA_PATH . 'routes.json';
$routes = decodeData($routesFile);
foreach ($routes as $method => $route) {
    foreach ($route as $path => $action) {
        if ($path[strlen($path) - 1] === '/')
            $path = substr($path, 0, strlen($path) - 1);
        $router->register($path, $method, [$action, 'index']);
    }
}
$router->dispatch();
