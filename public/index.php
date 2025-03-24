<?php


session_start();

require_once '../vendor/autoload.php';
use App\Controllers\SessionController;
use App\Controllers\AuthController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/auth/register') {
    $controller = new AuthController();
    $controller->register();
} elseif ($uri === '/auth/login') {
    $controller = new AuthController();
    $controller->login();
} elseif ($uri === '/contact/show') {
    $controller = new AuthController();
    $controller->show();
} elseif ($uri === '/contact/update') {
    $controller = new AuthController();
    $controller->update();
} elseif ($uri === '/contact/delete') {
    $controller = new AuthController();
    $controller->delete();
} elseif ($uri === '/auth/logout') {
    $controller = new AuthController();
    $controller->logout();
} else {
    $controller = new SessionController();
    $controller->dashboard();
}
