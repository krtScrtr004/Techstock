<?php
require_once 'root/backend/config/config.php';

$router = Router::getRouter();

$router->register("/Techstock/login", "GET", "index");
$router->register("/Techstock/signup", "GET", "index");

$router->dispatch();