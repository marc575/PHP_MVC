<?php

session_start();

require_once '../vendor/autoload.php';
use App\Controllers\SessionController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/auth/register') {
    $controller = new AuthController();
    $controller->register();
} elseif ($uri === '/auth/login') {
    $controller = new AuthController();
    $controller->login();
} elseif ($uri === '/users/show') {
    $controller = new AuthController();
    $controller->show();
} elseif ($uri === '/user/update') {
    $controller = new AuthController();
    $controller->update();
} elseif ($uri === '/user/delete') {
    $controller = new AuthController();
    $controller->delete();
} elseif ($uri === '/auth/logout') {
    $controller = new AuthController();
    $controller->logout();
} elseif ($uri === '/logs') {
    $controller = new SessionController();
    $controller->show();
} elseif ($uri === '/') {
    $controller = new HomeController();
    $controller->home();
} else {
    $controller = new HomeController();
    $controller->notfound();
}
