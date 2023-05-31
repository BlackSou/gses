<?php

use App\Controllers\EmailController;
use App\Controllers\RateController;

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '/rate' && $requestMethod === 'GET') {
    $rateController = new RateController();
    $rateController->rate();
} elseif ($requestUri === '/subscribe' && $requestMethod === 'POST') {
    $emailController = new EmailController();
    $emailController->subscribe();
} elseif ($requestUri === '/sendEmails' && $requestMethod === 'POST') {
    $emailController = new EmailController();
    $emailController->emails();
} else {
    http_response_code(404);
    echo 'Not Found';
}