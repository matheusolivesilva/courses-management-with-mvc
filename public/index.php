<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Courses\Controller\InterfaceRequestController;

$path = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
}

session_start();

$controllerClass = $routes[$path];

/** @var InterfaceRequestController $controller */

$controller = new $controllerClass();
$controller->processRequest();

