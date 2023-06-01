<?php

namespace App\Controllers;

class BaseController
{
    protected function jsonResponse($data, $status_code = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status_code);
        echo json_encode($data);
        exit();
    }

    protected function validateEmail($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}