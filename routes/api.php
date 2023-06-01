<?php
require_once 'app/controllers/RateController.php';
require_once 'app/controllers/EmailController.php';
require_once 'app/controllers/MailController.php';

use App\Controllers\RateController;
use App\Controllers\EmailController;
use App\Controllers\MailController;

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$routes = [
    ['uri' => '/rate', 'method' => 'GET', 'controller' => RateController::class, 'action' => 'getCurrentRate'],
    ['uri' => '/subscribe', 'method' => 'POST', 'controller' => EmailController::class, 'action' => 'subscribeEmail'],
    ['uri' => '/sendEmails', 'method' => 'POST', 'controller' => MailController::class, 'action' => 'sendRateEmails']
];

foreach ($routes as $route) {
    if ($route['uri'] === $requestUri && $route['method'] === $requestMethod) {
        $controllerName = $route['controller'];
        $action = $route['action'];
        $controller = new $controllerName();
        $controller->$action();
    }
}