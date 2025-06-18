<?php
require_once 'root/backend/config/config.php';

$router = Router::getRouter();

$routesFile = DATA_PATH . 'routes.json';
$routes = decodeData($routesFile);
foreach ($routes as $method => $route) {
    foreach ($route as $path => $action) {
        $router->register($path, $method, $action);
    }
}
$router->dispatch();
