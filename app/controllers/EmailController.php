<?php

namespace App\Controllers;

use App\Services\EmailService;

class EmailController extends BaseController
{
    private $emailService;

    public function __construct()
    {
        $this->emailService = new EmailService();
    }

    public function subscribeEmail()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $email = $data['email'];

        if (empty($email) || $this->validateEmail($email)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid email'], 400);
        }

        try {
            $success = $this->emailService->subscribeEmail($email);

            if ($success === false) {
                $this->jsonResponse(['success' => false, 'message' => 'Email duplicate'], 400);
            }

            $this->jsonResponse(['success' => true, 'message' => 'Email subscribed successfully']);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->jsonResponse(['success' => false], 500);
        }
    }
}